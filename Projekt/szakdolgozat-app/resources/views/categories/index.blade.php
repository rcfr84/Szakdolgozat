@extends('layouts.app')
@section('content')
<div class="min-h-screen container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-4/4">
            @include('statusAndError')
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-center mb-4 text-lg font-bold">Kategóriák</div>
                <table class="table-auto w-full">
                    <thead>
                    </thead>
                    <tbody>
                       @forelse ($categories as $category)
                           <tr>
                            <td class="px-4 py-2">
                            {{ $category->name}}  
                            </td> 
                            <td class="px-4 py-2">
                                <a href="{{route('categories.edit', ['categoryId' => $category->category_id])}}">
                                    @include('icons.edit')
                                </a>
                                
                            </td>
                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('categories.destroy', ['categoryId' => $category->category_id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        @include('icons.delete')
                                    </button>
                                </form>
                            </td>
                            </tr>
                       @empty
                       @endforelse                      
                    </tbody>
                </table>
                <div class="flex flex-col items-center justify-center">
                    <a href="{{ route('categories.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Új kategória hozzáadása</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection