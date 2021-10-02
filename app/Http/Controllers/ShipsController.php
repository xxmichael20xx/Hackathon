<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use App\Models\Ship;
use Illuminate\Http\Request;

class ShipsController extends Controller
{
    public function index() {
        $ships = $this->getAllShips();
        $captains = $this->getAllCaptains();

        return view( 'pages.ship', compact( 'ships', 'captains' ) );
    }

    public function getAllShips() {
        $ships = Ship::orderBy( 'id', 'desc' )->get();
        return $ships;
    }

    public function getAllCaptains() {
        $captains = UserRole::where( 'user_role', 'captain' )->get();
        return $captains;
    }

    public function newShip( Request $request ) {
        $this->validate( $request, [
            'name' => 'required',
            'max_clients' => 'required',
            'captain_id' => 'required',
        ] );

        $ship = new Ship;
        $ship->name = $request->name;
        $ship->max_clients = $request->max_clients;
        $ship->captain_id = $request->captain_id;

        if ( $ship->save() ) {
            $data = array( 
                'success' => true,
                'message' => 'New ship has been added.'
            );
        } else {
            $data = array( 
                'success' => false,
                'message' => 'Failed to add new ship.'
            );
        }

        return response()->json( $data );
    }
}
