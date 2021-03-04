<?php

namespace App\Http\Controllers;

use App\Estimate;
use App\Invoice;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class InvoiceController extends Controller
{
    public function incomming()
    {
        $invoices = Invoice::where('client_id', '=', auth()->user()->company->id)->where('status', '!=', 'draft')->get();
        return view('admin.invoice.incomming')->with('invoices', $invoices);
    }


    public function outgoing()
    {
        $invoices = Invoice::where('company_id', '=', auth()->user()->company->id)->get();
        return view('admin.invoice.outgoing')->with('invoices', $invoices);
    }

    public function setStatus($uuid)
    {
        $invoice = Invoice::where('uuid', '=', $uuid)->firstOrFail();
        $status = 'Sent';
        if ($invoice->status == 'Sent') {
            $status = 'Approved';
        }
        $invoice->status = $status;
        $invoice->save();
        return redirect()->route('invoice.incomming');
    }

    public function index()
    {
        //
    }

    public function create($uuid = null)
    {
        //
        $estimate = ($uuid) ? Estimate::where('uuid', '=', $uuid)->firstOrFail() : null ;
        // $estimate = Estimate::where('uuid', '=', $uuid)->firstOrFail();
        // return $estimate;
        return view('admin.invoice.create')->with('estimate', $estimate);
    }

    public function store(Request $request)
    {
        //
        // get purchase request from the request
        $estimate = Estimate::where('uuid', '=', $request->estimate_uuid)->firstOrFail();

        //create new estiamte
        $invoice = new Invoice;
        $invoice->uuid = Uuid::generate();
        $invoice->date = $request->date;
        $invoice->dueDate = $request->dueDate;
        $invoice->status = 'draft';
        $invoice->notes = $request->notes;
        $invoice->terms = $request->terms;

        // need to validate subtotal first before saving
        $invoice->subtotal = $request->subtotal;
        $invoice->discount = $request->discount;
        $invoice->tax = $request->tax;
        $invoice->total = $request->total;
        $invoice->estimate_id = $estimate->id;
        $invoice->company_id = auth()->user()->company->id;
        $invoice->user_id = auth()->user()->id;
        $invoice->client_id = $estimate->company_id;
        return $invoice->lines;

        $invoice->save();

        // store invoice lines
        for ($i = 0; $i < count($invoice->lines); $i++) {
            $invoiceLine = new InvoiceLine;
            $invoiceLine->invoice_id = $invoice->id;
            $invoiceLine->service_id = $invoice->lines[$i]->service_id;
            $invoiceLine->unit = $request->unit[$i];
            $invoiceLine->type = $request->type[$i];
            $invoiceLine->rate = $request->rate[$i];
            $invoiceLine->save();
        }

        // return to view
        return redirect()->route('invoice.index');
    }

    public function show(Invoice $invoice)
    {
        //
        return view('admin.invoice.show')->with('invoice', $invoice);

    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
