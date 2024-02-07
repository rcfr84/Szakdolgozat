@extends('layouts.app')
@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @if(session('status'))
                    <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;" class="p-4 mb-4">{{ session('status') }}</div>
                @endif
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-center mb-4 text-lg font-bold">{{$category->name}}</div>
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
                                    <td class="px-4 py-2">
                                        @if ($advertisement->pictures->isNotEmpty())
                                            <img src="{{ asset('storage/' . $advertisement->pictures->first()->src) }}" alt="Kép" style="width: 8cm; height: auto;">
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
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="green" width="30" height="30">
                                                <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $advertisements->links() }}
            </div>
        </div>
    </div>
@endsection
