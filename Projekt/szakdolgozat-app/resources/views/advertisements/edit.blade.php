@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('advertisements.update', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label">Vármegye</label>
                            <select class="form-control w-full" name="county_id" id="countySelect">
                                <option value="">Válassz vármegyét</option>
                                @foreach ($counties as $county)
                                    <option value="{{ $county->county_id }}" {{ $county->county_id == $advertisement->city->county->county_id ? 'selected' : '' }}>{{ $county->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Város</label>
                            <select class="form-control w-full" name="city_id" id="citySelect">
                                <option value="">Válassz várost</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->city_id }}" {{ $city->city_id == $advertisement->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Kategória</label>
                            <select class="form-control w-full" name="category_id" id="category">
                                <option value="">Válassz kategóriát</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $category->category_id == $advertisement->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Képek</label>
                            @foreach ($advertisement->pictures as $picture)
                                <div class="w-1/4 p-2 mx-auto">
                                    <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" style="width: 8cm; height: auto; display: block; margin-left: auto; margin-right: auto;">
                                </div>
                            @endforeach
                        </div>                        
                        <div class="mb-4">
                            <label class="form-label">Cím</label>
                            <input type="text" class="form-control w-full" name="title" id="title" value="{{ old('title', $advertisement->title) }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Ár</label>
                            <input type="number" class="form-control w-full" name="price" id="price" value="{{ old('price', $advertisement->price) }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Leírás</label>
                            <textarea class="form-control w-full" rows="10" id="description" name="description">{{ old('description', $advertisement->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Telefonszám</label>
                            <input type="text" class="form-control w-full" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $advertisement->mobile_number) }}">
                        </div>
                        <div class="mb-4 text-center">
                            <a href="{{route('pictures.create', $advertisement->advertisement_id)}}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Új kép hozzáadása</a>
                        </div>
                        <div class="mb-4 text-center">
                            <a href="{{ route('pictures.index', $advertisement->advertisement_id) }}" style="background-color: #fc0303; color: white; padding: 10px; border-radius: 5px;">Képek törlése</a>
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
