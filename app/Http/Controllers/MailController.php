<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SingupEmail;
class MailController extends Controller
{
    public static function sendSignUpEmail($name,$email,$verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new SingupEmail($data));
    }
}