@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-2/3">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kép</th>
                                <th></th>
                                <td class="px-4 py-2">
                                    <div class="grid grid-cols-5 gap-2">
                                        @foreach ($advertisement->pictures as $i => $picture)    
                                            <a href="{{ asset('storage/' . $picture->src) }}" data-title="Image {{ $i + 1 }}">
                                                <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" style="width: 100%; height: auto; object-fit: cover; display: block; margin: 0 auto;" class="max-w-full rounded-lg">
                                            </a>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Cím</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->title }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Város</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->city->name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Vármegye</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Kategória</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Ár</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->price }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Leírás</th>
                                <th></th>
                                <td class="px-4 py-2 break-all">{{ $advertisement->description }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Eladó</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->user->name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Telefonszám</th>
                                <th></th>
                                <td class="px-4 py-2">{{ $advertisement->mobile_number }}</td>
                            </tr>
                        </thead>
                    </table>
                    @include('advertisements.components.sendMessage')
                </div>
            </div>
        </div>
    </div>
@endsection
