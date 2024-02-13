@extends('layouts.app')
@section('content')
<div class="min-h-screen container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-3/2">
            @if(session('status'))
                    <div class="bg-green-500 text-white p-4 mb-4">{{ session('status') }}</div>
                @endif
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                <form action="{{ route('cities.store', ['countyId' => $county_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf            
                    <div class="mb-4">
                        <label for="name" class="form-label font-bold">Név</label>
                        <input type="text" class="form-input w-full" name="name" id="name" value="{{ old('name', '') }}">
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hozzáadás</button>
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
