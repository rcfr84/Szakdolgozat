<td class="px-4 py-2">
    <a href="{{ route('counties.edit', $county->county_id) }}">
        @include('icons.edit')
    </a>
</td>
<td class="px-4 py-2">
    <form method="POST" action="{{ route('counties.destroy', ['countyId' => $county->county_id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
</td>