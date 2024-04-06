@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if ($advertisements->isNotEmpty())
                    <div class="flex flex-col items-center justify-center">
                        @include('advertisements.components.searchByTitleOwn')
                    </div>
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
                                        <td class="px-4 py-2 text-center">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" class="h-32 w-32 object-contain">
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
                    @else
                        @include('advertisements.components.adNotFoundYet')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
