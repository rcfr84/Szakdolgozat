<td class="px-4 py-2">
    <a href="{{ route('messages.showConversation', ['user1_id' => $message->sender_id, 'user2_id' => $message->receiver_id]) }}">
        @include('icons.show')
    </a>
</td>