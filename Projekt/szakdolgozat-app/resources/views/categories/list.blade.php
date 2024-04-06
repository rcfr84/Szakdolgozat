@extends('layouts.app')
@section('content')
<div class="min-h-screen container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-4/4">
            @include('components.statusAndError')
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-center mb-4 text-lg font-bold">Kategóriák</div>
                <table class="table-auto w-full">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach ($categories->chunk(4) as $categoryChunk)
                        <tr>
                            @foreach ($categoryChunk as $category)
                            <td class="justify-center max-w-[300px] break-words">
                                <a href="{{ route('categories.show', ['categoryId' => $category->category_id]) }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    {{ $category->name }}
                                </a>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('categories.components.action')
            </div>
        </div>
    </div>
</div>
@endsection