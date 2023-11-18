@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <form action="{{ route('advertisements.update', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Vármegye</label>
                                <select class="form-control" name="county_id" id="countySelect">
                                    <option value="">Válassz vármegyét</option>
                                    @foreach ($counties as $county)
                                        <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Város</label>
                                <select class="form-control" name="city_id">
                                    <option value="">Válassz várost</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategória</label>
                                <select class="form-control" name="category_id" value={{$advertisement->category}}>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kép</label>
                                <input type="file" class="form-control" name="picture">
                            </div>                            
                            <div class="mb-3">
                                <label class="form-label">Cím</label>
                                <input type="text" class="form-control" name="title" value="{{$advertisement->title}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ár</label>
                                <input type="text" class="form-control" name="price" value="{{$advertisement->price}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Leírás</label>
                                <textarea class="form-control" rows="10" name="description">{{$advertisement->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telefonszám</label>
                                <input type="text" class="form-control" name="mobile_number" value="{{$advertisement->mobile_number}}">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="bg-red-500 text-white p-2 rounded">Módosítás</button>
                            </div>
                        </form>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Hiba!</strong> Problámák vannak az adatokkal.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
            </div>
        </div>
        <script>
            var countySelect = document.getElementById("countySelect");
            var citySelect = document.querySelector("select[name='city_id']");
        
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
@endsection('content')