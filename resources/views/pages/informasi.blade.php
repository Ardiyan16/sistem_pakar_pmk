@extends('pages/layout')
@section('pageslayout')

<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Informasi</h2>
            <p>Berikut merupakan informasi Penyakit Mulut dan Kuku pada Sapi</p>
        </div>

        <div class="row gy-4">
            <div class="col-lg-10">
                <h3 style="font-weight: bold">Penyakit Mulut dan Kuku (PMK)</h3>
                <p>Penyakit Mulut dan Kuku (PMK) atau Foot and Mouth Disease (FMD) adalah penyakit infeksi
                    virus (Family Picornaviridae) yang bersifat akut dan sangat menular yang menyerang hewan
                    berkuku genap atau belah (cloven hoop). Masa inkubasi penyakit (waktu masuknya virus sampai
                    timbul gejala) berkisar antara 2-8 hari.
                </p>
                <h3 style="font-weight: bold">Mengapa harus waspada terhadap PMK?</h3>
                <p>1. Penyakit ini dapat menyebar dengan sangat cepat.<br>
                    2. Menimbulkan kerugian ekonomi yang sangat tinggi berupa kematian ternak, penurunan
                    produksi dan penurunan berat badan, adanya hambatan perdagangan, dan keresahan
                    masyarakat.<br>
                    3. Pengendaliannya sulit dan kompleks karena membutuhkan biaya vaksinasi yang sangat
                    besar serta pengawasan lalu lintas hewan yang ketat.
                </p>
                <h3 style="font-weight: bold">Cara Penularan PMK</h3>
                <p>1. Kontak langsung (antara hewan yang tertular dengan hewan rentan melalui droplet atau
                    cairan/leleran hidung).<br>
                    2. Kontak tidak langsung bukan melalui vector hidup (terbawa mobil angkutan/alat angkut
                    hewan, peralatan, alas kandang, dll).<br>
                    3. Kontak tidak langsung melalui vektor hidup yakni terbawa oleh manusia. Manusia bisa
                    membawa virus ini melalui sepatu, tangan, atau pakaian yang terkontaminasi.<br>
                    4. Sisa makanan atau sampah yang terkontaminasi produk hewan seperti daging dan tulang
                    dari hewan tertular.<br>
                    5. Tersebar melalui udara, air, dan angin.
                </p>
                <h3 style="font-weight: bold">Gejala Klinis PMK pada Sapi</h3>
                <p>Terdapat dua kategori gejala yang menandai hewan tertular PMK, yaitu</p>
                <p>1. PMK Gejala Klinis Ringan
                    PMK dengan gejala klinis ringan adalah penyakit mulut dan kuku yang antara lain ditandai
                    dengan lesi, tidak nafsu makan, demam, lepuh pada mukosa mulut, gusi, lidah, hidung, dan
                    kaki namun tidak sampai menyebabkan pincang, mengeluarkan air liur berlebih, tidak
                    kurus, dan dapat disembuhkan.<br>
                    2. PMK Gejala Klinis Berat
                    PMK dengan gejala klinis berat adalah penyakit mulut dan kuku yang antara lain ditandai
                    dengan lepuh pada kuku hingga terlepas dan menyebabkan pincangatau tidak bisa berjalan,
                    dan menyebabkan kurus(kehilangan berat badan), serta proses penyembuhannya butuh
                    waktu lama atau bahkan mungkin tidak dapat disembuhkan.
                </p>
                <h3 style="font-weight: bold">Pencegahan</h3>
                <p>1. Perlindungan dengan membatasi gerakan hewan, pengawasan lalu lintas ternak dan
                    pelarangan pemasukan ternak dari daerah tertular.<br>
                    2. Pemotongan pada hewan terinfeksi, hewan baru sembuh, dan hewan - hewan yang
                    kemungkinan kontak dengan agen PMK.<br>
                    3. Musnahkan bangkai, sampah, dan semua produk hewan pada area yang terinfeksi.<br>
                    4. Tindakan karantina.<br>
                    5. Melakukan vaksinasi. Ternak yang boleh di vaksin :<br>
                    <span style="margin-left: 15px">1. Sapi sehat.<br></span>
                    <span style="margin-left: 15px">2. Sapi baru sembuh.<br></span>
                    <span style="margin-left: 15px">3. Sapi dalam masa penyembuhan.<br></span>
                    <span style="margin-left: 15px">4. Sapi diatas umur 2 Minggu, induk punting boleh di vaksin.</span>
                </p>
            </div>
        </div>
        <hr>
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
