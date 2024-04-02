<td class="px-4 py-2">
    <form action="{{ route('pictures.destroy', ['pictureId' => $picture->picture_id] ) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
</td>