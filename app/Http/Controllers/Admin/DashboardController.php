<?php

namespace App\Http\Controllers\Admin;

use App\Site;
use App\Client;
use App\Device;
use App\Contact;
use App\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $active_clients = Client::where('status', 1)->count();
        // $active_soja_clients = Client::where('status', 2);
        // dd($active_soja_clients);
        $inactive_clients = Client::where('status', 0)->count();
        $deactivated_clients = Client::where('status', 3)->count();
        $poc = Client::where('status', 2)->count();
        $dormant = Client::where('status', 4)->count();
        $unconverted_poc = Client::where('status', 5)->count();
        $sites = Site::all();
        $active_sites = Site::where('status', 1)->count();
        // dd($active_sites);
        $inactive_sites = Site::where('status', 0)->count();
        $poc_sites = Site::where('status', 2)->count();
        $deactivated_sites = Site::where('status', 3)->count();
        $dormant_sites = Site::where('status', 4)->count();
        $active_devices = Device::where('status', 1)->count();
        $inactive_devices = Device::where('status', 0)->count();
        $lost_devices = Device::where('status', 2)->count();
        $product_count = Product::all();
        $contacts = Contact::all();
        $recent_clients = Client::whereDate('created_at', Carbon::now())
                        ->take(5)->get();
        $recent_sites = Site::whereDate('created_at', Carbon::now())
                        ->take(5)->get();
                        // dd($recent_clients);

//        $client = Client::where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"), date('Y'))->get();
//        $chart = Charts::database($clients, 'bar', 'highcharts')
//                   ->title("Client Details")
//                   ->elementLabel("Total Clients")
//                   ->dimensions(1000, 500)
//                   ->responsive(false)
//                   ->groupByClient(date('Y', true));

        return view('admin.dashboard', compact(
            'clients', 'product_count', 'active_clients', 
            'inactive_clients', 'poc', 'active_devices', 
            'inactive_devices', 'contacts', 'deactivated_clients', 
            'recent_clients','dormant','unconverted_poc','lost_devices',
        'active_sites', 'inactive_sites', 'poc_sites', 'deactivated_sites', 'dormant_sites','recent_sites'));
    }


}
