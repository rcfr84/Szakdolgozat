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