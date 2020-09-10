<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::latest()
                ->where('status', true)
                ->get();
        return view('admin.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('admin.sites.create', compact('products', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'location' => '',
            'phone' => '',
            'email' => '',
            'webpage' => 'url',
            'clients' => '',
            'products' => '',
            'status' => 'required',
        ]);

        
        $site = new Site();
        $site->name = $request->name;
        $site->location = $request->location;
        $site->phone = $request->phone;
        $site->webpage = $request->webpage;
        $site->email = $request->email;
        $site->status = $request->status;
        // dd($site);
        $site->save();
        
        $site->clients()->attach($request->clients);
        $site->products()->attach($request->products);

        Toastr::success('Site Created Successfully','Success');
        return redirect()->route('site.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        return view('admin.site.show', compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        $clients = Client::all();
        $products = Product::all();
        return view('admin.sites.edit', compact('site' ,'clients', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $this->validate($request,[
            'name' => 'required',
            'location' => '',
            'phone' => '',
            'email' => '',
            'webpage' => 'url',
            'clients' => '',
            'products' => '',
            'status' => 'required',
        ]);

        $site->name = $request->name;
        $site->location = $request->location;
        $site->phone = $request->phone;
        $site->webpage = $request->webpage;
        $site->email = $request->email;
        $site->status = $request->status;
        $site->save();

        $site->clients()->sync($request->clients);
        $site->products()->sync($request->products);

        
        Toastr::success('Site Details Updated Successfully','Success');
        return redirect()->route('site.index');

    }

    public function status()
    {
        $sites = Site::where('status', 0)->get();
        return view('admin.sites.inactive', compact('sites'));
    }

    public function poc()
    {
        $sites = Site::where('status', 2)->get();
        return view('admin.sites.poc', compact('sites'));
    }

    public function deactivate()
    {
        $sites = Site::where('status', 3)->get();
        return view('admin.sites.deactivated', compact('sites'));
    }

    public function dormant()
    {
        $sites = Site::where('status', 4)->get();
        return view('admin.sites.dormant', compact('sites'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->products()->detach();
        $site->clients()->detach();
       
        $site->delete();
        // Toastr::success('Site Successfully Deleted','Success');
        return redirect()->back();
    }
}
