<?php

namespace App\Services;


use App\Repositories\CompanyRepository;
use App\Repositories\PersonRepository;

class CompanyService extends BaseService
{
    protected $personRepository;
    protected $companyRepository;
    public function __construct(CompanyRepository $companyRepository, PersonRepository $personRepository)
    {
        parent::__construct($companyRepository);
        $this->companyRepository = $companyRepository;
        $this->personRepository = $personRepository;
    }

    public function addPeople($idCompany, $idPerson)
    {
        $Person = $this->personRepository->findOne($idPerson);
        $Company = $this->repository->findOne($idCompany);
        $Company->people()->save($Person);
    }
    public function getDepartments($company){
        $company = $this->companyRepository->findOne($company);
        $departments = $company->departments;
        return $departments;
    }
    public function getPeople($company){
        $company = $this->companyRepository->findOne($company);
        $people = $company->people;
        return $people;
    }
}
