@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Dátum</th>
                                <th class="px-4 py-2">Üzenet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($conversation as $message)
                                <tr>
                                    <td class="px-4 py-2">{{ $message->created_at->format('Y.m.d H:i') }}</td>
                                    <td class="px-4 py-2" style="max-width: 300px; word-wrap: break-word;">{{ $message->message }}</td>
                                    <td class="px-4 py-2">
                                        @if ($message->sender_id == auth()->user()->user_id)
                                            <a href="{{ route('messages.edit', $message->message_id) }}">
                                                @include('icons.edit')
                                            </a>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($message->sender_id == auth()->user()->user_id)
                                        <form action="{{ route('messages.destroy', $message->message_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                @include('icons.delete')
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="flex flex-col items-center justify-center">
                        @if(auth()->user()->user_id == $message->receiver_id)
                            <a href="{{ route('messages.create', ['receiverId' => $message->sender_id]) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Üzenet küldése
                            </a>
                        @elseif(auth()->user()->user_id == $message->sender_id)
                            <a href="{{ route('messages.create', ['receiverId' => $message->receiver_id]) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Üzenet küldése
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection