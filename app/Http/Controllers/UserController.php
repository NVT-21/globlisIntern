<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $Users = $this->userService->getAll();
        return view('User.index', compact('Users'));
    }

    public function create()
    {
        return view ('User.create');
    }
    public function store(Request $request)
    {   
       
        $this->userService->create($request->all());
        return redirect()->route('users.index');
    }


    public function edit( $id)

    {   $user = $this->userService->findOne($id);
        return view('User.edit',compact('user'));
    }

    public function update(Request  $request, $id)
    {  
        $this->userService->update($id, $request->all());
        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        $this->userService->delete($id);
        return redirect()->route('users.index');
    }
}
