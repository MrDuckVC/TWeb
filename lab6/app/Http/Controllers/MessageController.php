<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create() {
        return view('contact');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ]);

        Message::create($request->all());

        return redirect()->route('contact.create')->with('success', 'Mesajul a fost trimis! Vă vom contacta curând.');
    }

    public function index() {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin_messages', compact('messages'));
    }

    public function destroy(Message $message) {
        $message->delete();
        return back()->with('success', 'Mesaj șters!');
    }
}
