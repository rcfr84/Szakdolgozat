<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['edit', 'update', 'destroy']);
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user()->user_id;
        $userMessages = Message::userMessages($user_id)->get();
    
        return view('messages.ownList', ['messages' => $userMessages]);
    }
    public function showConversation($user1_id, $user2_id)
    {
        $conversation = Message::getConversation($user1_id, $user2_id);

        return view('messages.show', ['conversation' => $conversation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($receiverId)
    {
        $user_id = auth()->user()->user_id;
        if ($user_id == $receiverId) {
            return redirect()->route('advertisements.index')->with('status', 'Nem küldhetsz üzenetet saját magadnak!');
        }
        return view('messages.create')->with('receiverId', $receiverId);
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request, $receiverId)
    {
        $user = auth()->user();

        $request->validate([
            'message' => 'required',
        ]);

        $newMessage = new Message();
        $newMessage->sender_id = $user->user_id;
        $newMessage->receiver_id = $receiverId;
        $newMessage->message = $request->message;
        $newMessage->save();

        $conversation = Message::getConversation($user->user_id, $receiverId);

        $receiverId = $newMessage->receiver_id;
        $senderId = $newMessage->sender_id;

        return redirect()->route('messages.showConversation', [$receiverId, $senderId])->with('status', 'Sikeres küldés!');

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
            return redirect()->route('/messages/get')->with('status', 'Nincsen ilyen üzenet!');
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
            return redirect()->route('/messages/get')->with('status', 'Nincsen ilyen üzenet!');
        }

        $request->validate([
            'message' => 'required',
        ]);

        $message->message = $request->message;
        $message->save();

        $receiverId = $message->receiver_id;
        $senderId = $message->sender_id;

        return redirect()->route('messages.showConversation', [$receiverId, $senderId])->with('status', 'Sikeres módosítás!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        if (!$message) 
        {
            return redirect()->route('messages.index')->with('status', 'Nincsen ilyen üzenet!');
        }
        if ($message->sender_id != auth()->user()->user_id) 
        {
            return redirect()->route('messages.index')->with('status', 'Nem törölheted más üzenetét!');
        }
        $receiverId = $message->receiver_id;
        $senderId = $message->sender_id;
        $message->delete();

        return redirect()->route('messages.showConversation', [$receiverId, $senderId])->with('status', 'Sikeres törlés!');
    }
}
