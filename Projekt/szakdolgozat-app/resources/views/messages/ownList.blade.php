@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;" class="p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Küldő</th>
                                <th class="px-4 py-2">Utolsó üzenet</th>
                                <th class="px-4 py-2">Megtekint</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $uniqueSenders = [];
                            @endphp
                            @foreach($messages as $message)
                                @if(!in_array($message->sender->id, $uniqueSenders))
                                    <tr>
                                        <td class="px-4 py-2">{{ $message->sender->name }}</td>
                                        <td class="px-4 py-2">{{ $message->getLastMessage()->message }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ url('/messages/' . $message->sender_id . '/get/' . $message->receiver_id) }}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">
                                                Megtekint
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $uniqueSenders[] = $message->sender->id;
                                    @endphp
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
