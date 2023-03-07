@extends('admin/adminlayout')
@section('adminlayout')

<style>
    #nama_penyakit {
        width: 100%;
    }
</style>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gejala</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Gejala</li>
        </ol>
    </div>
    <div class="row btn-add ml-2 mb-3">
        <button type="button" class="btn btn-sm btn-primary btn-tambah"><i class="fa fa-plus-circle"></i> Tambah Gejala</button>
    </div>
    <div class="row form-tambah-gejala">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Gejala</h6>
                    <span class="pull-right tutup-form" data-effect="fadeOut" title="Tutup Form"><i class="fa fa-times"></i></span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin-gejala') }}" method="post" name="add_gejala">
                        @csrf
                        <div class="form-group">
                            <label>Kode Gejala</label>
                            <input type="text" class="form-control" name="kode_gejala" id="kode_gejala" aria-describedby="emailHelp" placeholder="Isikan Kode">
                        </div>
                        <div class="form-group">
                            <label>Gejala</label>
                            <input type="text" class="form-control" id="gejala" name="gejala" placeholder="Gejala">
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
                    <h6 class="m-0 font-weight-bold text-primary">List Data Gejala</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($gejalas as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->kode_gejala }}</td>
                                    <td>{{ $value->gejala }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editdata" class="badge bg-primary tombol-edit" title="Edit" style="color: white" data-id="{{ $value->id }}" data-kode_gejala="{{ $value->kode_gejala }}" data-gejala="{{ $value->gejala }}"><i class="fa fa-edit"></i></button>
                                        <a href="{{ url('/admin-gejala/hapus/' . $value->id) }}" title="Hapus" class="badge bg-danger hapus-data" style="color: white"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin-gejala/update') }}" method="POST" name="edit_gejala">
                    @csrf
                    <div class="form-group">
                        <label>Kode Gejala</label>
                        <input type="hidden" name="id" id="id" class="id">
                        <input type="text" class="form-control kode-gejala" name="kode_gejala" id="kode_gejala" aria-describedby="emailHelp" placeholder="Isikan Kode">
                    </div>
                    <div class="form-group">
                        <label>Gejala</label>
                        <input type="text" class="form-control gejala" id="gejala" name="gejala" placeholder="Gejala">
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
        $('.form-tambah-gejala').hide();

        $('.btn-tambah').click(function() {
            $('.form-tambah-gejala').show();
        })

        $('.tutup-form').click(function() {
            $('.form-tambah-gejala').hide();
        })

    })

    $(document).on('click', '.tombol-edit', function() {
        let id = $(this).attr('data-id'),
            kode_gejala = $(this).attr('data-kode_gejala'),
            gejala = $(this).attr('data-gejala');

        $('#id').val(id);
        $('.kode-gejala').val(kode_gejala);
        $('.gejala').val(gejala);

    })

    $(function() {
        $("form[name='add_gejala']").validate({
            rules: {
                kode_gejala: {
                    required: true
                },
                gejala: {
                    required: true,
                }
            },
            messages: {
                kode_gejala: {
                    required: "kode gejala is required (kode gejala harus di isi)"
                },
                gejala: {
                    required: "gejala is required (gejala harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        $("form[name='edit_gejala']").validate({
            rules: {
                kode_gejala: {
                    required: true
                },
                gejala: {
                    required: true,
                }
            },
            messages: {
                kode_gejala: {
                    required: "kode gejala is required (kode gejala harus di isi)"
                },
                gejala: {
                    required: "gejala is required (gejala harus di isi)",
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
            text: "Data gejala akan dihapus!",
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
