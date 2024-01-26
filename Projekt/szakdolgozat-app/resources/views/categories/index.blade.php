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
                       @forelse ($categories as $category)
                           <tr>
                            <td class="px-4 py-2">
                            {{ $category->name}}  
                            </td> 
                            <td class="px-4 py-2">
                                <a href="{{route('categories.edit', ['categoryId' => $category->category_id])}}">Módosítás</a>
                            </td>
                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('categories.destroy', ['categoryId' => $category->category_id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-2 rounded">Törlés</button>
                                </form>
                            </td>
                            </tr>
                           
                       @empty
                           
                       @endforelse
                        <td class="px-4 py-2">
                            <a href="{{ route('categories.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Új kategória hozzáadása</a>
                        </td>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection