<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use App\Phone;
use App\Client;
use App\Device;
use App\Product;
use App\Simcard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::latest()
            ->where('status', true)
            ->get();
            // $date_to_renewal = Device::get('date_to_renewal');
            // $date=strtotime($date_to_renewal);
            // $remaining=time()-$date;
            // $day_remaining = floor($remaining / 86400);
            // dd($date_to_renewal);
    //    $date = Device::all('date_to_renewal');
    //    $remaining = $date - Carbon::now();
    //    echo $remaining;
    //    $day_remaining = floor($remaining / 86400);
    //    echo "This post remaining $day_remaining days";
        return view('admin.device.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $sites = Site::all();
        $phones = Phone::all();
        $simcards = Simcard::all();
        $products = Product::all();
        return view('admin.device.create', compact('clients','sites', 'phones', 'simcards', 'products'));
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
            'imei' => '',
            'phone' => '',
            'puk_1' => '',
            'puk_2' => '',
            'pin_1' => '',
            'pin_2' => '',
            'model' => '',
            'color' => '',
            'sentry_id' => '',
            'supplier' => '',
            'portal_pass' => '',
            'simcards' => '',
            'products' => '',
            'clients' => '',
            'sites' => '',
            'status' => 'required',
            'date_to_renewal' => '',
        ]);
        $device = new Device();
        $device->name = $request->name;
        $device->imei = $request->imei;
        $device->phone = $request->phone;
        $device->puk_1 = $request->puk_1;
        $device->puk_2 = $request->puk_2;
        $device->pin_1 = $request->pin_1;
        $device->pin_2 = $request->pin_2;
        $device->color = $request->color;
        $device->sentry_id = $request->sentry_id;
        $device->supplier = $request->supplier;
        $device->portal_pass = $request->portal_pass;
        $device->status = $request->status;
        $device->date_to_renewal = $request->date_to_renewal;
        $device->save();
//        echo '<pre>';
//        print_r($_POST);
//        echo '<pre>';exit;
        $device->clients()->attach($request->clients);
        $device->sites()->attach($request->sites);
        $device->products()->attach($request->products);
        $device->phones()->attach($request->phones);
        $device->simcards()->attach($request->simcards);

        Toastr::success('Device Created Successfully','Success');
        return redirect()->route('device.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return view('admin.device.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $clients = Client::all();
        $sites = Site::all();
        $products = Product::all();
        $phones = Phone::all();
        $simcards = Simcard::all();
        return view('admin.device.edit', compact('device' , 'clients', 'sites', 'products','phones','simcards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $this->validate($request,[
            'name' => 'required',
            'imei' => '',
            'phone' => '',
            'puk_1' => '',
            'puk_2' => '',
            'pin_1' => '',
            'pin_2' => '',
            'model' => '',
            'color' => '',
            'sentry_id' => '',
            'supplier' => '',
            'portal_pass' => '',
            'simcards' => 'required',
            'products' => 'required',
            'clients' => 'required',
            'sites' => 'required',
            'status' => 'required',
            'date_to_renewal' => '',
        ]);

        $device->name = $request->name;
        $device->imei = $request->imei;
        $device->phone = $request->phone;
        $device->puk_1 = $request->puk_1;
        $device->puk_2 = $request->puk_2;
        $device->pin_1 = $request->pin_1;
        $device->pin_2 = $request->pin_2;
        $device->color = $request->color;
        $device->sentry_id = $request->sentry_id;
        $device->supplier = $request->supplier;
        $device->portal_pass = $request->portal_pass;
        $device->status = $request->status;
        $device->date_to_renewal = $request->date_to_renewal;
//        echo '<pre>';
//        print_r($_POST);
//        echo '<pre>';exit;

        $device->save();

        $device->clients()->sync($request->clients);
        $device->sites()->sync($request->sites);
        $device->products()->sync($request->products);
        $device->phones()->sync($request->phones);
        $device->simcards()->sync($request->simcards);

        Toastr::success('Device Details Updated Successfully','Success');
        return redirect()->route('device.index');
    }

    public function status()
    {
        $devices = Device::where('status', false)->get();
        return view('admin.device.inactive', compact('devices'));
    }

    public function lost()
    {
        $devices = Device::where('status', 2)->get();
        return view('admin.device.lost', compact('devices'));
    }

    public function countdown()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->products()->detach();
        $device->clients()->detach();
        $device->simcards()->detach();
        $device->phones()->detach();
        $device->delete();
        // Toastr::success('Device Successfully Deleted','Success');
        return redirect()->back();
    }

}
