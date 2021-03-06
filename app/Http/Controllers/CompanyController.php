<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Country;
use App\User;
use App\Http\Requests\CompanyStoreRequest;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.company')->except([
            'index',
            'create',
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
        if (is_null(auth()->user()->company_id)) {
            return redirect()->route('company.create');
        } else {
            $company = Company::find(auth()->user()->company->id);
            return view('admin.company.index')->with('company', $company);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (is_null(auth()->user()->company_id)) {
            $categories = Category::where('parent_id', '=', NULL)->get();
            $countries = Country::all();
            return view('admin.company.create')->with([
                'categories' => $categories,
                'countries' => $countries
            ]);
        } else {
            return redirect()->route('company.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        //
        /*
                'name', 'type', 'cr', 'vat', 'main_services', 'establishment_year', 'total_employees', 'bio',
        'telephone', 'fax', 'email', 'website', 'country', 'city', 'po_box', 'zip_code',
        'address', 'location','admin'

        */
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'cr' => 'required',
            'vat' => 'required',
            'establishment_year' => 'required',
            'total_employees' => 'required',
            'bio' => 'required',
            'telephone' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'country' => 'required',
            'city' => 'required',
            'po_box' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'location' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->type = $request->type;
        $company->cr = $request->cr;
        $company->vat = $request->vat;
        $company->establishment_year = $request->establishment_year;
        $company->total_employees = $request->total_employees;
        $company->bio = $request->bio;
        $company->telephone = $request->telephone;
        $company->fax = $request->fax;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->country = $request->country;
        $company->city = $request->city;
        $company->po_box = $request->po_box;
        $company->zip_code = $request->zip_code;
        $company->address = $request->address;
        $company->location = $request->location;
        // logo
        //
        if ($request->file('logo')) {
            $image = $request->file('logo')->store('public/img/companies');

            //Storage::putFile($image, new File('/img/companies'));
            $company->logo = $image;
        }

        $company->category_id = $request->category_id;
        $company->admin_id = auth()->user()->id;
        $company->save();
        $user = User::find(auth()->user()->id);
        $user->company_id = $company->id;
        $user->save();
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        if (auth()->user()->id == auth()->user()->company->admin->id) {
            $categories = Category::where('parent_id', '=', NULL)->get();
            $countries = Country::all();
            return view('admin.company.edit')->with('company', $company)->with([
                'categories' => $categories,
                'countries' => $countries
            ]);
        } else {
            $error = 'You are not the admin of this company!';
            return redirect()->route('company.index')->with('error', $error);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $company->name = $request->name;
        $company->type = $request->type;
        $company->cr = $request->cr;
        $company->vat = $request->vat;
        $company->establishment_year = $request->establishment_year;
        $company->total_employees = $request->total_employees;
        $company->bio = $request->bio;
        $company->telephone = $request->telephone;
        $company->fax = $request->fax;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->country = $request->country;
        $company->city = $request->city;
        $company->po_box = $request->po_box;
        $company->zip_code = $request->zip_code;
        $company->address = $request->address;
        $company->location = $request->location;
        $company->category_id = $request->category_id;
        if ($request->file('logo')) {
            $image = $request->file('logo')->store('public/img/companies');
            // remove the public from the image string to store it in DB
            $image = str_replace('public/','', $image);
            //
            $company->logo = $image;
        }

        $company->save();
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
