@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div class="bg-green-500 text-white p-4 mb-4">{{ session('status') }}</div>
                @endif
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
                            <p class="text-center">Adj meg legalább 4 karakter a kereséshez!</p>
                        @enderror
                    </div>
                    
                    <div class="flex flex-col items-center justify-center">
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
                                    <label for="category" class="block text-sm font-medium text-gray-700">Kategória:</label>
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
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="green" width="30" height="30">
                                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                            </svg>
                                        </a>
                                    </td>
                                    @if (Auth::user() && Auth::user()->role->name === 'admin')
                                        <td class="px-4 py-2">
                                            <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" style="cursor: pointer;" fill="blue">
                                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    @endif
                                    @if (Auth::user() && Auth::user()->role->name === 'admin')
                                        <td class="px-4 py-2">
                                                <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="red">
                                                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                        </td>
                                    @endif
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
