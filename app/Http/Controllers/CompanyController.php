<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\EditCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('company.index',['companies'=> $companies]);
    }

    public function create() {

        return view('company.create');
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateCompanyRequest $request)
    {
        if($request->hasFile('logo')) {
            $name = htmlspecialchars(strtolower(preg_replace('/\s+/','',$request->name)));
            $newimage = time() . '-' . $name . '.' . $request->file('logo')->guessExtension();
            $image = $request->file('logo')->move('logos', $newimage);

        } else {
            $image = "fakeimage.jpg";
        }
       
        Company::create([
            'name' => htmlspecialchars($request->name),
            'email' => strtolower($request->email),
            'logo' => $image,
            'website' => $request->website,
            'address' => htmlspecialchars($request->address),
        ]);

		$request->session()->flash('success','Company Successfully submitted.');

        return redirect()->route('company.index');
    }

    public function edit(Company $company)
    {
       return view('company.edit', ["company"=>$company]);
    }

    public function update(EditCompanyRequest $request, Company $company)
    {
        if($request->hasFile('logo')) {
            $name = htmlspecialchars(strtolower(preg_replace('/\s+/', '', $request->name)));
            $newimage = time() . '-' . $name . '.' . $request->file('logo')->guessExtension();
            $image = $request->file('logo')->move('logos', $newimage);
        } else {
            $image = $request->old_logo;
        }
       
        $company->update([
            'name' => htmlspecialchars($request->name),
            'email' => strtolower($request->email),
            'logo' => $image,
            'website' => $request->website,
            'address' => htmlspecialchars($request->address),
        ]);

		$request->session()->flash('success','Company Successfully updated.');

        return redirect()->route('company.index');
    }

    public function show(Company $company)
    {
        return view('company.show', ["company"=>$company]);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back();
    }
}