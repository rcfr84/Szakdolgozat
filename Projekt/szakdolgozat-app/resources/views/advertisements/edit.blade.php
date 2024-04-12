@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                @include('components.statusAndError')
                @include('advertisements.components.errorMessage')
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('advertisements.update', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label font-bold">Vármegye</label>
                            <p>{{ old('county_name', $advertisement->city->county->name) }}</p>
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-bold">Város</label>
                            <p>{{ old('city_name', $advertisement->city->name) }}</p>
                        </div>                        
                        <div class="mb-4">
                            <label class="form-label font-bold">Kategória</label>
                            <select class="form-control w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" name="category_id" id="category">
                                <option value="">Válassz kategóriát</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ $category->category_id == $advertisement->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-bold">Képek</label>
                            @foreach ($advertisement->pictures as $key => $picture)
                                <div class="grid">
                                    <a href="{{ asset('storage/' . $picture->src) }}" data-lightbox="advertisement" data-title="Kép {{ $key + 1 }}">
                                        <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" class="h-40 w-auto mx-auto mb-1 block">
                                    </a>
                                </div>
                            @endforeach
                        </div>                   
                        <div class="mb-4">
                            <label class="form-label font-bold">Cím</label>
                            <input type="text" class="form-control w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" name="title" id="title" value="{{ old('title', $advertisement->title) }}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-bold">Ár</label>
                            <input type="number" class="form-control w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" name="price" id="price" value="{{ old('price', $advertisement->price) }}" max="2147483647">
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-bold">Leírás</label>
                            <textarea class="form-control w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" rows="10" id="description" name="description">{{ old('description', $advertisement->description) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label font-bold">Telefonszám</label>
                            <input type="text" class="form-control w-full border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', $advertisement->mobile_number) }}">
                        </div>
                        @include('advertisements.components.addOrDeletePictureAndeditCounytAndCity', ['advertisement' => $advertisement])     
                        <div class="flex flex-col items-center justify-center">
                            <button type="submit" class="mt-6 text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Módosítás</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
