<?php
namespace App\Services;


use App\Repositories\TaskRepository;
class TaskService extends BaseService 
{
    protected $taskRepository ;
    public function __construct (TaskRepository $taskRepository)
    {
        parent::__construct($taskRepository);
        $this->taskRepository = $taskRepository;
    }
    
    public function filter($data)
    {
        return $this->taskRepository->filter($data);
    }
    public function updateTask($id,$data){
        if(empty($data['person_id'])){
            $data['person_id'] = $data['personId'];
        }
       $this->taskRepository->update($id,$data);
    }
    

}