<td class="px-4 py-2">
    <a href="{{ route('advertisements.edit', $advertisement->advertisement_id) }}">
        @include('icons.edit')
    </a>
</td>
<td class="px-4 py-2">
    <form method="POST" action="{{ route('advertisements.destroy', $advertisement->advertisement_id) }}">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
</td>