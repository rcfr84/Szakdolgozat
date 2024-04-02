@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @include('errors.components.errorMessage403')
                </div>
            </div>
        </div>
    </div>
@endsection
