<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index() {
        $clients = $this->allClients();
        return view( 'pages.clients', compact( 'clients' ) );
    }

    public function allClients() {
        $clients = Client::orderBy( 'id' , 'desc' )->get();
        return $clients;
    }

    public function newClient( Request $request ) {
        $this->validate( $request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'nullable',
            'email_address' => 'nullable|unique:clients,email_address',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'medical_details' => 'nullable'
        ] );

        if ( $files = $request->file( 'profile_image' ) ) {

            $file_name = $files->getClientOriginalName();
            $file_new_name = time() . '_' . $file_name;
            $files->move( public_path() . '/images/avatars/', $file_new_name );

        }

        $client = new Client;
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->phone_number = $request->phone_number ?? NULL;
        $client->email_address = $request->email_address ?? NULL;
        $client->date_of_birth = $request->date_of_birth;
        $client->gender = $request->gender;
        $client->medical_details = $request->medical_details ?? NULL;
        $client->profile_image = $file_new_name ?? NULL;

        if ( $client->save() ) {
            $data = array( 
                'success' => true,
                'message' => 'New client has been added.'
            );
        } else {
            $data = array( 
                'success' => false,
                'message' => 'Failed to add new client.'
            );
        }

        return response()->json( $data );
    }
}
