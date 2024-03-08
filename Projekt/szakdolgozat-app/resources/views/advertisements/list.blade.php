@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex flex-col items-center justify-center">
                        <form action="{{ route('advertisements.searchByTitle') }}" method="GET" class="mb-4">
                            @csrf
                            <div class="text-center">
                                <input type="text" name="search" placeholder="Keresés cím alapján" class="mb-4">
                                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Keresés</button>
                            </div>
                        </form> 
                        @error('search')
                            @include('advertisements.searchErrorMessage')
                        @enderror
                    </div>
                    
                    <div class="flex flex-col items-center justify-center">
                        <label>
                            <input type="checkbox" id="filterCheckbox"> Szűrés megjelenítése
                        </label>
                        <div id="filterSection" style="display: none;">
                            <form action="{{ route('advertisements.filter') }}" method="GET" class="mb-4">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center mb-4">
                                    <div class="mb-4">
                                        <label for="countySelect" class="block text-sm font-medium text-gray-700">Vármegye:</label>
                                        <select class="form-select" name="county_id" id="countySelect">
                                            <option value="">Válassz vármegyét</option>
                                            @foreach ($counties as $county)
                                                <option value="{{ $county->county_id }}">{{ $county->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <div class="mb-4">
                                        <label for="citySelect" class="block text-sm font-medium text-gray-700">Város:</label>
                                        <select class="form-select" name="city_id" id="citySelect">
                                            <option value="">Válassz várost</option>
                                        </select>
                                    </div>
                        
                                    <div class="mb-4">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Kategória:</label>
                                        <select class="form-select" name="category_id" id="category">
                                            <option value="">Válassz kategóriát</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center mb-4">
                                    <div class="mb-4">
                                        <label for="min_price" class="block text-sm font-medium text-gray-700">Minimum ár:</label>
                                        <input type="number" name="min_price" placeholder="Ft" class="mb-4">
                                        
                                    </div>
                                    <div class="mb-4">
                                        <label for="max_price" class="block text-sm font-medium text-gray-700">Maximum ár:</label>
                                        <input type="number" name="max_price" placeholder="Ft" class="mb-4">
                                    </div>
                                    <div class="mb-4">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Rendezés:</label>
                                        <select class="form-select" name="sort_by">
                                            <option value="default">Alapértelmezett</option>
                                            <option value="asc">Növekvő ár</option>
                                            <option value="desc">Csökkenő ár</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Szűrés</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2" style="width: 150px; height: 200px;">Kép</th>
                                <th class="px-4 py-2" style="width: 150px;">Cím</th>
                                <th class="px-4 py-2">Város</th>
                                <th class="px-4 py-2">Vármegye</th>
                                <th class="px-4 py-2">Kategória</th>
                                <th class="px-4 py-2">Ár</th>
                                <th class="px-4 py-2">Eladó</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisements as $advertisement)
                                <tr>
                                    
                                    <td class="px-4 py-2 text-center">
                                        @if ($advertisement->pictures->isNotEmpty())
                                            <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" >
                                        @else
                                            <span>Nincs kép</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 break-all">{{ $advertisement->title }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->user->name }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('advertisements.show', $advertisement->advertisement_id) }}">
                                            @include('icons.show')
                                        </a>
                                    </td>
                                    @include('advertisements.editAndDeleteForAdmin')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
@endsection
