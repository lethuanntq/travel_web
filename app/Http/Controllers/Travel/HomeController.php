<?php

namespace App\Http\Controllers\Travel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\PostController;
use App\Mail\NotificationMail;
use App\Mail\SendContactAdmin;
use App\Mail\SendContactCustomer;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        $news = Post::query()->where('type', Post::TYPE_NEWS)->limit(7)->inRandomOrder()->get();
        $newsTravel = Post::query()->where('type', Post::TYPE_DESTINATION)->limit(7)->inRandomOrder()->get();
        $newsDiscount =  Post::query()->where('type', Post::TYPE_DISCOUNT)->limit(3)->inRandomOrder()->get();
        return view('travel.index', [
            'news' => $news,
            'newsTravel' => $newsTravel,
            'newsDiscount' => $newsDiscount
        ]);
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
        Mail::to(env('support_email', 'lethuanqed@gmail.com'))->send(new SendContactAdmin($contact['contact']));

        return redirect()->route('contact')->with('success', 'Đã gửi thành công, vui lòng đợi phản hồi qua email của anh/chị');
    }

    public function validateContact()
    {
        return [
            'contact.name' => 'required',
            'contact.email' => 'required|email',
            'contact.phone_number' => 'required|regex:/(01)[0-9]{9}',
            'contact.description' => 'required'
        ];
    }

    public function notification(Request $request)
    {
        $data = $request->all();

        if ($data['email']) {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return response()->json(['message' => 'Sai format tin email']);
            }
            Mail::to($data['email'])->send(new NotificationMail());

            return response()->json(['message' => 'Đăng ký thành công, cảm ơn bạn']);
        }

        return response()->json(['message' => 'Gửi email thất bại']);
    }
}
