@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('messages.update', ['messageId' => $message->message_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Üzenet</label>
                            <input type="text" class="form-control w-full" name="message" id="message" value="{{ old('message', $message->message) }}">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" style="background-color: #0388fc; color: white; padding: 10px; border-radius: 5px;">Módosítás</button>
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
