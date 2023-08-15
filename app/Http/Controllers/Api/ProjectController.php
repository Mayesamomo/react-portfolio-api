<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{

    //get all controller 
   public function index()
   {
    $projects = Project::with('user')->get(); 
    if($projects->count()>0){
        return response()->json([
            'status'=>200,
            'projects' => $projects
        ], Response::HTTP_OK);
    }else{
        return response()->json([
            'status'=> 404,
            'message'=> 'No Records Found!' 
        ],Response::HTTP_NOT_FOUND);
    }
    
   }
}
