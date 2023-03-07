@extends('admin/adminlayout')
@section('adminlayout')
<style>
    #nama_penyakit {
        width: 100%;
    }
</style>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pesan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Pesan</li>
        </ol>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Data Pesan (Kritik, Saran, dan Masukan)</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Perihal</th>
                                <th>Isi Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pesan as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->nama_lengkap }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->perihal }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#pesan" class="badge bg-success tombol-pesan" title="Lihat Pesan" style="color: white" data-pesan="{{ $value->pesan }}" data-nama_lengkap="{{ $value->nama_lengkap }}"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pesan dari <span class="pesan-dari"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="isi-pesan"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).on('click', '.tombol-pesan', function() {
        let pesan = $(this).attr('data-pesan'),
            nama_lengkap = $(this).attr('data-nama_lengkap');
        $('.isi-pesan').html(pesan);
        $('.pesan-dari').html(nama_lengkap);
    })

</script>
@endsection
