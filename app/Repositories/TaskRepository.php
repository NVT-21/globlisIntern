<?php
namespace App\Repositories;

use App\Models\Task ;

class TaskRepository extends BaseRepository {
    public function __construct(Task $task )
    {
        parent::__construct( $task );
    }
    public function filter($data)
    {
        $query =Task::query();
        if (!empty($data['project_id'])) {
            $query->where('project_id', $data['project_id']);
        }
         if(!empty($data['person_id'])) {
            $query->where('person_id', $data['person_id']);
        }
        if (!empty($data['status'])) {
            $query->where('status', $data['status']);
        }
        
        // Lọc theo Priority
        if (!empty($data['priority'])) {
            $query->where('priority', $data['priority']);
        }
        if (!empty($data['name'])) {
            $query->where('name', 'like', '%' . $data['name'] . '%');
        }
        return $query->get();
    }
}