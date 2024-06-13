<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\TaskService;
use App\Services\ProjectService;
class TaskController extends Controller
{
    protected $taskService ;
    protected $projectService;
    public function __construct(TaskService $taskService, ProjectService $projectService)
    {
        $this->taskService = $taskService;
        $this->projectService = $projectService;
    }
    public function create()
    {
        $projects =$this->projectService->getAll();
        return View('Task.Create',compact('projects'));
    }
    public function store(Request $request){
        $this->taskService->create($request->all());
        return redirect()->route('tasks.index');
        
    }
    public function index()
    {    $projects =$this->projectService->getAll();
        $tasks=$this->taskService->getAll(2);
        return View('Task.Index',compact('tasks', 'projects'));
    }
    public function edit($id)
    {   $task=$this->taskService->findOne($id);
        $projects =$this->projectService->getAll();
        return View('Task.Edit',compact('task','projects'));
    }

    public function filter(Request $request)
    {
        $tasks =$this->taskService->filter($request->all());
        $projects =$this->projectService->getAll();
        return View('Task.Index',compact('tasks', 'projects'));

    }
    public function destroy($id)
    {
        $this->taskService->delete($id);
        return redirect()->route('tasks.index');
    }
   public function update($id,Request $request)
   {
    $data=$request->all();
    $this->taskService->updateTask($id,$request->all());
    return redirect()->route('tasks.index');
   }
}
