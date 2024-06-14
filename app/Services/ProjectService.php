<?php

namespace App\Services;


use App\Repositories\ProjectRepository;

class ProjectService extends BaseService {
    protected $projectRepository;
    public function __construct(ProjectRepository $projectRepository){

        parent::__construct($projectRepository);
        $this->projectRepository = $projectRepository;
    }
   
    public function createProject($data,$idCompany,  $people){
        $newProject =$this->projectRepository->create($data);
        $newProject->company()->associate($idCompany);
        $newProject->save();
        if (!empty($people)) {
            $newProject->people()->syncWithoutDetaching($people);
        }

    }
    public function updateProject($data,$idProject,$people){
        $currProject =$this->projectRepository->update($idProject,$data);
        if (!empty($people)) {
            $currProject->people()->sync($people);
        }
    }
    public function getPeople($idProject){
        $project = $this->projectRepository->findOne($idProject);
        $people=$project->people;
        return $people;
    }
  
}