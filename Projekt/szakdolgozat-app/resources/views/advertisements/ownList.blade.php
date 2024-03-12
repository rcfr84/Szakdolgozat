@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if ($advertisements->isNotEmpty())
                    <div class="flex flex-col items-center justify-center">
                        <form action="{{ route('advertisements.searchByTitleOwn') }}" method="GET" class="mb-4">
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
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2" style="width: 150px; height: 200px;">Kép</th>
                                    <th class="px-4 py-2" style="width: 150px;">Cím</th>
                                    <th class="px-4 py-2">Város</th>
                                    <th class="px-4 py-2">Vármegye</th>
                                    <th class="px-4 py-2">Kategória</th>
                                    <th class="px-4 py-2">Ár</th>
                                    <th class="px-4 py-2">Leírás</th>
                                    <th class="px-4 py-2">Telefonszám</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($advertisements as $advertisement)
                                    <tr>
                                        <td class="px-4 py-2 text-center">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" class="h-32 w-32 object-contain">
                                            @else
                                                <span>Nincs kép</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 break">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2 break">{{ substr($advertisement->description, 0, 50) }}</td>
                                        <td class="px-4 py-2 break">{{ $advertisement->mobile_number }} </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}">
                                                @include('icons.edit')
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    @include('icons.delete')
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $advertisements->links() }}
                    @else
                        <div class="text-center mb-4 text-lg font-bold">Nincs még saját hirdetésed.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
