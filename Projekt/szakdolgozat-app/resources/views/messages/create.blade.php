@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form method="POST" action="{{ route('messages.store', ['receiverId' => $receiverId]) }}">
                        @csrf

                        <div class="form-group">
                            <label for="message">Üzenet:</label>
                            <textarea name="message" rows="5" id="message" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Küldés</button>
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
