@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div style="background-color: #0388fc; color: white; padding: 10px; border-radius: 5px;">{{ session('status') }}</div>
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
                                            @foreach ($advertisement->pictures as $picture)
                                                <img src="{{ asset('storage/' . $picture->src) }}" alt="Kép">
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2">{{ $advertisement->title }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->name}}</td>
                                        <td class="px-4 py-2">{{ $advertisement->city->county->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->category->name }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->price }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->description }}</td>
                                        <td class="px-4 py-2">{{ $advertisement->mobile_number }} </td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}" style="background-color: #0388fc; color: white; padding: 10px; border-radius: 5px;">Módosítás</a>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #fc0303; color: white; padding: 10px; border-radius: 5px;">Törlés</button>
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
