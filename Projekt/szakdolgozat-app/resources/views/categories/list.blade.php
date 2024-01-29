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
                                <a href="{{ route('categories.show', ['categoryId' => $category->category_id]) }}" style="border: 1px solid #4CAF50; color: black; padding: 10px; border-radius: 5px; text-decoration: none; display: inline-block;">
                                    {{ $category->name }}
                                </a>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                        <td>
                            <a href="{{route('categories.action')}} " style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none; display: inline-block;">Kategória műveletek</a>
                        </td>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection