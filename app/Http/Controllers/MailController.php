<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(Request $request){
        if($request->has('email')){
            $email = $request->get('email');
            $password = rand(100001, 999999);

            $details = [
                'title' => 'Send User Password',
                'body' => 'Your password is '.$password,
            ];
            Mail::to($email)->send(new TestMail($details));
            return json_encode(['success' => true, 'response_code' => 200]);
        }else{
            return json_encode(['success' => false, 'response_code' => 404]);
        }
    }
}
