<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;
use App\Models\Blogposts;

class BlogpostController extends Controller
{
public function createBlogposts(Request $request){
    $authors = Authors::find($request->authors_id);

    if(!$authors) return response()->json([
        'status' => false,
        'message' => 'User does not exist'
    ], 404);

    $blogposts = new  Blogposts;
    $blogposts->authors_id = $request->authors_id;
    $blogposts->title = $request->title;
    $blogposts->body = $request->body;

    $blogposts->save();
    
    return response()->json([
        'status' =>true,
        'data' => $blogposts
    ]);
}
public function authors(){
    return response()->json([
        'status'=> true,
        'data' => Blogposts::all()
    ]);
}
public function getSingleBlogposts($id){
    $blogposts =Blogposts::find($id);
    return response()->json([
        'status' => true,
        'data' => $blogposts
    ]);
}
public function update($id, Request $request){
    $blogposts = Blogposts::find($id);
    $blogposts->authors_id = $request->authors_id;
    $blogposts->title = $request->title;
    $blogposts->body = $request->body;
    $blogposts->save();
    return response()->json([
        'status'=>true,
        'success' =>'Update successful',
        'data' => $blogposts
    ]);

}
public function delete($id){
    Blogposts::findorfail($id)->delete();
    return  response()->json([
    'status'=> true,
    'success' => 'Deleted Successfuly'
    ], 200);
}
}
