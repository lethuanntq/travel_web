<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendPasswordEmail;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $email = $request->input('email');
        $password = Str::random(9);

        $details = [
             'email' => $email,
             'password' => $password,
        ];

        $user = User::where('email', $email)->first();
        if (isset($user)) {
            $emailJob = new SendPasswordEmail($details);
            dispatch($emailJob);
            $user->password = bcrypt($password);
            $user->save();
        }

        return redirect()->route('login')->with('success', 'Đã gửi password, vui lòng check email');
    }

}
