<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Services\CompanyService;

class ProjectController extends Controller
{
    protected $projectService ;
    protected $companyService ;

    public function __construct (ProjectService $projectService , CompanyService $companyService){
        $this->projectService = $projectService;
        $this->companyService = $companyService;
    }
    public function index(){
        $projects = $this->projectService->getAll(2);
        return View('Project.Index',compact('projects'));
    }
   
    public function create(){
        $companies = $this->companyService->getAll();
        return View('Project.create',compact('companies'));
    }
    public function store(Request $request ){
        $data =$request->only('name','code','description');
        $companyId = $request->input('company_id');
        $people =$request->input('people');
        $this->projectService->createProject($data,$companyId,$people);
        return redirect()->route('projects.index');

    }
    public function edit($id){
        $project=$this->projectService->findOne($id);
        $people=$project->people;
        $companies = $this->companyService->getAll();
        return View('Project.Edit', compact('project','companies','people'));
    }
    public function update(Request $request ,$idProject){
        $data=$request->only('name','code','description','company_id');
        $people=$request->input("people");
        $this->projectService->updateProject($data,$idProject,$people);
        return redirect()->route('projects.index');
    }
    public function getPeople($idProject){
        return $this->projectService->getPeople($idProject);
    }
    public function destroy($idProject){
        $this->projectService->delete($idProject);
        return redirect()->route('projects.index');
    }
}
