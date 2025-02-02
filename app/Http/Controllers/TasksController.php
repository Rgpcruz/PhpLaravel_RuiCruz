<?php

namespace App\Http\Controllers;

use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\View\Components\Task;

class TasksController extends Controller
{

    public function showAllTasks()
    {
        $allTasks = $this->getTasksFromDB();
        //($allTasks); //usado para debug (dump and die)
         return view('tasks.tasks', compact('allTasks'));
    }

    protected function getTasksFromDB() {
        $tasks = DB::table('tasks')
        ->Join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.id', 'tasks.description', 'tasks.user_id', 'tasks.name', 'users.name as user_name' )
        ->get();

        return $tasks;
    }

    public function viewTasks($id) {
        $task = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select('tasks.id', 'tasks.description', 'tasks.user_id', 'tasks.name', 'users.name as user_name')
            ->where('tasks.id', $id)
            ->first();

        if (!$task) {
            abort(404, 'Task not found.');
        }

        return view('tasks.view', compact('task'));
    }

    public function showAddTaskForm(){
    $users = DB::table('users')->select('id', 'name')->get();
    return view('tasks.create_task', ['userIds' => $users]);
}


    public function deleteTaskFromDB($id) {
        DB::table('tasks')->where('id', $id)->delete();
        return back();
    }

    public function createTask(Request $request){

        $request->validate([
            'name'=> 'required|string|max:50',
            'description'=>'required|string',
            'user_id' => 'required'
        ]);

        DB::table('tasks')->insert([
            'name'=> $request->name,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
        ]);

        return redirect()->route('tasks.show')->with('message','Task has been added with success!');
    }
    public function showEditTaskForm($id){
    $task = DB::table('tasks')
        ->join('users', 'users.id', '=', 'tasks.user_id')
        ->select('tasks.id', 'tasks.name', 'tasks.description', 'tasks.user_id', 'users.name as user_name')
        ->where('tasks.id', $id)
        ->first();

    $users = DB::table('users')->select('id', 'name')->get();

    if (!$task) {
        abort(404, 'Task not found.');
    }

    return view('tasks.edit_tasks', compact('task', 'users'));
}

public function updateTask(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string',
        'user_id' => 'required'
    ]);

    DB::table('tasks')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

    return redirect()->route('tasks.show')->with('message', 'Task updated successfully!');
}






}
