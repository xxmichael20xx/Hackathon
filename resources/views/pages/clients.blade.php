@extends( 'layouts.dashboard' )

@section( 'content' )
  <!-- Page Header -->
  <div class="page-header form-group row no-gutters py-4">
    <div class="col-md-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title">Clients</h3>
    </div>
    <div class="col-md-4 text-right mb-0 d-flex align-items-center justify-content-end">
      <a href="#newClientModal" data-toggle="modal" class="btn btn-primary">
        <i class="material-icons">add</i> Add New Client</a>
    </div>
  </div>

  <div class="modal fade" id="newClientModal">
    <div class="modal-dialog" style="max-width: 50vw;">
      <div class="modal-content">
        <form id="newClientForm">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold">New Client Form</h5>
          </div>
          <div class="modal-body">
            <div class="conatiner">
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="first_name" class="col-form-label font-weight-bold">First Name</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" required>
                  <small class="invalid-feedback" id="first_name_error"></small>
                </div>
                <div class="col-6">
                  <label for="last_name" class="col-form-label font-weight-bold">Last Name</label>
                  <input type="text" name="last_name" id="last_name" class="form-control" required>
                  <small class="invalid-feedback" id="last_name_error"></small>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="phone_number" class="col-form-label font-weight-bold">Phone Number</label>
                  <input type="tel" name="phone_number" id="phone_number" class="form-control">
                  <small class="invalid-feedback" id="phone_number_error"></small>
                </div>
                <div class="col-6">
                  <label for="email_address" class="col-form-label font-weight-bold">Email</label>
                  <input type="email" name="email_address" id="email_address" class="form-control">
                  <small class="invalid-feedback" id="email_address_error"></small>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="date_of_birth" class="col-form-label font-weight-bold">Date of Birth</label>
                  <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
                  <small class="invalid-feedback" id="date_of_birth_error"></small>
                </div>
                <div class="col-6">
                  <label for="gender" class="col-form-label font-weight-bold d-block">Email</label>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="gender_male" name="gender" class="custom-control-input" value="male" required>
                    <label class="custom-control-label" for="gender_male">Male</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="gender_female" name="gender" class="custom-control-input" value="female">
                    <label class="custom-control-label" for="gender_female">Female</label>
                  </div>
                  <small class="invalid-feedback" id="gender_error"></small>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="medical_details" class="col-form-label font-weight-bold">Has Medical Information</label>
                  <textarea name="medical_details" id="medical_details" class="form-control" rows="5"></textarea>
                  <small class="invalid-feedback" id="medical_details_error"></small>
                </div>
                <div class="col-6">
                  <label for="profile_image" class="col-form-label font-weight-bold">Profile Picture</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="profile_image" id="profile_image">
                    <label class="custom-file-label" for="profile_image">Choose image</label>
                  </div>
                  <small class="invalid-feedback" id="profile_image_error"></small>
                </div>
              </div>
              <div id="profile_image_container" class="form-group.row d-none">
                <div class="col-md-6 mx-auto text-center">
                  <img src="" id="profile_image_src" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="d-none" id="newClientFormReset">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              <i class="material-icons">close</i> Close
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="material-icons">send</i> Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <h6 class="m-0">List of Clients</h6>
        </div>
        <div class="card-body p-0 pb-3">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">First Name</th>
                <th scope="col" class="border-0">Last Name</th>
                <th scope="col" class="border-0">Email Address</th>
                <th scope="col" class="border-0">Phone Number</th>
                <th scope="col" class="border-0">Date Created</th>
              </tr>
            </thead>
            <tbody>
              @if( $clients->count() > 0 )
                @php $count = 1; @endphp
                @foreach ( $clients as $client )
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->email_address }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->created_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                  <td>No result(s)</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section( 'scripts' )
  <script>
    $( document ).ready( function() {
      $( '#profile_image' ).change( function( e ) {
        let src = URL.createObjectURL( e.target.files[0] )

        $( '#profile_image_container' ).removeClass( 'd-none' )
        $( '#profile_image_src' ).attr( 'src', src )
      } )
      
      $( '#newClientForm' ).submit( function( e ) {
        e.preventDefault()
        let formData = new FormData( $( this )[0] )
        $( '.invalid-feedback' ).hide()

        $.ajax({
          url: '/api/new-client',
          type: 'POST',
          processData: false,
          contentType: false,
          data: formData,
          success: function( res ) {
            Swal.fire({
              icon: res.success ? 'success' : 'info',
              title: res.message
            }).then( function() {
              window.location.reload()
            } )

            $( '#newClientFormReset' ).click()
            $( '#profile_image_container' ).addClass( 'd-none' )
            $( '#profile_image_src' ).attr( 'src', '' )
            $( '#newClientModal' ).modal( 'hide' )
          },
          error: function ( err ) {
            let errors = err.responseJSON.errors

            Object.keys( errors ).forEach( function( error ) {
              let el = $( `#${error}_error` )
              el.text( errors[error] )
              el.show()
            } )
          }
        } )
      } )
    } )
  </script>
@endsection