@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-1/2">
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf            
                    <div class="mb-4">
                        <label for="name" class="form-label">Név</label>
                        <input type="text" class="form-input w-full" name="name" id="name" value="{{ old('name', '') }}">
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Hozzáadás</button>
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
