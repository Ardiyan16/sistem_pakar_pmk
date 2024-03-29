@extends('admin/adminlayout')
@section('adminlayout')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kunjungan Konsultasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_kunjungan }}</div>
                        </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Penyakit</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_penyakit }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-virus fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Gejala</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $total_gejala }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-stethoscope fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pesan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_pesan }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-envelope fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
