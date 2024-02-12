@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('advertisements.updateCountyAndCity', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
                        
                        <div class="mb-4 text-center">
                            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Módosítás</button>
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
