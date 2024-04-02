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
                                        <td class="px-4 py-2"></td>
                                        @include('cities.components.editAndDelete')
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @include('cities.components.createCity')
                </div>
            </div>
                
            </div>
        </div>
    </div>
@endsection
