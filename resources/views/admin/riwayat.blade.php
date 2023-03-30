@extends('admin/adminlayout')
@section('adminlayout')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat</li>
        </ol>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Data Riwayat</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Alamat</th>
                                <th>Diagnosa</th>
                                <th>Nilai Diagnosa</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kunjungan as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td>{{ $value->usia }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->nama_penyakit }}</td>
                                    <td>{{ $value->nilai_hasil }}</td>
                                    <td><a href="#gejala_dipilih{{ $value->id }}" data-toggle="modal" class="btn btn-success btn-sm" title="gejala yang dipilih"><i class="fa fa-eye"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($kunjungan as $data)
    <div class="modal fade" id="gejala_dipilih{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gejala yang dipilih</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        @php
                            // Illuminate\Support\Facades\DB;

                            $detail_kunjungan = DB::table('gejala_terpilihs')
                                                    ->select('gejala_terpilihs.*', 'gejalas.gejala')
                                                    ->leftJoin('gejalas', 'gejala_terpilihs.id_gejala', '=', 'gejalas.kode_gejala')
                                                    ->where('id_kunjungan', $data->id)
                                                    ->get();
                        @endphp
                        @foreach ($detail_kunjungan as $data)
                            <span>{{ $data->id_gejala }} => {{ $data->gejala }}</span><br>
                        @endforeach
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

