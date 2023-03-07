@extends('pages/layout')
@section('pageslayout')

<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Informasi</h2>
            <p>Berikut Merupakan Informasi Website Sistem Pakar Diagnosa Penyakit Mulut dan Kuku pada Sapi</p>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Penyakit</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Gejala</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Data Knowladge</button>
                <button class="nav-link" id="nav-bobot-tab" data-bs-toggle="tab" data-bs-target="#nav-bobot" type="button" role="tab" aria-controls="nav-bobot" aria-selected="false">Bobot Keyakinan</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row mt-3">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Klasifikasi</th>
                                <th>Nama Penyakit</th>
                                <th>Keterangan</th>
                                <th>Saran Pengobatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($penyakit as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->kode_klasifikasi}}</td>
                                    <td>{{ $value->nama_penyakit }}</td>
                                    <td>{{ $value->keterangan_penyakit }}</td>
                                    <td>{{ $value->saran_pengobatan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row mt-3">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Gejala</th>
                                <th>Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($gejala as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->kode_gejala}}</td>
                                    <td>{{ $value->gejala }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row mt-3">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Diagnosa / Penyakit</th>
                                <th>Nilai MB</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($knowladge as $value)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $value->gejala}}</td>
                                    <td>{{ $value->nama_penyakit }}</td>
                                    <td>{{ $value->nilai_mb }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-bobot" role="tabpanel" aria-labelledby="nav-bobot-tab">
                <div class="row mt-3">
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
</section><!-- End About Us Section -->

@endsection
