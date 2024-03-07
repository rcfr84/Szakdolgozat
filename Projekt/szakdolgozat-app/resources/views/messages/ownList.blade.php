@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($messages->isNotEmpty())
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Felhasználó</th>
                                    <th class="px-4 py-2">Címzett</th>
                                    <th class="px-4 py-2">Utolsó üzenet</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $displayedConversations = [] @endphp
                                @foreach($messages as $message)
                                    @php
                                        $conversationKey = $message->sender_id < $message->receiver_id ? $message->sender_id . '-' . $message->receiver_id : $message->receiver_id . '-' . $message->sender_id;
                                    @endphp

                                    @if(!in_array($conversationKey, $displayedConversations))
                                        <tr>
                                            <td class="px-4 py-2">{{ $message->sender->name }}</td>
                                            <td class="px-4 py-2">{{ $message->receiver->name }}</td>
                                            <td class="px-4 py-2" style="max-width: 300px; word-wrap: break-word;">{{ $message->getLastMessage()->message }}</td>
                                            <td class="px-4 py-2">
                                                <a href="{{ route('messages.showConversation', ['user1_id' => $message->sender_id, 'user2_id' => $message->receiver_id]) }}">
                                                    @include('icons.show')
                                                </a>
                                            </td>
                                        </tr>
                                        @php $displayedConversations[] = $conversationKey @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center mb-4 text-lg font-bold">Nincsen még üzeneteid.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
