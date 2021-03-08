<?php

namespace App\Http\Controllers;

use App\Line;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class PurchaseRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('company.valid');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       /*  $purchaseRequests = PurchaseRequest::where('company_id', '!=', auth()->user()->company->id)->get();
        if ($purchaseRequests) {
            return view('admin.purchase_request.index')->with('purchaseRequests', $purchaseRequests);
        }
        foreach ($purchaseRequests as $pr) {
            foreach ($pr->lines as $line) {
                foreach ($line->service->companies as $company) {
                    if ($company->id == auth()->user()->company->id) {
                        return view('admin.purchase_request.index')->with('purchaseRequests', $purchaseRequests);
                        //return 'yes';
                    }
                }
            }
        } */
        //return view('admin.purchase_request.index')->with('purchaseRequests', $purchaseRequests)->with('x',$x);
    }

    public function incomming()
    {
        // this should show only the incomming purchase request

        $purchaseRequests = PurchaseRequest::where('company_id', '!=', auth()->user()->company->id)->get();

        foreach ($purchaseRequests as $pr) {
            foreach ($pr->lines as $line) {
                foreach ($line->service->companies as $company) {
                    if ($company->id == auth()->user()->company->id) {
                        return view('admin.purchase_request.incomming')->with('purchaseRequests', $purchaseRequests);
                        //return 'yes';
                    }
                }
            }
        }
        return view('admin.purchase_request.incomming')->with('purchaseRequests', $purchaseRequests);

    }

    public function outgoing()
    {
        // this should show only the incomming purchase request
        $purchaseRequests = PurchaseRequest::where('company_id', '=', auth()->user()->company->id)->get();
        return view('admin.purchase_request.outgoing')->with('purchaseRequests', $purchaseRequests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $purchaseRequest = new PurchaseRequest;
        $purchaseRequest->uuid = Uuid::generate();
        $purchaseRequest->date = $request->date;
        $purchaseRequest->details = $request->details;
        $purchaseRequest->company_id = auth()->user()->company_id;
        $purchaseRequest->save();
        foreach ($request->services as $service) {
            $line = new Line;
            $line->purchase_request_id = $purchaseRequest->id;
            $line->service_id = $service;
            $line->save();
        }
        $request->session()->remove('List');

        return redirect()->back();

        /*  */
        /*  */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequest $purchaseRequest)
    {
        //
        return view('admin.purchase_request.show')->with('purchaseRequest', $purchaseRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequest $purchaseRequest)
    {
        //
    }
}
