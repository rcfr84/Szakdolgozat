@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;" class="p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kép</th>
                                <th class="px-4 py-2">Törlés</th>
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
                                        <button type="submit" style="background-color: #fc0303; color: white; padding: 10px; border-radius: 5px;">
                                            Törlés
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
