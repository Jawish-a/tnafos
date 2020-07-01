<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\EstimateLine;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class EstimateController extends Controller
{
    public function incomming()
    {
        $estimates = Estimate::where('client_id', '=', auth()->user()->company->id)->where('status', '!=', 'draft' )->get();
        return view('admin.estimate.incomming')->with('estimates', $estimates);
    }

    public function outgoing()
    {
        $estimates = Estimate::where('company_id', '=', auth()->user()->company->id)->get();
        return view('admin.estimate.outgoing')->with('estimates', $estimates);
    }

    /* set estimate status to sent */
    public function setStatus($uuid)
    {
        $estimate = Estimate::where('uuid', '=', $uuid)->firstOrFail();
        $status = 'Sent';
        if ($estimate->status == 'Sent') {
            $status = 'Approved';
        }
        $estimate->status = $status;
        $estimate->save();
        return redirect()->route('estimate.incomming');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        //
        $purchaseRequest = PurchaseRequest::where('uuid', '=', $uuid)->firstOrFail();
        return view('admin.estimate.create')->with('purchaseRequest', $purchaseRequest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get purchase request from the request
        $purchaseRequest = PurchaseRequest::where('uuid', '=', $request->purchaseRequest_uuid)->firstOrFail();

        //create new estiamte
        $estimate = new Estimate;
        $estimate->uuid = Uuid::generate();
        $estimate->date = $request->date;
        $estimate->expiryDate = $request->expiryDate;
        $estimate->status = 'draft';
        $estimate->notes = $request->notes;
        $estimate->terms = $request->terms;

        // need to validate subtotal first before saving
        $estimate->subtotal = $request->subtotal;
        $estimate->discount = $request->discount;
        $estimate->tax = $request->tax;
        $estimate->total = $request->total;
        $estimate->purchase_request_id = $purchaseRequest->id;
        $estimate->company_id = auth()->user()->company->id;
        $estimate->user_id = auth()->user()->id;
        $estimate->client_id = $purchaseRequest->company_id;
        $estimate->save();

        // store estimate lines
        for ($i = 0; $i < count($purchaseRequest->lines); $i++) {
            $estimateLine = new EstimateLine;
            $estimateLine->estimate_id = $estimate->id;
            $estimateLine->service_id = $purchaseRequest->lines[$i]->service_id;
            $estimateLine->unit = $request->unit[$i];
            $estimateLine->type = $request->type[$i];
            $estimateLine->rate = $request->rate[$i];
            $estimateLine->save();
        }

        // return to view
        return redirect()->route('estimate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
        //
        return view('admin.estimate.show')->with('estimate', $estimate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimate $estimate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        //
    }
}
