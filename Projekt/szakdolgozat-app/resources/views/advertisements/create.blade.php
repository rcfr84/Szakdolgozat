@extends('layouts.app')

@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                @include('advertisements.errorMessage')
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="countySelect" class="form-label font-bold">Vármegye</label>
                            <select class="form-select w-full" name="county_id" id="countySelect">
                                <option value="">Válassz vármegyét</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="citySelect" class="form-label font-bold">Város</label>
                            <select class="form-select w-full" name="city_id" id="citySelect">
                                <option value="">Válassz várost</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="categorySelect" class="form-label font-bold">Kategória</label>
                            <select class="form-select w-full" name="category_id" id="category">
                                <option value="">Válassz kategóriát</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="pictures" class="form-label font-bold">Kép 1</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures1">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label font-bold">Kép 2</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures2">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label font-bold">Kép 3</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures3">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label font-bold">Kép 4</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures4">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label font-bold">Kép 5</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures5">
                        </div>                            
                        <div class="mb-4">
                            <label for="title" class="form-label font-bold">Cím</label>
                            <input type="text" class="form-input w-full" name="title" id="title" value="{{ old('title', '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label font-bold">Ár</label>
                            <input type="number" class="form-input w-full" placeholder="Ft" name="price" id="price" value="{{ old('price', '') }}" max="2147483647">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label font-bold" id="description">Leírás</label>
                            <textarea class="form-input w-full" rows="10" id="description" name="description">{{ old('description', '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_number" class="form-label font-bold">Telefonszám</label>
                            <input type="text" class="form-input w-full" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', '') }}">
                        </div>
                        <div class="mb-4 text-center">
                            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hozzáadás</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection
