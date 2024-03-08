@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($advertisements->isNotEmpty())
                        <div class="text-center font-bold">{{ $advertisements->total() }} db találat.</div>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2" style="width: 150px; height: 200px;">Kép</th>
                                    <th class="px-4 py-2" style="width: 150px;">Cím</th>
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
                                        
                                        <td class="px-4 py-2 text-center">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép">
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
                                        <td class="px-4 py-2">
                                            <a href="{{ route('advertisements.show', $advertisement->advertisement_id) }}">
                                                @include('icons.show')
                                            </a>
                                        </td>
                                        @include('advertisements.editAndDeleteForAdmin')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{ $advertisements->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center mb-4 text-lg font-bold">Nincs találat.</div>
            @endif
            </div>
        </div>
    </div>
@endsection
