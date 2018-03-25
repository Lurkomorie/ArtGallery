<?php

namespace App\Http\Controllers;

use App\Drawing;
use Illuminate\Http\Request;
use Mail;
use App\mail\SendMail;

class MailController extends Controller
{
    public function send(){
        Mail::send(new sendMail());
        $message = ['text' => 'E-mail sending', 'status' => 'DONE'];
        return view('status',compact('message'));
    }

    public function email(){
        return view('mail.email');
    }

    public function emailWithDrawing($id){
        $drawing = Drawing::find($id);
        return view('mail.emailWithDrawing', compact('drawing'));
    }
}
