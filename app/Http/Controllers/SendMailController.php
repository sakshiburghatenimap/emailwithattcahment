<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index()
    {
        $data["email"] = "bhushanmore812@gmail.com";
        $data["title"] = "From NimapInfotech.com";
        $data["body"] = "this is test mail";

        $attechfiles = [
            public_path('files/test1.pdf'),
            public_path('files/test2.pdf'),
        ];

        Mail::send('emails.fileattachment', $data, function($message)use($data, $attechfiles) {
            $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
            foreach ($attechfiles as $file){
                $message->attach($file);
            }
        });

        dd('Mail sent successfully Check Send Mail Email Address.');
    }
}
