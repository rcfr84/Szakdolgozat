@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <form action="{{ route('advertisements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="countySelect" class="form-label">Vármegye</label>
                            <select class="form-select" name="county_id" id="countySelect">
                                <option value="">Válassz vármegyét</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="citySelect" class="form-label">Város</label>
                            <select class="form-select" name="city_id" id="citySelect">
                                <option value="">Válassz várost</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="categorySelect" class="form-label">Kategória</label>
                            <select class="form-select" name="category_id" id="category">
                                <option value="">Válassz kategóriát</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="picture" class="form-label">Kép</label>
                            <input type="file" class="form-input" name="picture" id="picture">
                        </div>                            
                        <div class="mb-4">
                            <label for="title" class="form-label">Cím</label>
                            <input type="text" class="form-input" name="title" id="title" value="{{ old('title', '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Ár</label>
                            <input type="text" class="form-input" name="price" id="price" value="{{ old('price', '') }}">
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label" id="description">Leírás</label>
                            <textarea class="form-input" rows="10" id="description" name="description">{{ old('description', '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="mobile_number" class="form-label">Telefonszám</label>
                            <input type="text" class="form-input" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', '') }}">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="bg-red-500 text-white p-2 rounded">Hozzáadás</button>
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
        <script>
            var countySelect = document.getElementById("countySelect");
            var citySelect = document.getElementById("citySelect");
        
            countySelect.addEventListener("change", function () {
                var selectedCounty = countySelect.value;
                citySelect.innerHTML = "<option value=''>Válassz várost</option>";
        
                if (selectedCounty) {
                    fetch(`/get-cities-by-county/${selectedCounty}`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(function (city) {
                                var option = document.createElement("option");
                                option.value = city.city_id;
                                option.text = city.name;
                                citySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error(error));
                }
            });
        </script>
    </div>
@endsection
