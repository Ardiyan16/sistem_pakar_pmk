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
            <div class="icon"><i class="bi bi-easel"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-gem"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-geo-alt"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
          </div>
        </div>
        <!--End Icon Box -->

        <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="icon-box">
            <div class="icon"><i class="bi bi-command"></i></div>
            <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
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
        <h2>About Us</h2>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-6">
          <h3>Voluptatem dignissimos provident quasi corporis</h3>
          <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
          <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
          <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
        </div>
        <div class="col-lg-6">
          <div class="content ps-0 ps-lg-5">
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle-fill"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle-fill"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
            </p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->

@endsection
