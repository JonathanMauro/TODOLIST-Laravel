<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class ListController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); 
        return view('welcome', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
       
        $task->save();

         return redirect()->back()->with('msg', 'Tarefa salva com sucesso.');
    }


    public function delete($task_id){
        $task = Task::find($task_id);

        if($task){

            $task->delete();
            return redirect()->back()->with('msg', 'Tarefa Deletada!');
        } else {
            return redirect()->back()->with('error', 'Tarefa não encontrada! Não foi possível deletar a mesma.');
        }
    }


    

    public function markAsCompleted($task_id)
    {
        
        $task = Task::find($task_id);
    
        if (!$task) {
            return redirect()->back()->with('error', 'Tarefa não encontrada.');
        }
    
       
        if (!$task->completed) {
           
            $task->completed_at = now();
        } else {
            $task->completed_at = null;
            
        }
   
        $task->completed = !$task->completed;
    

        $task->save();
    
        return redirect()->back()->with('success', 'Estado de conclusão da tarefa atualizado.');
    }
    

}
