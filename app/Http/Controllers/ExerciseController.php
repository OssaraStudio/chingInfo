<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @OA\Get(
 *      path="/",
 *      operationId="getAllModule",
 *      tags={"Modules"},

 *      summary="Avoir la liste des modules informatique",
 *      description="Affiche la liste de tout les modules informatique enregistré en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="/modules/{slug}",
 *      operationId="getAllModuleExercices",
 *      tags={"Modules"},

 *      summary="Avoir la liste des exercices present dans un module",
 *      description="Affiche la liste de tout les exercice enregistré en base de données appartenant à un module",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="/exercices",
 *      operationId="getAllExercices",
 *      tags={"Exercices"},

 *      summary="Avoir la liste des exercices",
 *      description="Affiche la liste de tout les exercices enregistrés en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="/exercices",
 *      operationId="getAllExercicesSelect",
 *      tags={"Exercices"},

 *      summary="Avoir les exercices selectionnés",
 *      description="Affiche tout les exercices selectionnés et leurs solutions si existante",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="/exercice/{id}/{slug}",
 *      operationId="getExercice",
 *      tags={"Exercice"},

 *      summary="Afficher un exercices",
 *      description="Affiche un exercice enregistré en base de données et sa solution si existante",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="/recherche/{slug}",
 *      operationId="getSearch",
 *      tags={"Recherche"},

 *      summary="Effectuer une recherche",
 *      description="Retourne la liste de tout les exercices contenant le mot clé recherché",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="application/json",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="admin/modules",
 *      operationId="getAllModules",
 *      tags={"Admin"},

 *      summary="Avoir la liste des modules coté administrateur",
 *      description="Retourne tout les modules enregistré en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="admin/modules/create",
 *      operationId="createModule",
 *      tags={"Admin"},

 *      summary="créer un module",
 *      description="Ajoute un module en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="admin/modules/edit",
 *      operationId="editModule",
 *      tags={"Admin"},

 *      summary="modifie un module",
 *      description="Modifie un module en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Delete(
 *      path="admin/modules/delete",
 *      operationId="deleteModule",
 *      tags={"Admin"},

 *      summary="supprime un module",
 *      description="Supprime un module en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="admin/exercises",
 *      operationId="getAllExercises",
 *      tags={"Admin"},

 *      summary="Avoir la liste des exercices coté administrateur",
 *      description="Retourne tout les exercices enregistré en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="admin/exercises/create",
 *      operationId="createExercise",
 *      tags={"Admin"},

 *      summary="créer un exercice",
 *      description="Ajoute un exercice en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="admin/exercises/edit",
 *      operationId="editExercise",
 *      tags={"Admin"},

 *      summary="modifie un exercice",
 *      description="Modifie un exercice en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Delete(
 *      path="admin/exercises/delete",
 *      operationId="deleteExercise",
 *      tags={"Admin"},

 *      summary="supprime un exercice",
 *      description="Supprime un exercice en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Get(
 *      path="admin/solutions",
 *      operationId="getAllSolutions",
 *      tags={"Admin"},

 *      summary="Avoir la liste des solutions coté administrateur",
 *      description="Retourne toutes les solutions enregistré en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * @OA\Post(
 *      path="admin/solutions/create",
 *      operationId="createSolution",
 *      tags={"Admin"},

 *      summary="créer une solution",
 *      description="Ajoute une solution en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 * 
 * @OA\Post(
 *      path="admin/solutions/edit",
 *      operationId="editSolution",
 *      tags={"Admin"},

 *      summary="modifie une solution",
 *      description="Modifie une solution en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  ),
 *
 * @OA\Delete(
 *      path="admin/solutions/delete",
 *      operationId="deleteSolution",
 *      tags={"Admin"},

 *      summary="supprime une solution",
 *      description="Supprime une solution en base de données",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\MediaType(
 *           mediaType="text/html",
 *      )
 *      ),
 * @OA\Response(
 *      response=404,
 *      description="not found"
 *   ),
 *  )
 */





class ExerciseController extends Controller
{
    //

    public function index()
    {
        $modules = Module::all();
        $count = Exercise::where('online', 1)->count();
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

    public function show($id)
    {
        $modules = Module::all();
        $exercise = Exercise::where('id', $id)->where('online', 1)->firstOrFail();
        $link = 'http://localhost:8000/storage/'.trim(json_decode($exercise->file)[0]->download_link);
        return view('exercise.show', [
            'modules' => $modules,
            'exercise' => $exercise,
            'link' => $link
        ]);
    }

    public function allExercises()
    {
        $modules = Module::all();
        $exercises = Exercise::where('online', 1)->get();
        return view('exercise.all', [
            'modules' => $modules,
            'exercises' => $exercises
        ]);
    }

    public function search($slug)
    {
        $allexercises = Exercise::where('title', 'like', '%' . $slug . '%')
            ->orWhere('content', 'like', '%' . $slug . '%')
            ->get();

        $exercises = array();
        foreach ($allexercises as $exercise) {
            if ($exercise->online === 1) {
                $exercises[] = $exercise;
            }
        }
        $data = array();
        foreach ($exercises as $exercise) {
            $data[] = [
                "id" => $exercise->id,
                "slug" => $exercise->slug,
                "title" => $exercise->title,
                "module" => $exercise->module->title
            ];
        }
        return response()->json($data);
    }

    public function select(Request $request)
    {
        $exercises = Exercise::whereIn('id', $request->id)->where('online', 1)->get();
        $modules = Module::all();
        $links = array();
        foreach($exercises as $exercise)
        {
            if($exercise->file){
                $links[] = 'http://localhost:8000/storage/'.trim(json_decode($exercise->file)[0]->download_link);
            }
        }
        return view('exercise.select', [
            'modules' => $modules,
            'exercises' => $exercises,
            'links' => $links
        ]);
    }

    
}
