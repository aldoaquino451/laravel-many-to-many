<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPSTORM_META\map;

class TecnologyController extends Controller
{

  public function projectsTecnology()
  {
    $tecnologies = Tecnology::all();

    $projects = Project::all();
    $projects_no_tecnology = [];

    foreach ($projects as $project) {
      if ($project->tecnologies->isEmpty()) {
        $projects_no_tecnology[] = $project;
      }
    }

    return view('admin.tecnologies.projects-tecnology', compact('tecnologies', 'projects_no_tecnology'));
  }

  public function projectsByTecnology(Tecnology $tecnology)
  {
    return view('admin.tecnologies.projects-by-tecnology', compact('tecnology'));
  }

  public function projectsNoTecnology(Tecnology $tecnology)
  {
    $projects = Project::all();
    $projects_no_tecnology = [];

    foreach ($projects as $project) {
      if ($project->tecnologies->isEmpty()) {
        $projects_no_tecnology[] = $project;
      }
    }

    return view('admin.tecnologies.projects-no-tecnology', compact('tecnology', 'projects_no_tecnology'));
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tecnologies = Tecnology::orderBy('id', 'asc')->paginate(10);
    $tecnology_id = null;

    return view('admin.tecnologies.index', compact('tecnologies', 'tecnology_id'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $exist = Tecnology::where('name', $request->name)->first();

    if ($exist) {
      return redirect()
        ->route('admin.tecnologies.index')
        ->with('error', "'$exist->name' già presente");
    } else {
      $new_tecnology = new Tecnology();

      $new_tecnology->name = $request->name;
      $new_tecnology->slug = Str::slug($new_tecnology->name, '-');
      $new_tecnology->version = $request->version;


      $new_tecnology->save();

      return redirect()
        ->route('admin.tecnologies.index')
        ->with('success', "'$new_tecnology->name' inserito correttamente");
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Tecnology $tecnology)
  {
    $tecnologies = Tecnology::orderBy('id', 'asc')->paginate(10);
    $tecnology_id = $tecnology->id;

    return view('admin.tecnologies.index', compact('tecnologies', 'tecnology_id'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function update(Request $request, Tecnology $tecnology)
  {
    $data_form = $request->all();

    $tecnology->name = $data_form['name'];
    $tecnology->slug = Tecnology::generateSlug($tecnology->name);
    $tecnology->version = $data_form['version'];

    $tecnology->save();

    return redirect()->route('admin.tecnologies.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tecnology $tecnology)
  {
    $tecnology->delete();

    return redirect()->route('admin.tecnologies.index');
  }
}
