@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="countySelect" class="form-label">Vármegye</label>
                            <select class="form-select w-full" name="county_id" id="countySelect">
                                <option value="">Válassz vármegyét</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="citySelect" class="form-label">Város</label>
                            <select class="form-select w-full" name="city_id" id="citySelect">
                                <option value="">Válassz várost</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="categorySelect" class="form-label">Kategória</label>
                            <select class="form-select w-full" name="category_id" id="category">
                                <option value="">Válassz kategóriát</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="pictures" class="form-label">Kép 1</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures1">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label">Kép 2</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures2">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label">Kép 3</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures3">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label">Kép 4</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures4">
                        </div>  
                        <div class="mb-4">
                            <label for="pictures" class="form-label">Kép 5</label>
                            <input type="file" class="form-input w-full" name="pictures[]" id="pictures5">
                        </div>                            
                        <div class="mb-4">
                            <label for="title" class="form-label">Cím</label>
                            <input type="text" class="form-input w-full" name="title" id="title" value="{{ old('title', '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Ár</label>
                            <input type="number" class="form-input w-full" placeholder="Ft" name="price" id="price" value="{{ old('price', '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label" id="description">Leírás</label>
                            <textarea class="form-input w-full" rows="10" id="description" name="description">{{ old('description', '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_number" class="form-label">Telefonszám</label>
                            <input type="text" class="form-input w-full" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', '') }}">
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
