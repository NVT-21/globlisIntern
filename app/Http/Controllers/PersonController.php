<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PersonService;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    public function index()
    {
        $people = $this->personService->getAll(2);
        return view('Person.index', compact('people'));
    }
    public function create()
    {
        return view ('Person.create');
    }

    public function store(Request $request)
    {   
     
        $this->personService->create($request->all());
        return redirect()->route('people.index');
    }
    public function infoPeople(){
        $people = $this->personService->getAll();
        return view('Person.info-people',compact('people'));
    }
   
    public function edit( $id)

    {   $person = $this->personService->findOne($id);
        return view('Person.edit',compact('person'));
    }

    public function update(Request  $request, $id)
    { 
        $this->personService->update($id, $request->all());
        return redirect()->route('people.index');
    }

    public function destroy(string $id)
    {
        $this->personService->delete($id);
        return redirect()->route('people.index');
    }
    
}
