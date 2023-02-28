@extends('admin/adminlayout')
@section('adminlayout')

<style>
    #nama_penyakit {
        width: 100%;
    }
</style>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penyakit</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Penyakit</li>
        </ol>
    </div>
    <div class="row btn-add ml-2 mb-3">
        <button type="button" class="btn btn-sm btn-primary btn-tambah"><i class="fa fa-plus-circle"></i> Tambah Penyakit</button>
    </div>
    <div class="row form-tambah-penyakit">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penyakit</h6>
                    <span class="pull-right tutup-form" data-effect="fadeOut" title="Tutup Form"><i class="fa fa-times"></i></span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin-penyakit') }}" method="post" name="add_penyakit">
                        @csrf
                        <div class="form-group">
                            <label>Kode Klasifikasi</label>
                            <input type="text" class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" aria-describedby="emailHelp" placeholder="Isikan Kode">
                        </div>
                        <div class="form-group">
                            <label>Nama Penyakit</label>
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit">
                        </div>
                        <div class="form-group">
                            <label>Keterangan Penyakit</label>
                            <textarea class="form-control" rows="5" name="keterangan_penyakit" placeholder="Keterangan Penyakit"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Saran/Solusi</label>
                            <textarea class="form-control" rows="5" name="saran_pengobatan" placeholder="Saran/Solusi"></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Data Penyakit</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Klasifikasi</th>
                                <th>Nama Penyakit</th>
                                <th>Keterangan</th>
                                <th>Saran / Solusi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($penyakit as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->kode_klasifikasi }}</td>
                                    <td>{{ $value->nama_penyakit }}</td>
                                    <td>{{ $value->keterangan_penyakit }}</td>
                                    <td>{{ $value->saran_pengobatan }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editdata" class="badge bg-primary tombol-edit" title="Edit" style="color: white" data-id="{{ $value->id }}" data-kode_klasifikasi="{{ $value->kode_klasifikasi }}" data-nama_penyakit="{{ $value->nama_penyakit }}" data-keterangan_penyakit="{{ $value->keterangan_penyakit }}" data-saran_pengobatan="{{ $value->saran_pengobatan }}"><i class="fa fa-edit"></i></button>
                                        <a href="{{ url('/admin-penyakit/hapus/' . $value->id) }}" title="Hapus" class="badge bg-danger hapus-data" style="color: white"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin-penyakit/update') }}" method="POST" name="edit_penyakit">
                    @csrf
                    <div class="form-group">
                        <label>Kode Klasifikasi</label>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="text" class="form-control kode-klasifikasi" name="kode_klasifikasi" id="kode_klasifikasi" placeholder="Isikan Kode">
                    </div>
                    <div class="form-group">
                        <label>Nama Penyakit</label>
                        <input type="text" class="form-control nama-penyakit" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Penyakit</label>
                        <textarea class="form-control keterangan-penyakit" rows="5" name="keterangan_penyakit" id="keterangan_penyakit" placeholder="Keterangan Penyakit"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Saran/Solusi</label>
                        <textarea class="form-control" rows="5" name="saran_pengobatan" id="saran_pengobatan" placeholder="Saran/Solusi"></textarea>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.form-tambah-penyakit').hide();

        $('.btn-tambah').click(function() {
            $('.form-tambah-penyakit').show();
        })

        $('.tutup-form').click(function() {
            $('.form-tambah-penyakit').hide();
        })
    })

    $(document).on('click', '.tombol-edit', function() {
        let id = $(this).attr('data-id');
        let kode_klasifikasi = $(this).attr('data-kode_klasifikasi');
        let nama_penyakit = $(this).attr('data-nama_penyakit');
        let keterangan_penyakit = $(this).attr('data-keterangan_penyakit');
        let saran_pengobatan = $(this).attr('data-saran_pengobatan');
        $('#id').val(id);
        $('.kode-klasifikasi').val(kode_klasifikasi);
        $('.nama-penyakit').val(nama_penyakit);
        $('#keterangan_penyakit').val(keterangan_penyakit);
        $('#saran_pengobatan').val(saran_pengobatan);
    })

    $(function() {
        $("form[name='add_penyakit']").validate({
            rules: {
                kode_klasifikasi: {
                    required: true
                },
                nama_penyakit: {
                    required: true,
                }
            },
            messages: {
                kode_klasifikasi: {
                    required: "kode klasifikasi is required (kode klasifikasi harus di isi)"
                },
                nama_penyakit: {
                    required: "nama penyakit is required (nama penyakit harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        $("form[name='edit_penyakit']").validate({
            rules: {
                kode_klasifikasi: {
                    required: true
                },
                nama_penyakit: {
                    required: true,
                }
            },
            messages: {
                kode_klasifikasi: {
                    required: "kode klasifikasi is required (kode klasifikasi harus di isi)"
                },
                nama_penyakit: {
                    required: "nama penyakit is required (nama penyakit harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $('.hapus-data').on('click', function(e) {
        e.preventDefault();
        const link = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Data penyakit akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#898989',
            confirmButtonText: 'Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = link;
            }
        })

    })

</script>
@endsection

