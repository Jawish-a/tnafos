<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ServiceStoreRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = auth()->user()->company;
        $services = $company->services;
        //return $services;
        return view('admin.service.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $services = Service::all('name')->pluck('name');
        //return $services;
        return view('admin.service.create')->with([
            'categories' => $categories,
            'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
    {

        $request->validated();
        // Find or create service if it does not exists
        $service = Service::firstOrCreate(
            ['name' => $request->name],
            [
                'description' => $request->description,
                'category_id' => $request->category_id
            ],
        );
        // check if the service already has the same company in pivot table
        $check_compny_service =  $service->companies()->where('company_id', auth()->user()->company->id)->where('service_id', $service->id)->exists();
        if (!$check_compny_service) {
            // attach service details and company id
            // Attach it your company
            $service->companies()->attach(
                auth()->user()->company,
                [
                    'rate' => $request->rate,
                    'unit' => $request->unit,
                    'type' => $request->type
                ]
            );
        };
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
