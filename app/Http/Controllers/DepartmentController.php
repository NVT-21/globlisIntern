<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    public function edit($id){
        $department= $this->departmentService->findOne($id);
        return View('Department.edit',compact('department'));
       

    }
    public function create(){
        return View('Department.create');
    }
    public function store(Request $request,$idCompany){
        $this->departmentService->addToCompany($request->all(),$idCompany);

        return redirect()->route('companies.edit',[$idCompany]);
    }
    public function destroy($id ,$idCompany){
        $this->departmentService->delete($id);
        return redirect()->route('companies.edit',[$idCompany]);
    }
    public function update($id,Request $request){
        $this->departmentService->update($id,$request->all());
        return redirect()->route('companies.index');
    }
}
