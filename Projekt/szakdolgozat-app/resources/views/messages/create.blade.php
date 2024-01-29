@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form method="POST" action="{{ route('messages.store', ['receiverId' => $receiverId]) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="message" class="form-label" id="message">Üzenet</label>
                            <textarea class="form-input w-full" rows="5" id="message" name="message">{{ old('message', '') }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Küldés</button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Hiba!</strong> Problámák vannak az adatokkal.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
