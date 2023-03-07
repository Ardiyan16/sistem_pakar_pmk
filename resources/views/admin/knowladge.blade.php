@extends('admin/adminlayout')
@section('adminlayout')

<style>
    #nama_penyakit {
        width: 100%;
    }

    .select2-selection__rendered {
        line-height: 40px !important;
    }

    .select2-container .select2-selection--single {
        height: 40px !important;
    }

    .select2-selection__arrow {
        height: 40px !important;
    }
</style>
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Knowladge</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Knowladge</li>
        </ol>
    </div>
    <div class="row btn-add ml-2 mb-3">
        <button type="button" class="btn btn-sm btn-primary btn-tambah"><i class="fa fa-plus-circle"></i> Tambah Knowladge</button>
    </div>
    <div class="row form-tambah-knowladge">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Knowladge</h6>
                    <span class="pull-right tutup-form" data-effect="fadeOut" title="Tutup Form"><i class="fa fa-times"></i></span>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin-knowladge') }}" method="post" name="add_knowladge">
                        @csrf
                        <div class="form-group">
                            <label>Gejala</label>
                            <select class="form-control" style="width: 100%" name="kd_gejala" id="kode_gejala">
                                <option></option>
                                @foreach ($gejala as $value)
                                    <option value="{{ $value->kode_gejala }}">{{ $value->gejala }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Diagnosa / Penyakit</label>
                            <select class="form-control" style="width: 100%" name="kd_diagnosa" id="kode_penyakit">
                                <option></option>
                                @foreach ($penyakit as $value)
                                    <option value="{{ $value->kode_klasifikasi }}">{{ $value->nama_penyakit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai MB</label>
                            <input type="text" class="form-control" name="nilai_mb" id="nilai_mb" placeholder="Isikan Nilai">
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
                    <h6 class="m-0 font-weight-bold text-primary">List Data Knowladge</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Diagnosa / Penyakit</th>
                                <th>Nilai MB</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($knowladge as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->gejala }}</td>
                                    <td>{{ $value->nama_penyakit }}</td>
                                    <td>{{ $value->nilai_mb }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editdata" class="badge bg-primary tombol-edit" title="Edit" style="color: white" data-id="{{ $value->id }}" data-kode_gejala="{{ $value->kd_gejala }}" data-kode_penyakit="{{ $value->kd_diagnosa }}" data-nilai_mb="{{ $value->nilai_mb }}"><i class="fa fa-edit"></i></button>
                                        <a href="{{ url('/admin-knowladge/hapus/' . $value->id) }}" title="Hapus" class="badge bg-danger hapus-data" style="color: white"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Rule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/admin-knowladge/update') }}" method="POST" name="edit_rule">
                    @csrf
                    <div class="form-group">
                        <label>Gejala</label>
                        <input type="hidden" name="id" class="id" id="id">
                        <select class="form-control kode-gejala" style="width: 100%" name="kd_gejala" id="kode_gejala2">
                            <option></option>
                            @foreach ($gejala as $value)
                                <option value="{{ $value->kode_gejala }}">{{ $value->gejala }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Diagnosa / Penyakit</label>
                        <select class="form-control kode-penyakit" style="width: 100%" name="kd_diagnosa" id="kode_penyakit2">
                            <option></option>
                            @foreach ($penyakit as $value)
                                <option value="{{ $value->kode_klasifikasi }}">{{ $value->nama_penyakit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai MB</label>
                        <input type="text" class="form-control nilai-mb" name="nilai_mb" id="nilai_mb" placeholder="Isikan Nilai">
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
        $('.form-tambah-knowladge').hide();

        $('.btn-tambah').click(function() {
            $('.form-tambah-knowladge').show();
        })

        $('.tutup-form').click(function() {
            $('.form-tambah-knowladge').hide();
        })

        $('#kode_gejala').select2({
            placeholder: 'Pilih Kode Gejala',
        });

        $('#kode_penyakit').select2({
            placeholder: 'Pilih Kode Penyakit',
        });

        $('#kode_gejala2').select2({
            placeholder: 'Pilih Kode Gejala',
        });

        $('#kode_penyakit2').select2({
            placeholder: 'Pilih Kode Penyakit',
        });
    })

    $(document).on('click', '.tombol-edit', function() {
        let id = $(this).attr('data-id'),
            kode_gejala = $(this).attr('data-kode_gejala'),
            kode_penyakit = $(this).attr('data-kode_penyakit'),
            nilai_mb = $(this).attr('data-nilai_mb');

        console.log(id);

        $('#id').val(id);
        $('.kode-gejala').val(kode_gejala).change();
        $('.kode-penyakit').val(kode_penyakit).change();
        $('.nilai-mb').val(nilai_mb);
    })

    $(function() {
        $("form[name='add_knowladge']").validate({
            rules: {
                kd_gejala: {
                    required: true
                },
                kd_diagnosa: {
                    required: true,
                },
                nilai_mb: {
                    required: true,
                }
            },
            messages: {
                kd_gejala: {
                    required: "gejala is required (gejala harus di isi)"
                },
                kd_diagnosa: {
                    required: "penyakit is required (penyakit harus di isi)",
                },
                nilai_mb: {
                    required: "nilai mb is required (nilai mb harus di isi)"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });

    $(function() {
        $("form[name='edit_knowladge']").validate({
            rules: {
                kd_gejala: {
                    required: true
                },
                kd_diagnosa: {
                    required: true,
                },
                nilai_mb: {
                    required: true,
                }
            },
            messages: {
                kd_gejala: {
                    required: "gejala is required (gejala harus di isi)"
                },
                kd_diagnosa: {
                    required: "diagnosa is required (diagnosa harus di isi)",
                },
                nilai_mb: {
                    required: "nilai mb is required (nilai mb harus di isi)",
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
            text: "Data knowladge akan dihapus!",
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
