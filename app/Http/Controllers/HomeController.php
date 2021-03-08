<?php

namespace App\Http\Controllers;

use App\Quest;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function search(Request $request)
    {
        $oldList = Session::get('List');
        $quest = new Quest($oldList);
        //
        $query = $request->input('query');
        //$products = Product::search($query)->get();
        $services = Service::where('name', 'ILIKE', '%' . $query . '%')->orWhere('description', 'ILIKE', '%' . $query . '%')->get();
        //return $services;
        return view('search')->with('services', $services)->with('list', $quest->services);
    }

    public function addToList(Request $request, $id)
    {
        $service = Service::find($id);
        $oldList = Session::has('List') ? Session::get('List') : null;
        $quest = new Quest($oldList);
        $quest->addService($service, $service->id);
        $request->session()->put('List', $quest);
        //SweetAlert::success('List has been updated!');
        return redirect()->back();
    }


    public function list()
    {
        if (!Session::has('List')) {
            return view('list', ['services' => null]);
        }
        $oldList = Session::get('List');
        $quest = new Quest($oldList);
        //return $quest->services;
        return view('list')->with('services', $quest->services);
    }
}
