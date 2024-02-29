@extends('layouts.app')

@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('messages.update', ['messageId' => $message->message_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label font-bold">Üzenet</label>
                            <input type="text" class="form-control w-full" name="message" id="message" value="{{ old('message', $message->message) }}">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Módosítás</button>
                        </div>
                    </form>
                    @include('errorMessage')
                </div>
            </div>
        </div>
    </div>
@endsection
