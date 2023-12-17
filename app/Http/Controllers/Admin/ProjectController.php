<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $projects = Project::orderBy('id', 'desc')->paginate(10);
    return view('admin.projects.index', compact('projects'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $types = Type::all();
    $tecnologies = Tecnology::all();
    return view('admin.projects.create', compact('types', 'tecnologies'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // salvo i dati che arrivano dal form
    $form_data = $request->all();

    // imposto un valore alla data e genero un nuovo slug
    $form_data['slug'] = Project::generateSlug($form_data['name']);
    $form_data['date'] = date('Y-m-d');

    // creo una nuova istanza con dentro i dati del form data
    $project = Project::create($form_data);

    // associo il project all'id di tecnology
    if (array_key_exists('tecnologies', $form_data)) {
      $project->tecnologies()->attach($form_data['tecnologies']);
    }

    // salvo, anche se non nesessario
    // $project->save();

    return view('admin.projects.show', compact('project'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Project $project)
  {
    return view('admin.projects.show', compact('project'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Project $project)
  {
    $types = Type::all();
    $tecnologies = Tecnology::all();
    return view('admin.projects.edit', compact('project', 'types', 'tecnologies'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Project $project)
  {
    $form_data = $request->all();

    $form_data['slug'] = Project::generateSlug($project->name);
    $form_data['date'] = date('Y-m-d');

    $project->update($form_data);

    // associo il project all'id di tecnology
    if (array_key_exists('tecnologies', $form_data)) {
      $project->tecnologies()->sync($form_data['tecnologies']);
    } else {
      $project->tecnologies()->detach();
    }

    return view('admin.projects.show', compact('project'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Project $project)
  {
    $project->delete();

    return redirect()->route('admin.projects.index');
  }
}
