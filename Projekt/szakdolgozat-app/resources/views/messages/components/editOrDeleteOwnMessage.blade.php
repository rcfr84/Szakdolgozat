<td class="px-4 py-2">
    @if ($message->sender_id == auth()->user()->user_id)
        <a href="{{ route('messages.edit', $message->message_id) }}">
            @include('icons.edit')
        </a>
    @endif
</td>
<td class="px-4 py-2">
    @if ($message->sender_id == auth()->user()->user_id)
    <form action="{{ route('messages.destroy', $message->message_id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
            @include('icons.delete')
        </button>
    </form>
    @endif
</td>