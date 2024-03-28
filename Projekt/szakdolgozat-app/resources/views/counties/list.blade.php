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
                   @include('counties.components.createCounty')
                </div>
            </div>
                
            </div>
        </div>
    </div>
@endsection
