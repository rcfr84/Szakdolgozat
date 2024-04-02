<td class="px-4 py-2">
    <form method="POST" action="{{ route('users.destroy', ['userId' => $user->user_id])}}">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
</td>