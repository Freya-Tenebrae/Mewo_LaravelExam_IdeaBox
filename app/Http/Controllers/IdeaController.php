<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Idea;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IdeaController extends Controller
{
    use AuthorizesRequests;
    
    public function dashboard()
    {
        return $this->index();
    }

    public function index()
    {
        $ideas = Auth::user()->ideas()->latest()->get();
        return view('idea.dashboard', compact('ideas'));
    }

    public function create()
    {
        return view('idea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $idea = Auth::user()->ideas()->create($request->only('title', 'description'));

        return redirect()->route('ideas.index')->with('success', 'Idea "' . $idea->title . '" created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $idea = Idea::findOrFail($id);
        $this->authorize('view', $idea);

        return view('idea.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idea = Idea::findOrFail($id);
        $this->authorize('update', $idea);

        return view('idea.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $idea = Idea::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $idea->update($request->only('title', 'description'));

        return redirect()->route('ideas.index')->with('success', 'Idea "' . $idea->title . '" updated successfully.');
    }

    public function destroy(string $id)
    {
        $idea = Idea::findOrFail($id);
        $this->authorize('delete', $idea);

        $idea->delete();
        return redirect()->route('ideas.index')->with('success', 'Idea "' . $idea->title . '" deleted successfully.');
    }
}
