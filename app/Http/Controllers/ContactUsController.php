<?php

namespace App\Http\Controllers;

use App\ContactUS;
use App\SubscribeUS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    //
    public function contactUSPost(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        ContactUS::create($request->all());

        Mail::send('email.email',
            array(
                'name' => $request->get('first_name') . ' ' . $request->get('last_name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message) use ($request)
            {
                $message->from($request->get('email'));
                $message->to('info@metrotech.gg', 'Metrotech')->subject($request->input('subject'));
            });
        return response(['status' => 'success', 'message' => 'Thanks for contacting us!']);
    }

    public function subscribePost(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'email' => 'required|email'
        ]);
        SubscribeUS::create($request->all());
        return response(['status' => 'success', 'message' => 'Thanks for contacting us!']);
    }
}
