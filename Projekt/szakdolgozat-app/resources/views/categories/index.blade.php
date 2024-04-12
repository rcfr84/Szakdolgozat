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
                       @forelse ($categories as $category)
                           <tr>
                                <td class="px-4 py-2 max-w-[200px] break-words">
                                    {{ $category->name}}  
                                </td> 
                                    @include('categories.components.editOrDelete')
                            </tr>
                       @empty
                       @endforelse                      
                    </tbody>
                </table>
                @include('categories.components.createButton')
            </div>
        </div>
    </div>
</div>
@endsection