<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\View\View
    {
        $notes = Note::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Display 10 items per page

        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\View\View
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'note' => ['required', 'string', 'max:500']
        ]);

        $note = Note::create($data);

        // Debugging: Verify the created note and the route resolution
        dd([
            'note' => $note,
            'route' => route('notes.show', $note)
        ]);

        return to_route('notes.show', $note)->with('message', 'Note was created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Note $note): \Illuminate\View\View
    {
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note): \Illuminate\View\View
    {
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validate([
            'note' => ['required', 'string', 'max:500'] // Added max length constraint
        ]);

        $note->update($data);

        return to_route('notes.show', $note)->with('message', 'Note was updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): \Illuminate\Http\RedirectResponse
    {
        try {
            $note->delete();

            return to_route('notes.index')->with('message', 'Note was deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors('Error deleting the note. Please try again.');
        }
    }
}
