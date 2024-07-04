<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Spatifomo - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('include.admin.style')

</head>

<body>

    @include('include.admin.navbar')

    @include('include.admin.sidebar')

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('include.admin.footer')

  @include('include.admin.script')

</body>

</html>