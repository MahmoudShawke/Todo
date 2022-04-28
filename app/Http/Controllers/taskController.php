<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class taskController extends Controller
{

    function index(){
        if(session('id')){
            
            $id=session('id');
            $data = Tasks::select("*")->where("user_id", $id)->get();
            
           
            return view('Tasks.index', ['data' => $data]);
        }else{
            return view('Users.Login');
        }
      
       

    }
    function create(){

       
        if(session('id')){
            return view('Tasks.Create');
        }else{
            return view('Users.Login');
        }
      
       
    }

    function store(Request $request)
    {
        $data=$this->validate($request,[
            "content"     => 'required',
            "title" => "required|min:6|max:20",
            "start_date"    => "required",
            "end_date"    => "required",
            "image"       =>"required|image|mimes:jpg,jpeg,png"

        ]);
        $data['user_id'] = session('id');

        $data['start_date'] = strtotime($request->start_date);
        $data['end_date'] = strtotime($request->end_date);


         # Rename Image ....
         $img=new ImageClass();
         $data['image']= $img->Store($request);
         
        //  $FinalName = uniqid() . '.' . $request->image->extension();

        //  if ($request->image->move(public_path('/tasks'), $FinalName)) {
        //      $data['image'] = $FinalName;
        //  }


         $op =   DB :: table('tasks')->insert($data);

         if($op){
             $message = "Raw Inserted";
         }else{
             $message = "Error Try Again";
         }

         session()->flash('Message',$message);

         return redirect( url('/task'));

     



    }

    function softdelete($id){
        $task=Tasks::find($id);
        $old_image=$task->image;
        Tasks::where('ID', $id)->delete();
        unlink($old_image);
       
           return Redirect()->back()->with('Success','Deleted  Successfully');
       }
}
