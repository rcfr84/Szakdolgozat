@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
               @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
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
                                    <th class="px-4 py-2"></th>
                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>
                            @forelse ($advertisements as $advertisement)
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2 text-center">
                                            @if ($advertisement->pictures->isNotEmpty())
                                                <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" style="width: auto; height: auto; display: block; margin: 0 auto;">
                                            @else
                                                <span>Nincs kép</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 break-all">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2 break-all">{{ $advertisement->description }}</td>
                                        <td class="px-4 py-2 break-all">{{ $advertisement->mobile_number }} </td>
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
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2 font-bold" colspan="10">Nincs saját hirdetésed még.</td>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                </div>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
@endsection
