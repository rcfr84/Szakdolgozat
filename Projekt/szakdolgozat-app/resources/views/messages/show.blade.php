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
                                        @if(auth()->user()->user_id == $message->receiver_id)
                                            <a href="{{ route('messages.create', ['receiverId' => $message->sender_id]) }}">
                                                Üzenet küldése
                                            </a>
                                        @elseif(auth()->user()->user_id == $message->sender_id)
                                            <a href="{{ route('messages.create', ['receiverId' => $message->receiver_id]) }}">
                                                Üzenet küldése
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection