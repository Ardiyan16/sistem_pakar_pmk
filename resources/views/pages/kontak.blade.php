@extends('pages/layout')
@section('pageslayout')

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Kontak</h2>
            <p>Kirimkan pesan untuk admin baik masukan, kritik, atau saran</p>
        </div>

        <div class="row gx-lg-0 gy-4">

        <div class="col-lg-4">

            <div class="info-container d-flex flex-column align-items-center justify-content-center">
                <div class="info-item d-flex">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h4>Lokasi:</h4>
                        <p>Jl Hasyim Asyari Bondowoso Jawa Timur</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h4>Email:</h4>
                        <p>shinta@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex">
                    <i class="bi bi-phone flex-shrink-0"></i>
                    <div>
                        <h4>No Telp:</h4>
                        <p>085335102750</p>
                    </div>
                </div><!-- End Info Item -->
            </div>

        </div>

        <div class="col-lg-7" style="margin-left: 20px">
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/sp-kontak/send') }}" method="post" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Your Name (Nama Anda)">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email (Email Anda)">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Subject (Perihal)">
                    @error('perihal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="pesan" rows="7" placeholder="Message (Pesan)"></textarea>
                    @error('pesan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div> --}}
                <div class="text-center mt-3"><button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Kirim Pesan</button></div>
            </form>
        </div><!-- End Contact Form -->

      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
