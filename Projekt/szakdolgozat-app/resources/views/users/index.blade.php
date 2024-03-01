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
