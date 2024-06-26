@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form method="POST" action="{{ route('messages.store', ['receiverId' => $receiverId]) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="message" class="form-label font-bold" id="message">Üzenet</label>
                            <textarea class="form-input w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" rows="5" id="message" name="message">{{ old('message', '') }}</textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit"  class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Küldés</button>
                        </div>
                    </form>
                    @include('messages.components.errorMessage')
                </div>
            </div>
        </div>
    </div>
@endsection
