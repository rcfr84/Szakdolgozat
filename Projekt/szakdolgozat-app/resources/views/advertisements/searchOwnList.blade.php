@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if ($advertisements->isEmpty())
                        @include('components.searchNotFound')
                    @else
                        @include('advertisements.components.totalAd')
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Kép</th>
                                <th class="px-4 py-2">Cím</th>
                                <th class="px-4 py-2">Város</th>
                                <th class="px-4 py-2">Vármegye</th>
                                <th class="px-4 py-2">Kategória</th>
                                <th class="px-4 py-2">Ár</th>
                                <th class="px-4 py-2">Leírás</th>
                                <th class="px-4 py-2">Telefonszám</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($advertisements as $advertisement)
                                <tr>
                                    <td class="px-4 py-2 text-center max-w-[150px]">
                                        @if ($advertisement->pictures->isNotEmpty())
                                            <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" style="width: auto; height: auto; display: block; margin: 0 auto;">
                                        @else
                                            <span>Nincs kép</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 max-w-[150px] break-words">{{ $advertisement->title }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                    <td class="px-4 py-2 break">{{ substr($advertisement->description, 0, 50) }}</td>
                                    <td class="px-4 py-2 break">{{ $advertisement->mobile_number }} </td>
                                    @include('advertisements.components.editAndDelete')
                                </tr>
                            @empty   
                            @endforelse
                        </tbody>
                    </table>
                    {{ $advertisements->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
