@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if ($advertisements->isEmpty())
                        <div class="text-center mb-4 text-lg font-bold">Nincs találat.</div>
                    @else
                    <div class="text-center mb-4 text-lg font-bold"> {{$advertisements->total()}} db találat.</div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2" style="width: 150px; height: 200px;">Kép</th>
                                <th class="px-4 py-2" style="width: 150px;">Cím</th>
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
                                            <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" style="width: auto; height: auto; display: block; margin: 0 auto;">
                                        @else
                                            <span>Nincs kép</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 break">{{ $advertisement->title }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                    <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                    <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                    <td class="px-4 py-2 break">{{ $advertisement->description }}</td>
                                    <td class="px-4 py-2 break">{{ $advertisement->mobile_number }} </td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}">
                                            @include('icons.edit')
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                @include('icons.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center mb-4 text-lg font-bold">Nincs még hirdetésed.</td>
                                </tr>
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
