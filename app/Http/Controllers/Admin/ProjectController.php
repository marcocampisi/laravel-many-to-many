<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        $types = Type::all();

        $technologies = Technology::all();

        return view('projects.index', compact('projects', 'types', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'required|array|min:1',
            'cover_image' => 'nullable|image|max:1024'
        ]);

        $project = Project::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'type_id' => $request->input('type_id')
        ]);

        if ($request->hasFile('cover_image')) {
            $filename = time() . '.' . $request->file('cover_image')->getClientOriginalExtension();
            $request->file('cover_image')->storeAs('public/images', $filename);
            $project->cover_image = $filename;
            $project->save();
        }

        $project->technologies()->sync($request->input('technologies'));

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('projects.show', compact('project', 'types', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'required|array|min:1'
        ]);
    
        $project->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'type_id' => $request->input('type_id')
        ]);

        $project->technologies()->sync($request->input('technologies'));
    
        return redirect()->route('projects.show', ['project' => $project])
            ->with('success', 'Progetto aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        
        $project->delete();

        return redirect()->route('projects.index');
    }
}
