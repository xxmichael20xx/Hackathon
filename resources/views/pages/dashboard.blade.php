@extends( 'layouts.dashboard' )

@section( 'content' )
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Dashboard</span>
      <h3 class="page-title">Dashboard Overview</h3>
    </div>
  </div>
  <!-- End Page Header -->
  <!-- Small Stats Blocks -->
  <div class="row">
    <div class="col-3 col-md-3 col-sm-3 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Clients</span>
              <h6 class="stats-small__value count my-3">{{ number_format( $clients ) }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 col-md-3 col-sm-3 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">Sails Today</span>
              <h6 class="stats-small__value count my-3">{{ number_format( $sailsToday ) }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 col-md-3 col-sm-3 mb-4">
      <div class="stats-small stats-small--1 card card-small">
        <div class="card-body p-0 d-flex">
          <div class="d-flex flex-column m-auto">
            <div class="stats-small__data text-center">
              <span class="stats-small__label text-uppercase">All Sails</span>
              <h6 class="stats-small__value count my-3">{{ number_format( $allSails ) }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection