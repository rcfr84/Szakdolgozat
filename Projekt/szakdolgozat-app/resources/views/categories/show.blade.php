@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($advertisements->isEmpty())
                        <div class="text-center mb-4 text-lg font-bold">Nincsen {{$category->name}} kategóriájú hirdetés!</div>
                    @else
                        <div class="text-center mb-4 text-lg font-bold">{{$category->name}}</div>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Kép</th>
                                    <th class="px-4 py-2" style="width: 150px;">Cím</th>
                                    <th class="px-4 py-2">Város</th>
                                    <th class="px-4 py-2">Vármegye</th>
                                    <th class="px-4 py-2">Kategória</th>
                                    <th class="px-4 py-2">Ár</th>
                                    <th class="px-4 py-2">Eladó</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $advertisement)
                                    <tr>
                                        <td class="px-4 py-2">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" class="h-32 w-32 object-contain">
                                            @else
                                                <span>Nincs kép</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->user->name }}</td>
                                        @include('advertisements.components.show')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
@endsection
