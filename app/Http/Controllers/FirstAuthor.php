<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authors;

class FirstAuthor extends Controller
{
   public function index(){
       return response()->json([
        'status' => true

       ]);
   }
   public function create(Request $request){
       $this->validate($request,[
        'Surname' => 'required',
        'Firstname' => 'required',
        'PhoneNumber' => 'required',
        'Email' => 'required',
        'Position' => 'required',
        'Email' => 'required',
        'D_O_B' => 'required'
       ]);
       $authors = new Authors;
       $authors->Surname=$request->Surname;
       $authors->Firstname=$request->Firstname;
       $authors->PhoneNumber=$request->PhoneNumber;
       $authors->Email=$request->Email;
       $authors->Position=$request->Position;
       $authors->D_O_B=$request->D_O_B;
      
       $authors->save();
      
       return response()->json([
           'status'=>true,
           'data'=>$authors
       ]);
    }
    public function authors(){
        return response()->json([
            'status'=> true,
            'data' => Authors::all()
        ]);
    }
    public function getSingleAuthors($id){
        $authors =Authors::find($id);
        return response()->json([
            'status' => true,
            'data' => $authors
        ]);
    }
    public function update($id, Request $request){
        $authors = Authors::find($id);
        $authors->Surname=$request->Surname;
        $authors->Firstname=$request->Firstname;
        $authors->PhoneNumber=$request->PhoneNumber;
        $authors->Email=$request->Email;
        $authors->Position=$request->Position;
        $authors->D_O_B=$request->D_O_B;
        $authors->save();
        return response()->json([
            'status'=>true,
            'success' =>'Update successful',
            'data' => $authors
        ]);

    }
    public function delete($id){
        Authors::findorfail($id)->delete();
        return  response()->json([
        'status'=> true,
        'success' => 'Deleted Successfuly'
        ], 200);
    }
}
