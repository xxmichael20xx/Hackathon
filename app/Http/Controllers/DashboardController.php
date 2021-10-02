<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\Sail;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $clients = count( $this->getAllClients() );
        $sailsToday = count( $this->getAllSailsToday() );
        $allSails = count( $this->getAllSails() );

        return view( 'pages.dashboard', compact( 'clients', 'sailsToday', 'allSails' ) );
    }

    public function getAllClients() {
        $clients = UserRole::where( 'user_role', 'user' )->get();
        return $clients;
    }

    public function getAllSailsToday() {
        $sailsToday = Sail::where( 'created_at', 'LIKE', '%' . date( 'Y-m-d' ) . '%' )->get();
        return $sailsToday;
    }

    public function getAllSails() {
        $allSails = Sail::all();
        return $allSails;
    }
}
