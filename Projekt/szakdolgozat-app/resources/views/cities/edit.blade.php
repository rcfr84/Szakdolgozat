@extends('layouts.app')

@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('cities.update', ['cityId' => $city->city_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label font-bold">Név</label>
                            <input type="text" class="form-control w-full" name="name" id="name" value="{{ old('name', $city->name) }}">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Módosítás</button>
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
