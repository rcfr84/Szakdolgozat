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
                                    <th class="px-4 py-2">Cím</th>
                                    <th class="px-4 py-2">Város</th>
                                    <th class="px-4 py-2">Vármegye</th>
                                    <th class="px-4 py-2">Kategória</th>
                                    <th class="px-4 py-2">Ár</th>
                                    <th class="px-4 py-2">Leírás</th>
                                    <th class="px-4 py-2">Telefonszám</th>
                                    <th class="px-4 py-2">Módosítás</th>
                                    <th class="px-4 py-2">Törlés</th>
                                </tr>
                            </thead>
                            @forelse ($advertisements as $advertisement)
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2">
                                            @if ($advertisement->picture_id != null)
                                                <img src="{{ asset('storage/images/' . $advertisement->pictures->first()->src) }}">
                                            @else
                                                Nincs kép
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->description }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->mobile_number }} </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}" class="bg-blue-500 text-white p-2 rounded">Módosítás</a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white p-2 rounded">Törlés</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2" colspan="10">Nincs hirdetés</td>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection
