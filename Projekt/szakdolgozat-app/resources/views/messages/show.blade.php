@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
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
                                    @include('messages.components.editOrDeleteOwnMessage')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('messages.components.sendMessageButton')
                </div>
            </div>
        </div>
    </div>
@endsection