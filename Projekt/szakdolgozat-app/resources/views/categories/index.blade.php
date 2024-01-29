@extends('layouts.app')
@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-center">
        <div class="w-4/4">
            @if(session('status'))
            <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px;" class="p-4 mb-4">{{ session('status') }}</div>
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
                                <a href="{{route('categories.edit', ['categoryId' => $category->category_id])}}"style="background-color: #0388fc; color: white; padding: 10px; border-radius: 5px; text-decoration: none; display: inline-block;">Módosítás</a>
                            </td>
                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('categories.destroy', ['categoryId' => $category->category_id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #fc0303; color: white; padding: 10px; border-radius: 5px;">Törlés</button>
                                </form>
                            </td>
                            </tr>
                       @empty
                       @endforelse
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('categories.create') }}" style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; text-decoration: none; display: inline-block;">Új kategória hozzáadása</a>
                        </td>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection