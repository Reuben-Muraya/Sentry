<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()
                           ->where('status', true)
                           ->get();
        $products = Product::get();
        return view('admin.client.index', compact('clients','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.client.create', compact('products'));
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
            'phone' => '',
            'email' => 'unique:clients',
            'webpage' => 'url',
//            'image' => 'required:jpeg,bmp,png,jpg',
            'about' => 'required',
            'products' => 'required',
            'status' => 'required',
        ]);
//        $image = $request->file('image');
//        $slug = Str::slug($request->name);
//        if (isset($image))
//        {
//            $currentDate = Carbon::now()->toDateString();
//            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//
//            if(!Storage::disk('public')->exists('client'))
//            {
//                Storage::disk('public')->makeDirectory('client');
//            }
//
//            $client = Image::make($image)->resize( 100, 100)->stream();
//            Storage::disk('public')->put('client/'.$imagename,$client);
//        }else {
//            $imagename = "default.png";
//        }

        $client = new Client();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->webpage = $request->webpage;
        $client->email = $request->email;
//        $client->image = $request->imagename;
        $client->about = $request->about;
        $client->status = $request->status;

        $client->save();

        $client->products()->attach($request->products);

        Toastr::success('Client Created Successfully','Success');
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $products = Product::all();
        return view('admin.client.edit', compact('client', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => '',
            'email' => 'required',
            'webpage' => 'url',
//            'image' => 'required:jpeg,bmp,png,jpg',
            'about' => 'required',
            'products' => 'required',
            'status' => 'required',
        ]);
//        $image = $request->file('image');
//        $slug = Str::slug($request->name);
//        if (isset($image))
//        {
//            // make unique name for image
//            $currentDate = Carbon::now()->toDateString();
//            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//
//            if (!Storage::disk('public')->exists('client'))
//            {
//                Storage::disk('public')->makeDirectory('client');
//            }
//
//            //delete old client image
//            if (Storage::disk('public')->exists('client/'.$client->image))
//            {
//                Storage::disk('public')->delete('client/'.$client->image);
//            }
//
//            $clientImage = Image::make($image)->resize( 100, 100)->stream();
//            Storage::disk('public')->put('client/'.$imageName,$clientImage);
//        }else {
//            $imageName = $client->image;
//        }

        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->webpage = $request->webpage;
        $client->email = $request->email;
//        $client->image = $request->image;
        $client->about = $request->about;


//        echo '<pre>';
//        print_r($_POST);
//        echo '<pre>';exit;
        if (isset($request->status) &&  is_array($request->status))
        {
            $client->status = $request->status[0];
        }
        $client->save();

        $client->products()->sync($request->products);

        Toastr::success('Client Updated Successfully','Success');
        return redirect()->route('client.index');
    }

    public function status()
    {
        $clients = Client::where('status',false)->get();
        return view('admin.client.inactive', compact('clients'));
    }

    public function poc()
    {
        $clients = Client::where('status', 2)->get();
        return view('admin.client.poc', compact('clients'));
    }

    public function deactivate()
    {
        $clients = Client::where('status', 3)->get();
        return view('admin.client.deactivated', compact('clients'));
    }

    public function dormant()
    {
        $clients = Client::where('status', 4)->get();
        return view('admin.client.dormant', compact('clients'));
    }

    public function unconverted_poc()
    {
        $clients = Client::where('status', 5)->get();
        return view('admin.client.unconverted_poc', compact('clients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->products()->detach();
        $client->delete();
        // Toastr::success('Client Successfully Deleted','Success');
        return redirect()->back();
    }
}
