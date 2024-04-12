@extends('layouts.app')
@section('content')
    <div class="min-h-screen container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-4/4">
                @include('components.statusAndError')
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if($names->isEmpty())
                        @include('components.searchNotFound')
                    @else
                        <div class="text-center mb-4 text-lg font-bold">@include('users.components.userCountForSearch')</div>
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Név</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($names as $name)
                                        <tr>
                                            <td class="px-4 py-2 max-w-[300px] break-words">{{ $name->name }}</td>
                                            <td class="px-4 py-2">
                                                <form method="POST" action="{{ route('users.destroy', ['userId' => $name->user_id])}}">
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
                            {{ $names->links() }}
                    </div>  
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection
