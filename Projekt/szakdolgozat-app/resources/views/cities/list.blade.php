@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Városok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($cities) === 0)
                                <tr>
                                    <td class="px-4 py-2">Nincsenek városok.</td>
                                </tr>  
                            @else
                                @foreach ($cities as $city)
                                    <tr>
                                        <td class="px-4 py-2">{{ $city->name }}</td>
                                        <td class="px-4 py-2">
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('cities.edit', $city->city_id) }}">
                                                @include('icons.edit')
                                            </a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('cities.destroy', ['cityId' => $city->city_id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    @include('icons.delete')
                                                </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('cities.create', ['countyId' => $city->county_id]) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 text-center">Hozzáadás</a>
                    </div>  
                </div>
            </div>
                
            </div>
        </div>
    </div>
@endsection
