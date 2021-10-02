@extends( 'layouts.dashboard' )

@section( 'content' )
  <!-- Page Header -->
  <div class="page-header form-group row no-gutters py-4">
    <div class="col-md-8 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Overview</span>
      <h3 class="page-title">Sails</h3>
    </div>
    <div class="col-md-4 text-right mb-0 d-flex align-items-center justify-content-end">
      <a href="#newSailModal" data-toggle="modal" class="btn btn-primary">
        <i class="material-icons">add</i> Add New Sail</a>
    </div>
  </div>

  <div class="modal fade" id="newSailModal">
    <div class="modal-dialog" style="max-width: 50vw;">
      <div class="modal-content">
        <form id="newSailForm">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold">New Sail Form</h5>
          </div>
          <div class="modal-body">
            <div class="conatiner">
              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="ship_id" class="col-form-label font-weight-bold">Ships</label>
                  <select class="custom-select" name="ship_id" id="ship_id" required>
                    <option value="" selected disabled>Select ship</option>
                    @if ( $ships->count() > 0 )
                      @foreach ( $ships as $ship )
                        <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                      @endforeach
                    @endif
                  </select>
                  <small class="invalid-feedback" id="ship_id_error"></small>
                </div>
                <div class="col-6">
                  <label for="destination_id" class="col-form-label font-weight-bold">Destination</label>
                  <select class="custom-select" name="destination_id" id="destination_id" required>
                    <option value="" selected disabled>Select destination</option>
                    @if ( $destinations->count() > 0 )
                      @foreach ( $destinations as $destination )
                        <option value="{{ $destination->id }}">{{ $destination->destination }}</option>
                      @endforeach
                    @endif
                  </select>
                  <small class="invalid-feedback" id="destination_id"></small>
                </div>
              </div>

              <div class="form-group row mb-3">
                <div class="col-6">
                  <label for="clients" class="col-form-label font-weight-bold">Clients</label>
                  @if ( $clients->count() > 0 )
                    @foreach ( $clients as $client )
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="clients[]" id="client-id-{{ $client->id }}" value="{{ $client->id }}">
                        <label class="custom-control-label" for="client-id-{{ $client->id }}">{{ $client->client->name }}</label>
                      </div>
                    @endforeach
                  @endif
                  <small class="invalid-feedback" id="clients_error"></small>
                </div>
                <div class="col-6">
                  <label for="crews" class="col-form-label font-weight-bold">Crews</label>
                  @if ( $crews->count() > 0 )
                    @foreach ( $crews as $crews )
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="crews[]" id="crews-id-{{ $crews->id }}" value="{{ $crews->id }}">
                        <label class="custom-control-label" for="crews-id-{{ $crews->id }}">{{ $crews->client->name }}</label>
                      </div>
                    @endforeach
                  @endif
                  <small class="invalid-feedback" id="crews_error"></small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="reset" class="d-none" id="newSailFormReset">
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
          <h6 class="m-0">List of Sails</h6>
        </div>
        <div class="card-body p-0 pb-3">
          <table class="table mb-0">
            <thead class="bg-light">
              <tr>
                <th scope="col" class="border-0">#</th>
                <th scope="col" class="border-0">Ship Name</th>
                <th scope="col" class="border-0">Captain Name</th>
                <th scope="col" class="border-0">Destination</th>
                <th scope="col" class="border-0">Clients Count</th>
                <th scope="col" class="border-0">Crews Count</th>
                <th scope="col" class="border-0">Date Sailed</th>
                <th scope="col" class="border-0">Date Arrived</th>
                <th scope="col" class="border-0">Action</th>
              </tr>
            </thead>
            <tbody>
              @if( $sails->count() > 0 )
                @php $count = 1; @endphp
                @foreach ( $sails as $sail )
                  <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $sail->ship->name }}</td>
                    <td>{{ $sail->ship->captain->name }}</td>
                    <td>{{ $sail->destination->destination }}</td>
                    <td>{{ count( $sail->clients ) }}</td>
                    <td>{{ count( $sail->crews ) }}</td>
                    <td>{{ date( 'Y-m-d @ h:ia', strtotime( $sail->created_at ) ) }}</td>
                    <td>{{ $sail->has_arrived ? date( 'Y-m-d @ h:ia', strtotime( $sail->has_arrived ) ) : '-' }}</td>
                    <td>
                      @if ( ! $sail->has_arrived )
                        <button type="button" class="btn btn-primary mark-arrived" data-id="{{ $sail->id }}">Mark as Arrived</button>
                      @endif
                    </td>
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
      $( '#newSailForm' ).submit( function( e ) {
        e.preventDefault()
        let formData = new FormData( $( this )[0] )
        $( '.invalid-feedback' ).hide()

        $.ajax({
          url: '/api/new-sail',
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

            $( '#newSailFormReset' ).click()
            $( '#newSailModal' ).modal( 'hide' )
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

      $( document ).on( 'click', '.mark-arrived', function() {
        let id = $( this ).data( 'id' )
        let formData = new FormData()
        formData.append( 'id', id )

        $.ajax({
          url: '/api/update-sail',
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
          }
        })
      } )
    } )
  </script>
@endsection