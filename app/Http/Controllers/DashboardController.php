<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Sail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $clients = count( $this->getAllClients() );
        $sailsToday = count( $this->getAllSailsToday() );

        return view( 'pages.dashboard', compact( 'clients', 'sailsToday' ) );
    }

    public function getAllClients() {
        $clients = Client::all();
        return $clients;
    }

    public function getAllSailsToday() {
        $sailsToday = Sail::where( 'created_at', 'LIKE', date( 'Y-m-d' ) )->get();
        return $sailsToday;
    }
}
