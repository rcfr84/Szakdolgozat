@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div class="bg-green-500 text-white p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kép</th>
                                <th></th>
                                <td class="px-4 py-2">
                                    @foreach ($advertisement->pictures as $picture)
                                        <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép" style="width: 400px; height: 400px;">
                                    @endforeach
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
                                <td class="px-4 py-2">{{ $advertisement->description }}</td>
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
                            <tr>
                                <td>
                                    <a href="{{ route('messages.create', ['receiverId' => $advertisement->user->user_id]) }}" class="btn btn-primary">
                                        Üzenet küldése
                                    </a>
                                </td>
                            </tr>    
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
