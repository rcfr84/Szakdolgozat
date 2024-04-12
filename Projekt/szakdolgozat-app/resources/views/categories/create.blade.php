@extends('layouts.app')
@section('content')
<div class="min-h-screen container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-3/2">
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf            
                    <div class="mb-4">
                        <label for="name" class="form-label font-bold">Név</label>
                        <input type="text" class="form-input w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" name="name" id="name" value="{{ old('name', '') }}">
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hozzáadás</button>
                    </div>
                </form>
                @include('components.errorMessage')
            </div>
        </div>
    </div>
</div>
@endsection
