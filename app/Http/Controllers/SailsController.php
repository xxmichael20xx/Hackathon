<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Models\Destination;
use App\Models\Sail;
use App\Models\UserRole;
use Illuminate\Http\Request;

class SailsController extends Controller
{
    public function index() {
        $sails = $this->getAllSails();
        $ships = $this->getAllShips();
        $destinations = $this->getAllDestinations();
        $clients = $this->getAllClients( 'user' );
        $crews = $this->getAllClients( 'crew' );

        return view( 'pages.sails', compact( 'sails', 'ships', 'destinations', 'clients', 'crews' ) );
    }

    public function newSail( Request $request ) {
        $this->validate( $request, [
            'ship_id' => 'required',
            'destination_id' => 'required',
            'clients' => 'required',
            'crews' => 'required'
        ] );

        $sail = new Sail;
        $sail->ship_id = $request->ship_id;
        $sail->destination_id = $request->destination_id;
        $sail->clients = $request->clients;
        $sail->crews = $request->crews;

        if ( $sail->save() ) {
            $data = array( 
                'success' => true,
                'message' => 'New sail has been added.'
            );
        } else {
            $data = array( 
                'success' => false,
                'message' => 'Failed to add new sail.'
            );
        }

        return response()->json( $data );
    }

    public function updateSail( Request $request ) {
        $id = $request->id;

        $sail = Sail::find( $id );
        $sail->has_arrived = now();
        $sail->save();

        $data = array( 
            'success' => true,
            'message' => 'Sail has arrived at the destination.'
        );

        return response()->json( $data );
    }

    public function getAllSails() {
        $sails = Sail::orderBy( 'id', 'desc' )->get();
        return $sails;
    }

    public function getAllShips() {
        $ships = Ship::where( 'status', false )->orderBy( 'id', 'desc' )->get();
        return $ships;
    }

    public function getAllDestinations() {
        $destinations = Destination::all();
        return $destinations;
    }

    public function getAllClients( $type = 'user' ) {
        $clients = UserRole::where( 'user_role', $type )->get();
        return $clients;
    }
}
