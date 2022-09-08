<?php

namespace App\Http\Controllers;

use App\Mail\GeneratedEmail;
use App\Models\SentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'subject' => 'required|max:255|min:3',
            'html' => 'required',
        ]);

        Mail::to($request->email)->send(new GeneratedEmail($request->html, $request->subject));
        SentEmail::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'html' => $request->html,
            'user_id' => auth()->id(),
        ]);

        request()->session()->flash('flash.banner', 'Email sent to '.$request->email);
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
