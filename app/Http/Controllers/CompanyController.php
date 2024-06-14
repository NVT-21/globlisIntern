<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Services\DepartmentService;
class CompanyController extends Controller
{
    protected $companyService;


    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = $this->companyService->getAll(2);
        return view('Company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Company.create');
    }
    public function store(Request $request)
    {   
     
        $this->companyService->create($request->all());
        return redirect()->route('companies.index');
    }

    
    public function edit( $id)
    {  
         $company = $this->companyService->findOne($id);
         $departments=$this->companyService->getDepartments($id);
         return view('Company.edit',compact('company','departments'));
    }

    
    public function update(Request  $request, $id)
    { 
        $updatedCountry = $this->companyService->update($id, $request->all());
        return redirect()->route('companies.index');
    }

    public function destroy(string $id)
    {
        $this->companyService->delete($id);
        return redirect()->route('companies.index');
    }
    public function addPeople($idCompany,$idPerson){
        $this->companyService->addPeople($idCompany,$idPerson);
        return redirect()->route('companies.index');
    }
    public function getPeople($idCompany)
    {
        return $this->companyService->getPeople($idCompany);
    }
}
