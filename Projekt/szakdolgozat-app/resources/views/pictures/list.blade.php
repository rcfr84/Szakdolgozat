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
                                <th class="px-4 py-2">Kép</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisementPictures as $picture)
                            <tr>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" class="h-40 w-auto mx-auto mb-1 block">
                                </td>
                                @include('pictures.components.delete')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('pictures.components.back')
                </div>
            </div>
        </div>
    </div>
@endsection
