@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-3/2">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md flex flex-col">
                    <form action="{{ route('pictures.store', $advertisement->advertisement_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        @php
                            $uploadedPictures = count($advertisement->pictures);
                            $remainingPicture = 5 - $uploadedPictures;
                        @endphp

                        @for ($i = 1; $i <= $remainingPicture; $i++)
                            <div class="mb-4">
                                <label for="pictures" class="form-label font-bold">Kép {{ $i }}</label>
                                <input type="file" class="form-input w-full" name="pictures[]" id="pictures{{ $i }}">
                            </div>
                        @endfor

                        @if ($remainingPicture > 0)
                            @include('pictures.components.createPicture')
                        @else
                            <p><b>Maximum csak 5 kép engedélyezett.</b></p>
                        @endif
                    </form>
                    @include('pictures.components.errorMessage')
                </div>
            </div>
        </div>
    </div>
@endsection
