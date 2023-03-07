@extends('pages/layout')
@section('pageslayout')

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Konsultasi</h2>
            <p>Isikan data diri anda dan mulai memilih beberapa gejala yang dialami oleh sapi untuk menentukan hasil diagnosa untuk penyakit yang dialami oleh sapi</p>
        </div>

        <form>
            <div class="row gx-lg-0 gy-4">
                <form action="{{ url('/sp-kontak/send') }}" method="post" role="form">
                    @csrf
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia">
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                    </div>
                </form>
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
                                    <th>{{ $value->gejala }}</th>
                                    <th>
                                        <select name="bobot_gejala" class="form-control">
                                            <option>--Pilih Bobot--</option>
                                            @foreach ($bobot as $data)
                                                <option value="{{ $data->nilai_bobot }}">{{ $data->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

    </div>
</section>

@endsection
