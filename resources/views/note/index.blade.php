<x-app-layout>
    <div class="note-container">
        <a href="{{ route('notes.create') }}" class="new-note-btn">
            New Note
        </a>

        <div class="notes">
            @foreach($notes as $note)
            <div class="note">
                <div class="note-body">
                    {{ Str::words($note->note, 30) }}
                </div>
                <div class="note-buttons">
                    <a href="{{ route('notes.show', $note->id) }}" class="note-view-button">View</a>
                    <a href="{{ route('notes.edit', $note->id) }}" class="note-edit-button">Edit</a>

                    <!-- Add a delete form -->
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="note-delete-button">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Add pagination links -->
        <div class="pagination">
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>

