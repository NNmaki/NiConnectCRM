<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Gate;
use App\Enums\PermissionEnum;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['user', 'client'])
            ->orderBy('deadline_at', 'asc')
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        return view('projects.create', compact('users', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index')
        ->with('success', 'New Project has been created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        return view('projects.edit', compact('project', 'users', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')
        ->with('success', 'Project has been updated succesfully');
    }


    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Project $project)
    {
    if ($project->tasks()->count() >0)
        return redirect()->route('projects.index')
            ->with('error', 'Projects has active tasks and cannot be deleted.');

        Gate::authorize(PermissionEnum::DELETE_PROJECTS->value);
        $project->delete();
        return redirect()->route('projects.index')
        ->with('success', 'Project has been deleted succesfully');
    }


        // Tama on vain mallina
    //     public function destroy(User $user): RedirectResponse
    // {
    // if ($user->projects()->count() > 0) 
    //     return redirect()->route('users.index')
    //         ->with('error', 'The user has active projects and cannot be deleted.');
    // $user->delete();
    //     return redirect()->route('users.index')
    //     ->with('success', 'User has been deleted succesfully');
    // }

        
    













}
