@extends('admin/adminlayout')
@section('adminlayout')
<style>
    #nama_penyakit {
        width: 100%;
    }
</style>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bobot Keyakinan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Bobot</li>
        </ol>
    </div>
    <div class="row btn-add ml-2 mb-3">
        <button type="button" class="btn btn-sm btn-primary btn-tambah"><i class="fa fa-plus-circle"></i> Tambah Bobot</button>
    </div>
    <div class="row form-tambah-bobot">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Bobot Keyakinan</h6>
                    <span class="pull-right tutup-form" data-effect="fadeOut" title="Tutup Form"><i class="fa fa-times"></i></span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin-bobot') }}" method="post" name="add_bobot">
                        @csrf
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Isikan Keterangan">
                        </div>
                        <div class="form-group">
                            <label>Nilai Bobot</label>
                            <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Isinkan Nilai Bobot">
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
                    <h6 class="m-0 font-weight-bold text-primary">List Data Bobot Keyakinan</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th width="10%">No</th>
                                <th width="50%">Keterangan</th>
                                <th width="20%">Nilai Bobot</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($bobot as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->keterangan }}</td>
                                    <td>{{ $value->nilai_bobot }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editdata" class="badge bg-primary tombol-edit" title="Edit" style="color: white" data-id="{{ $value->id }}" data-keterangan="{{ $value->keterangan }}" data-nilai_bobot="{{ $value->nilai_bobot }}"><i class="fa fa-edit"></i></button>
                                        <a href="{{ url('/admin-bobot/hapus/' . $value->id) }}" title="Hapus" class="badge bg-danger hapus-data" style="color: white"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Nilai Bobot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin-bobot/update') }}" method="POST" name="edit_bobot">
                    @csrf
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="hidden" name="id" id="id" class="id">
                        <input type="text" class="form-control keterangan" name="keterangan" id="keterangan" aria-describedby="emailHelp" placeholder="Isikan Keterangan">
                    </div>
                    <div class="form-group">
                        <label>Nilai Bobot</label>
                        <input type="text" class="form-control nilai-bobot" id="nilai_bobot" name="nilai_bobot" placeholder="Isikan Nilai Bobot">
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
        $('.form-tambah-bobot').hide();

        $('.btn-tambah').click(function() {
            $('.form-tambah-bobot').show();
        })

        $('.tutup-form').click(function() {
            $('.form-tambah-bobot').hide();
        })

    })

    $(document).on('click', '.tombol-edit', function() {
        let id = $(this).attr('data-id'),
            keterangan = $(this).attr('data-keterangan'),
            nilai_bobot = $(this).attr('data-nilai_bobot');

        $('#id').val(id);
        $('.keterangan').val(keterangan);
        $('.nilai-bobot').val(nilai_bobot);

    })

    $(function() {
        $("form[name='add_bobot']").validate({
            rules: {
                keterangan: {
                    required: true
                },
                nilai_bobot: {
                    required: true,
                }
            },
            messages: {
                keterangan: {
                    required: "keterangan is required (keterangan harus di isi)"
                },
                nilai_bobot: {
                    required: "nilai bobot is required (nilai bobot harus di isi)",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        $("form[name='edit_bobot']").validate({
            rules: {
                keterangan: {
                    required: true
                },
                nilai_bobot: {
                    required: true,
                }
            },
            messages: {
                keterangan: {
                    required: "keterangan is required (keterangan harus di isi)"
                },
                nilai_bobot: {
                    required: "nilai bobot is required (nilai bobot harus di isi)",
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
            text: "Data bobot akan dihapus!",
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
