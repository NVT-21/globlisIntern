<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles= $this->roleService->getAll();
        return view('Role.index', compact('roles'));
    }
    public function create()
    {
        return view ('Role.create');
    }

    public function viewSelect(){
        $roles= $this->roleService->getAll();
        return view('Role.select',compact('roles'));
    }
    public function assignRole($userId,Request $request){
        $this->roleService->assignRole($userId,$request->input('roles'));
        return redirect()->route('users.index');
    }
    public function store(Request $request)
    {   
     
        $this->roleService->create($request->all());
        return redirect()->route('roles.index');
    }
    public function show(string $id)
    {
        //
    }
    public function edit( $id)

    {   $Role = $this->roleService->findOne($id);
        return view('Role.edit',compact('Role'));
    }

    public function update(Request  $request, $id)
    { 
        $this->roleService->update($id, $request->all());
        return redirect()->route('Role.index');
    }

    public function destroy(string $id)
    {
        $this->roleService->delete($id);
        return redirect()->route('Roles.index');
    }
  
}
