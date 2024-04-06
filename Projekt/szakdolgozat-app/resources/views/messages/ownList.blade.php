@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($messages->isNotEmpty())
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Felhasználó</th>
                                    <th class="px-4 py-2">Címzett</th>
                                    <th class="px-4 py-2">Utolsó üzenet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $conversations = []; @endphp
                                @foreach($messages as $message)
                                    @php
                                        $conversationKey = $message->sender_id < $message->receiver_id ? $message->sender_id . '-' . $message->receiver_id : $message->receiver_id . '-' . $message->sender_id;
                                    @endphp

                                    @if(!in_array($conversationKey, $conversations))
                                        <tr>
                                            <td class="px-4 py-2 max-w-[300px] break-words">
                                                @if($message->sender->role->name === 'admin')
                                                    <span class="text-green-500">{{ $message->sender->name }}</span>
                                                @else
                                                    {{ $message->sender->name }}
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 max-w-[300px] break-words">
                                                @if($message->receiver->role->name === 'admin')
                                                    <span class="text-green-500">{{ $message->receiver->name }}</span>
                                                @else
                                                    {{ $message->receiver->name }}
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 max-w-[300px] break-words">{{ $message->getLastMessage()->message }}</td>
                                            @include('messages.components.showConversation')
                                        </tr>
                                        @php $conversations[] = $conversationKey @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        @include('messages.components.messageNotFoundYet')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
