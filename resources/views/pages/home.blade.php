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
        <p>Sistem Pakar Penyakit Mulut dan Kuku pada Sapi</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-6">
          <h3>Apa Itu Sistem Pakar Penyakit Mulut dan Kuku Sapi ?</h3>
          <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
          <p>Penyakit Mulut dan Kuku (PMK) adalah penyakit hewan yang sangat menular
            yang paling ditakuti di dunia dan menyerang semua hewan berkuku ganda atau
            belah (cloven hoop). PMK di Indonesia pertama kali dilaporkan terjadi di daerah
            Malang Jawa Timur pada tahun 1987. Namun pada tahun 1990, Indonesia berhasil
            dibebaskan kembali dari PMK yang status bebasnya dinyatakan dalam Resolusi
            OIE no XI tahun 1990 (Ditkeswan 2014)</p>
            <p>
                Sistem pakar dibuat
                dengan pengambilan keputusan suatu masalah yang didukung oleh data yang akurat
                dengan metode penyelesaian yang tepat. Data yang dimaksud adalah data penyakit
                mulut dan kuku (PMK) yang menyerang sapi di Kabupaten Bondowoso, gejalagejala yang dialami, dan cara pengobatannya. Salah satu informasi yang dapat
                memanfaatkan sistem pakar sebagai solusinya adalah sistem pakar mengenai
                penyakit mulut dan kuku (PMK) pada sapi. Berdasarkan pemaparan tersebut, maka
                penulis akan melakukan penelitian tentang Sistem Pakar yang dapat membantu user
                atau peternak sapi dalam mengetahui kemungkinan seekor sapi menderita PMK
                beserta cara pengobatannya, dimana nantinya sistem ini akan dikembangkan
                dengan metode faktor kepastian (Certainty Factor).
            </p>
        </div>
        <div class="col-lg-6">
          <div class="content ps-0 ps-lg-5">
            <p class="fst-italic">
                Berikut merupakan kelebihan atau keuntungan dengan adanya sistem pakar penyakit mulut dan kuku
            </p>
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Memberikan kemudahan kepada peternak sapi untuk mengetahui kemungkinan
                sapi terserang penyakit mulut dan kuku.</li>
              <li><i class="bi bi-check-circle-fill"></i> Membantu dokter hewan dalam menangani penyakit mulut dan kuku pada sapi
                serta memberikan cara pengobatannya.</li>
              <li><i class="bi bi-check-circle-fill"></i> Hasil penelitian diharapkan dapat dijadikan bahan acuan atau masukan untuk
                penelitian selanjutnya dalam melakukan penelitian mengenai sistem pakar diagnosa
                penyakit mulut dan kuku pada sapi dengan lebih baik.</li>
            </ul>
            <p>
                Dengan adanya Sistem Pakar Penyakit Mulut dan Kuku ini dapat membantu para masyarakat yang mengalami permasalahan tentang hewan ternak yang sedang mengalami gejala-gejala penyakit mulut dan kuku.
            </p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

@endsection
