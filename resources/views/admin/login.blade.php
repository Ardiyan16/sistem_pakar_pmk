<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ url('image/logo2.png') }}" rel="icon">
  <title>SP-PMK | Login</title>
  <link href="{{ url('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('admin/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
@include('sweetalert::alert')
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="{{ url('image/logo2-hitam.png') }}" height="200" width="300">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="{{ url('/action-login') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Masukkan Email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control password" id="exampleInputPassword" placeholder="Masukkan Password">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input form-checkbox" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Tampil Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('admin/js/ruang-admin.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $('.form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.password').attr('type', 'text');
            } else {
                $('.password').attr('type', 'password');
            }
        });
    });
</script>
</body>

</html>
