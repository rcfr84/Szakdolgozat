@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;" class="p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <form action="{{ route('advertisements.searchByTitle') }}" method="GET" class="mb-4">
                        @csrf
                        <div class="text-center">
                            <input type="text" name="search" placeholder="Keresés név alapján" class="mb-4">
                            <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Keresés</button>
                        </div>
                    </form> 
                    @error('search')
                        <p class="text-center">Adj meg legalább 4 karakter a kereséshez!</p>
                    @enderror                   
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kép</th>
                                <th class="px-4 py-2">Cím</th>
                                <th class="px-4 py-2">Város</th>
                                <th class="px-4 py-2">Vármegye</th>
                                <th class="px-4 py-2">Kategória</th>
                                <th class="px-4 py-2">Ár</th>
                                <th class="px-4 py-2">Eladó</th>
                                <th class="px-4 py-2">Megtekintés</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisements as $advertisement)
                                <tr>
                                    
                                    <td class="px-4 py-2 text-center">
                                        @if ($advertisement->pictures->isNotEmpty())
                                            <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép">
                                        @else
                                            <span>Nincs kép</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $advertisement->title }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->user->name }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('advertisements.show', $advertisement->advertisement_id) }}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Megtekintés</a>
                                    </td>
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
