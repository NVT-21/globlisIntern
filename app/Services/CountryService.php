<?php

namespace App\Services;


use App\Repositories\CountryRepository;

class CountryService extends BaseService
{
    public function __construct(CountryRepository $countryRepository)
    {
        parent::__construct($countryRepository);
    }
}
