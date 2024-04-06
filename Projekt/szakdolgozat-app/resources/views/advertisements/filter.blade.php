@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($advertisements->isNotEmpty())
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
                                    <th class="px-4 py-2">Eladó</th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $advertisement)
                                    <tr>
                                        
                                        <td class="px-4 py-2 text-center max-w-[150px]">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" class="h-32 w-32 object-contain">
                                            @else
                                                <span>Nincs kép</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 max-w-[150px] break-words">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2 max-w-[300px] break-words">{{ $advertisement->user->name }}</td>
                                        @include('advertisements.components.show')
                                        @include('advertisements.components.editAndDeleteForAdmin')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{ $advertisements->appends(request()->query())->links() }}
                </div>
            @else
                @include('components.searchNotFound')
            @endif
            </div>
        </div>
    </div>
@endsection
