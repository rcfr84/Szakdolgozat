@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-1/2">
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('pictures.store', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        @php
                            $uploadedPicturesCount = count($advertisement->pictures);
                            $remainingPicture = 5 - $uploadedPicturesCount;
                        @endphp

                        @for ($i = 1; $i <= $remainingPicture; $i++)
                            <div class="mb-4">
                                <label for="pictures" class="form-label">Kép {{ $i }}</label>
                                <input type="file" class="form-input w-full" name="pictures[]" id="pictures{{ $i }}">
                            </div>
                        @endfor

                        @if ($remainingPicture > 0)
                            <div class="mb-4 text-center">
                                <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;">Hozzáadás</button>
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
