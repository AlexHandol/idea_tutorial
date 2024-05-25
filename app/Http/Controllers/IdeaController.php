<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        //OLD VERSION VALIDATION AND CREATE

        // request()->validate([
        //     'idea-content' => 'required|min:3|max:240'
        // ]);

        // $idea = Idea::create(
        //     [
        //         'content' => request()->get('idea-content', ''),
        //     ]
        // );

        //NEW VERSION VALIDATION AND CREATE

        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ], [
            'content.required' => 'The content field is required' //My custom validation text
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);


        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea)
    {
        return view('ideas.view.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        $editing = true;

        return view('ideas.view.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        request()->validate([
            'idea-content' => 'required|min:3|max:240'
        ]);

        $idea->content = request()->get('idea-content', '');
        $idea->save();

        return redirect()->route('ideas.view.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
