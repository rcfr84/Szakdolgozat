@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-4/4">
            @if(session('status'))
                <div class="bg-green-500 text-white p-4 mb-4">{{ session('status') }}</div>
            @endif
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-center mb-4 text-lg font-bold">Kategóriák</div>
                <table class="table-auto w-full">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach ($categories->chunk(4) as $categoryChunk)
                        <tr>
                            @foreach ($categoryChunk as $category)
                            <td class="px-4 py-2">
                                <a href="{{ route('categories.show', ['categoryId' => $category->category_id]) }}">
                                    {{ $category->name }}
                                </a>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                        <td>
                            <a href="{{route('categories.action')}} " class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Kategória műveletek</a>
                        </td>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection