@extends('pages/layout')
@section('banner')
<div class="container position-relative">
    <div class="row gy-5" data-aos="fade-in">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
        <h2>Selamat Datang <span>SP-PMK</span></h2>
        <p>SP-PMK adalah website sistem pakar diagnosa penyakit mulut dan kuku pada sapi.</p>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="{{ url('image/logo2.png') }}" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
      </div>
    </div>
  </div>

  <div class="icon-boxes position-relative">
    <div class="container position-relative">
      <div class="row gy-4 mt-5">

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="fa fa-info"></i></div>
            <h4 class="title"><a href="{{ url('/sp-informasi') }}" class="stretched-link">Informasi</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="fa fa-stethoscope"></i></div>
            <h4 class="title"><a href="{{ url('/sp-konsultasi') }}" class="stretched-link">Konsultasi</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="fa fa-history"></i></div>
            <h4 class="title"><a href="{{ url('/sp-riwayat') }}" class="stretched-link">Riwayat Konsultasi</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="fa fa-phone"></i></div>
            <h4 class="title"><a href="{{ url('/sp-kontak') }}" class="stretched-link">Kontak</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

      </div>
    </div>
  </div>

  </div>
@endsection
@section('pageslayout')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Tentang SP-PMK</h2>
                <p>Berikut merupakan informasi tentang SP-PMK</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <img src="{{ url('image/sapi.jpg') }}" class="img-fluid rounded-4 mb-4" alt="">
                </div>
                <div class="col-lg-6">
                    <h3  class="content ps-0 ps-lg-5">Apa itu SP-PMK ?</h3>
                    <div class="content ps-0 ps-lg-5">
                        <p>
                            SP-PMK adalah Sistem Pakar Diagnosa Penyakit
                            Mulut dan Kuku pada Sapi yang merupakan sebuah website
                            yang digunakan sebagai media konsultasi untuk
                            mendiagnosis penyakit mulut dan kuku yang menyerang
                            ternak sapi. Dengan dibangunnya sistem ini diharapkan
                            dapat membantu para masyarakat khususnya peternak sapi
                            agar dapat lebih mengetahui informasi tentang gejala-gejala
                            dan mendiagnosis penyakit serta pengobatan penyakit mulut
                            dan kuku pada sapi.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Penyakit Sering Muncul</h2>
                <p>Berikut merupakan informasi tentang SP-PMK</p>
            </div>

            <div class="row gy-4">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Jumlah Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($penyakit_muncul as $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $value->nama_penyakit}}</td>
                                <td>{{ $value->jml_kunjungan .' kali diagnosa' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section><!-- End About Us Section -->

@endsection
