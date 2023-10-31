<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $sentMessages = Message::where('sender_id', $user->user_id)->get();
        $receivedMessages = Message::where('receiver_id', $user->user_id)->get();

        return view('messages.index', compact('sentMessages', 'receivedMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $sentMessages = Message::where('sender_id', $user->user_id)->get();
        $receivedMessages = Message::where('receiver_id', $user->user_id)->get();

        return view('messages.create', compact('sentMessages', 'receivedMessages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'message' => 'required',
        ]);

        $newMessage = new Message();
        $newMessage->sender_id = $user->user_id;
        $newMessage->receiver_id = $request->receiver_id;
        $newMessage->message = $request->message;
        $newMessage->save();

        return redirect()->route('messages.index')->with('status', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $message = Message::find($id);

        if (!$message) 
        {
            return redirect()->route('/dashboard')->with('status', 'Message not found!');
        }

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $message = Message::find($id);

        if (!$message) 
        {
            return redirect()->route('/dashboard')->with('status', 'Message not found!');
        }

        $request->validate([
            'message' => 'required',
        ]);

        $message->message = $request->message;
        $message->save();

        return redirect()->route('messages.index')->with('status', 'Message updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        if (!$message) 
        {
            return redirect()->route('/dashboard')->with('status', 'Message not found!');
        }

        $message->delete();

        return redirect()->route('messages.index')->with('status', 'Message deleted successfully!');
    }
}
