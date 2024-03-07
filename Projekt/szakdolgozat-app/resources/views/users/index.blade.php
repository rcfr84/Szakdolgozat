@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex flex-col items-center justify-center">
                        <form action="{{ route('users.searchByName') }}" method="GET" class="mb-4">
                            @csrf
                            <div class="text-center">
                                <input type="text" name="search" placeholder="Keresés név alapján" class="mb-4">
                                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Keresés</button>
                            </div>
                        </form> 
                        @error('search')
                            @include('users.searchErrorMessage')
                        @enderror
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Név</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2" style="max-width: 300px; word-wrap: break-word;">{{ $user->name }}</td>
                                    <td class="px-4 py-2">
                                        <form method="POST" action="{{ route('users.destroy', ['userId' => $user->user_id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                @include('icons.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $users->links() }}
            </div>
                
            </div>
        </div>
    </div>
@endsection
