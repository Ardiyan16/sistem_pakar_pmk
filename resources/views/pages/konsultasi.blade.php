@extends('pages/layout')
@section('pageslayout')

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Konsultasi</h2>
            <p>Isikan data diri anda dan mulai memilih beberapa gejala yang dialami oleh sapi untuk menentukan hasil diagnosa untuk penyakit yang dialami oleh sapi</p>
        </div>

        <div class="row" style="margin-left: 5px">
            <a class="btn btn-primary col-md-2 btn-view-bobot" style="margin-bottom: 20px;">
                Tampil Tabel Bobot
            </a>
            <div class="row tabel-bobot">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Nilai Bobot</h6>
                            <span class="pull-right tutup-tabel" data-effect="fadeOut" title="Tutup Tabel"><i class="fa fa-times"></i></span>
                        </div>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Nilai Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($bobot as $value)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $value->keterangan}}</td>
                                        <td>{{ $value->nilai_bobot }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <form action="{{ url('/sp-konsultasi/action') }}" method="post">
            @csrf
            <div class="row gx-lg-0 gy-4">
                @if (count($errors) > 0)
                    <div class = "alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                </div>
            </div><!-- End Contact Form -->

            <div class="row gx-lg-0 gy-4 mt-5">
                <div class="row">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Pilihan Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($gejala as $value)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <th><input type="hidden" value="{{ $value->kode_gejala }}" name="kd_gejala">{{ $value->gejala }}</th>
                                    <th>
                                        <select name="bobot_gejala[]" class="form-control">
                                            <option value="" selected>Tidak</option>
                                            @foreach ($bobot as $data)
                                                <option value="{{ $value->kode_gejala }}+{{ $data->nilai_bobot }}">{{ $data->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Konsultasi</button>
            </div>
        </form>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('.tabel-bobot').hide();

        $('.btn-view-bobot').click(function() {
            $('.tabel-bobot').show();
        })

        $('.tutup-tabel').click(function() {
            $('.tabel-bobot').hide();
        })
    })
</script>
@endsection
