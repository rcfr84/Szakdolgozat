<td class="px-4 py-2">
    <a href="{{ route('cities.edit', $city->city_id) }}">
        @include('icons.edit')
    </a>
</td>
<td class="px-4 py-2">
    <form method="POST" action="{{ route('cities.destroy', ['cityId' => $city->city_id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
</td>