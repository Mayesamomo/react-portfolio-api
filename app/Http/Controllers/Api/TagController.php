<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class TagController extends Controller
{
    //get all tags
    public function index()
    {
        $tags = Tag::all(); //lazy loading
        if($tags->count()>0){
            return response()->json([
                'status'=>200,
                'tags' => $tags],
                Response::HTTP_OK);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'No Records Found!' 
            ],Response::HTTP_NOT_FOUND);
        }
       
    }

    //create tag
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(), [
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:7', // valid hex color code
        ]);
        
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ], 422);
        }else{
            $tag = Tag::create([
                'name' => $request->name,
                'color' => $request->color,
            ]);
            if($tag){
                return response()->json([
                    'status'=>200,
                    'message'=>'tag created successfully'
                ],200);
            }else{
                return response()->json([
                    'status'=> 404,
                    'message'=> 'No Records Found!' 
                ],Response::HTTP_NOT_FOUND);
            }
        }
}

//get a tag by Id 

public function show($id)
{
    $tag= Tag::find($id);
    if($tag)
    {
        return response()->json([
            'status'=>200,
            'tag'=>$tag
        ],Response::HTTP_OK);
    }else{
        return response()->json([
            'status'=> 404,
            'message'=> 'No such Tag  Found!' 
        ],Response::HTTP_NOT_FOUND);
    }
}

//edit function 

public  function edit($id)
{
    $tag= Tag::find($id);
    if($tag)
    {
        return response()->json([
            'status'=>200,
            'tag'=>$tag
        ],Response::HTTP_OK);
    }else{
        return response()->json([
            'status'=> 404,
            'message'=> 'No such Tag  Found!' 
        ],Response::HTTP_NOT_FOUND);
    }
}

public function update(Request $request, int $id)
{
    $validator = Validator::make( $request->all(), [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:7', // valid hex color code
    ]);
    
    if($validator->fails()){
        return response()->json([
            'status'=>422,
            'error'=>$validator->messages()
        ], 422);
    }else{
        $tag = Tag::find($id);
        if($tag){
            $tag->update([
                'name' => $request->name,
                'color' => $request->color,
            ]);
            return response()->json([
                'status'=>200,
                'message'=>'tag update successfully'
            ],200);
        }else{
            return response()->json([
                'status'=> 404,
                'message'=> 'No such Tags Found!' 
            ],Response::HTTP_NOT_FOUND);
        }
    }
}
}
