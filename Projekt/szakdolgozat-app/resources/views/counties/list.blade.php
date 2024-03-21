@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Vármegye</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counties as $county)
                                <tr>
                                    <td class="px-4 py-2">{{ $county->name }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('cities.index', ['countyId' => $county->county_id]) }}">
                                            @include('icons.show')
                                        </a>
                                    </td>
                                    @include('counties.components.editAndDelete')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a href="{{ route('counties.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 text-center">Hozzáadás</a>
                    </div>   
                </div>
            </div>
                
            </div>
        </div>
    </div>
@endsection
