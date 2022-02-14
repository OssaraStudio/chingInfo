<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Module;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    //

    public function index()
    {
        $modules = Module::all();
        $count = Exercise::all()->count();
        return view('module.index', [
            'modules' => $modules,
            'count' => $count
        ]);
    }

    public function all($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();
        $modules = Module::all();
        return view('exercise.index', [
            'module' => $module,
            'modules' => $modules
        ]);
    }

    public function show($slug)
    {
        $modules = Module::all();
        $exercise = Exercise::where('slug', $slug)->firstOrFail();
        return view('exercise.show', [
            'modules' => $modules,
            'exercise' => $exercise
        ]);
    }

    public function allExercises()
    {
        $modules = Module::all();
        $exercises = Exercise::all();
        return view('exercise.all', [
            'modules' => $modules,
            'exercises' => $exercises
        ]);
    }

    public function search($slug)
    {
        $exercises = Exercise::where('title', 'like', '%'.$slug.'%')
        ->orWhere('content', 'like', '%'.$slug.'%')
        ->get();
        $data = array();
        foreach($exercises as $exercise){
            $data[] = [
                "id" => $exercise->id,
                "slug" => $exercise->slug,
                "title" => $exercise->title,
                "module" => $exercise->module->title
            ];
        }

        

        return response()->json($data);
    }
}
