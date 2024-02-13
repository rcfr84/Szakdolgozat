@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('pictures.store', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        @php
                            $uploadedPicturesCount = count($advertisement->pictures);
                            $remainingPicture = 5 - $uploadedPicturesCount;
                        @endphp

                        @for ($i = 1; $i <= $remainingPicture; $i++)
                            <div class="mb-4">
                                <label for="pictures" class="form-label font-bold">Kép {{ $i }}</label>
                                <input type="file" class="form-input w-full" name="pictures[]" id="pictures{{ $i }}">
                            </div>
                        @endfor

                        @if ($remainingPicture > 0)
                            <div class="mb-4 text-center">
                                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Hozzáadás</button>
                            </div>
                        @else
                            <p>Maximum csak 5 kép engedélyezett.</p>
                        @endif
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Hiba!</strong> Problámák vannak az adatokkal.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
