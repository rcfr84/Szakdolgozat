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
                                <th class="px-4 py-2">Kép</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advertisementPictures as $picture)
                            <tr>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" style="width: 8cm; height: auto; display: block; margin-left: auto; margin-right: auto;">
                                </td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('pictures.destroy', ['pictureId' => $picture->picture_id] ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            @include('icons.delete')
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="flex flex-col items-center justify-center">
                        <a href="{{route('advertisements.edit', ['advertisementId' => $advertisement->advertisement_id])}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Vissza</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
