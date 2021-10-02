@extends( 'layouts.dashboard' )

@section( 'content' )
  <!-- Page Header -->
  <div class="page-header form-group row no-gutters py-4">
    <div class="col-md-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title">Ships</h3>
    </div>
    <div class="col-md-4 text-right mb-0 d-flex align-items-center justify-content-end">
      <a href="#newShipModal" data-toggle="modal" class="btn btn-primary">
        <i class="material-icons">add</i> Add New Ship</a>
    </div>
  </div>

  <div class="modal fade" id="newShipModal">
    <div class="modal-dialog" style="max-width: 50vw;">
      <div class="modal-content">
        <form id="newShipForm">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold">New Ship Form</h5>
          </div>
          <div class="modal-body">
            <div class="conatiner">
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="name" class="col-form-label font-weight-bold">Name</label>
                  <input type="text" name="name" id="name" class="form-control" required>
                  <small class="invalid-feedback" id="name_error"></small>
                </div>
                <div class="col-6">
                  <label for="max_clients" class="col-form-label font-weight-bold">Max Clients</label>
                  <input type="number" name="max_clients" id="max_clients" class="form-control" required>
                  <small class="invalid-feedback" id="max_clients_error"></small>
                </div>
              </div>
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="captain_id" class="col-form-label font-weight-bold">Captain</label>
                  <select class="custom-select" name="captain_id" id="captain_id" required>
                    <option value="" selected disabled>Select captain</option>
                    @if ( $captains->count() > 0 )
                      @foreach ( $captains as $captain )
                        <option value="{{ $captain->user_id }}">{{ $captain->client->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  <small class="invalid-feedback" id="captain_id_error"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="d-none" id="newShipFormReset">
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
          <h6 class="m-0">List of Ships</h6>
        </div>
        <div class="card-body p-0 pb-3">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Ship Name</th>
                <th scope="col" class="border-0">Captain Name</th>
                <th scope="col" class="border-0">Date Created</th>
              </tr>
            </thead>
            <tbody>
              @if( $ships->count() > 0 )
                @php $count = 1; @endphp
                @foreach ( $ships as $ship )
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $ship->name }}</td>
                    <td>{{ $ship->captain->name }}</td>
                    <td>{{ $ship->created_at->diffForHumans() }}</td>
                  </tr>
                @endforeach
              @else
                <tr>
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
      $( '#newShipForm' ).submit( function( e ) {
        e.preventDefault()
        let formData = new FormData( $( this )[0] )
        $( '.invalid-feedback' ).hide()

        $.ajax({
          url: '/api/new-ship',
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

            $( '#newShipFormReset' ).click()
            $( '#newShipModal' ).modal( 'hide' )
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