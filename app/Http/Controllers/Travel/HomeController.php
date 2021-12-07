<?php

namespace App\Http\Controllers\Travel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Mail\SendContactAdmin;
use App\Mail\SendContactCustomer;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('travel.index');
    }

    public function aboutMe()
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.pages.about_me', ['highlightPosts' => $highlightPosts]);
    }

    public function conTact()
    {
        $highlightPosts = app(PostController::class)->getHighlightPosts();
        return view('travel.pages.contact', ['highlightPosts' => $highlightPosts]);
    }

    public function postContact(Request $request)
    {
        $contact = $request->all();
        $validator = Validator::make($contact, $this->validateContact());

        if ($validator->failed()) {
            throw new ValidationException($validator);
        }
        Mail::to($contact['contact']['email'])->send(new SendContactCustomer($contact['contact']));
        Mail::to(User::EMAIL_ADMIN)->send(new SendContactAdmin($contact['contact']));

        return redirect()->route('contact')->with('success', 'Đã gửi thành công, vui lòng đợi phản hồi qua email của anh/chị');
    }

    public function validateContact()
    {
        return [
            'contact.name' => 'required',
            'contact.email'=> 'required|email',
            'contact.phone_number' => 'required|regex:/(01)[0-9]{9}',
            'contact.description' => 'required'
        ];
    }
}
