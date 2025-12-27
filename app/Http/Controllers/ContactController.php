<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // TODO: send email or store the message. For now, we just flash a success message.
        session()->flash('success', 'Tin nhắn của bạn đã được gửi. Cảm ơn!');

        return redirect()->back();
    }
}
