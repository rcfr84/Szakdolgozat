@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div class="bg-green-500 text-white p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Dátum</th>
                                <th class="px-4 py-2">Feladó</th>
                                <th class="px-4 py-2">Címzett</th>
                                <th class="px-4 py-2">Üzenet</th>
                                <th class="px-4 py-2">Műveletek</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($conversation as $message)
                                <tr>
                                    <td class="px-4 py-2">{{ $message->created_at }}</td>
                                    <td class="px-4 py-2">{{ $message->sender->name }}</td>
                                    <td class="px-4 py-2">{{ $message->receiver->name }}</td>
                                    <td class="px-4 py-2">{{ $message->message }}</td>
                                    <td class="px-4 py-2">
                                        @if ($message->sender_id == auth()->user()->user_id)
                                            <a href="{{ route('messages.edit', $message->message_id) }}" style="background-color: #0388fc; color: white; padding: 10px; border-radius: 5px;">
                                                Szerkesztés
                                            </a>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($message->sender_id == auth()->user()->user_id)
                                        <form action="{{ route('messages.destroy', $message->message_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #fc0303; color: white; padding: 10px; border-radius: 5px;">
                                                Törlés
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                   
                                </tr>
                            @endforeach
                            <td class="px-4 py-2">
                                @if(auth()->user()->user_id == $message->receiver_id)
                                    <a href="{{ route('messages.create', ['receiverId' => $message->sender_id]) }}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">
                                        Üzenet küldése
                                    </a>
                                @elseif(auth()->user()->user_id == $message->sender_id)
                                    <a href="{{ route('messages.create', ['receiverId' => $message->receiver_id]) }}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">
                                        Üzenet küldése
                                    </a>
                                @endif
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection