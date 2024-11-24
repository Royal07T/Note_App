<x-layout>
    <div class="note-container single-note">
        <h1 class="py-4 text-3xl">Edit your note</h1>
        <form action="{{ route('notes.update', $note) }}" method="POST" class="note">
            @csrf
            @method('PUT')
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your note here">{{ $note->note }}</textarea>
            <div class="note-buttons">
                <a href="{{ route('notes.index') }}" class="note-cancel-button">Cancel</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
