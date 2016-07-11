<?php


namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.tasks.home' , [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);

    }
  /*  public function edit(Task $task, Request $request){

        if($request->ajax())
              'id' => $task->id,

        {
            $response = [
            'name' => $task->name
            ];

        }
        else
        {
            $tasks = Auth::user()->tasks()->orderby()->get('created_at');
            return view('pages.tasks.home', compact('tasks'));
        }

    }*/

    public function new_task(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'area2'=> 'required|max:255',

        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->area2;
        $task->status = '0';

        $task->save();

        return redirect('/home');
    }

    public function edit(Request $request){

        error_log('Some message here.');
        $task = Task::find($request['taskId']);
        $task -> name = $request['name'];
        $task -> description = $request['desc'];
        $task -> status = $request['status'];
        $task->update();
         return response()->json(['new_name' => $task->name],200);
    }
    public function status(Request $request){
        
        $task = Task::find($request['taskId']);
          $task -> status = $request['status'];
        $task->update();

    }


    public function delete_task(Request $request){


      Task::findOrFail($request['taskId'])->delete();
    }

}
