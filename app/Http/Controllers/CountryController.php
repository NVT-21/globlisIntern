<?php

namespace App\Http\Controllers;
use App\Services\CountryService;
use App\Http\Requests\CountryRequest;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    
    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $countries = $this->countryService->getAll();
        return view('Country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('Country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {   
        $data = $request->only(['code', 'name', 'description']);
        $this->countryService->create($data);
        return redirect()->route('countries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)

    {   $currentCountry = $this->countryService->findOne($id);
        return view('country.edit',compact('currentCountry'));
    }

    /**
     * Update the specified resource in storage.
     */
   

public function update(CountryRequest  $request, $id)
{   $data = $request->only(['code', 'name', 'description']);
    $updatedCountry = $this->countryService->update($id, $data);
    return redirect()->route('countries.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->countryService->delete($id);
        return redirect()->route('countries.index');
    }
}
