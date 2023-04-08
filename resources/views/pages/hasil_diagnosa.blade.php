@extends('pages/layout')
@section('pageslayout')

 <!-- ======= Breadcrumbs ======= -->
 <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Hasil Diagnosa</h2>
            <p>Berikut merupakan hasil diagnosa dari gejala yang anda pilih</p>
        </div>



    </div>
</section>

 <!-- ======= Stats Counter Section ======= -->
 <section id="stats-counter" class="stats-counter">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4 align-items-center">

        <div class="col-lg-6">
          <img src="{{ url('image/icon_hasil.png') }}" alt="" class="img-fluid">
        </div>

        <div class="col-lg-6">

          <div class="stats-item d-flex align-items-center">
              <p>Dari gejala dan bobot yang anda pilih dapat disimpulkan bahwa sapi di diagnosa <strong>{{ $kunjungan->nama_penyakit }}</strong> dengan persentase <strong style="color: #008374">{{ $kunjungan->nilai_hasil }}%</strong></p>
          </div><!-- End Stats Item -->
            <p>Berikut gejala yang anda pilih</p>
            @foreach ($detail_kunjungan as $value)
                <p><strong>{{ $value->id_gejala }}</strong> => {{ $value->gejala }}</p><br>
            @endforeach
            @if ($kunjungan->nilai_hasil_2 != 0)
                <div class="stats-item d-flex align-items-center">
                    <p>Sedangkan pada penyakit <strong>@php
                        if($kunjungan->hasil_2 == 'P01') {
                            echo 'PMK Gejala Klinis Ringan';
                        } else {
                            echo 'PMK Gejala Klinis Berat';
                        }
                    @endphp</strong> memperoleh hasil presentasi  <strong style="color: #008374">{{ $kunjungan->nilai_hasil_2 }}%</strong></p>
                </div><!-- End Stats Item -->
            @endif
          {{-- <div class="stats-item d-flex align-items-center">
            <span data-purecounter-start="0" data-purecounter-end="453" data-purecounter-duration="1" class="purecounter"></span>
            <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
          </div><!-- End Stats Item --> --}}

        </div>

      </div>

    </div>
  </section><!-- End Stats Counter Section -->

<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Information</h2>
        <p>Berikut merupakan informasi yang dapat anda peroleh dari diagnosa diatas</p>
      </div>

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 col-md-6">
          <div class="service-item  position-relative">
            <div class="icon">
              <i class="bi bi-info-circle"></i>
            </div>
            <h3>Apa itu {{ $kunjungan->nama_penyakit }}</h3>
            <p>{{ $kunjungan->keterangan_penyakit }}.</p>
            {{-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> --}}
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-6 col-md-6">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-lightbulb"></i>
            </div>
            <h3>Saran pengobatan {{ $kunjungan->nama_penyakit }}</h3>
            <div class="saran_pengobatan">
                {{ $kunjungan->saran_pengobatan }}
            </div>
            {{-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> --}}
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>
</section><!-- End Our Services Section -->

@endsection
