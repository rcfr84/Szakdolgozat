@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-2/3">
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
                        </thead>
                    </table>
                    <div class="flex flex-col items-center justify-center">  
                        @if($advertisement->user->user_id != Auth::user()->user_id)
                            <th class="px-4 py-2 flex justify-center">
                                <a href="{{ route('messages.create', ['receiverId' => $advertisement->user->user_id]) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Üzenet küldése
                                </a>
                            </th>
                        @endif
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection
