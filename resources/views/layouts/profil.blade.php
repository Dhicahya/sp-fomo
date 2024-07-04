<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Spatifomo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

   @include('include.style')       
</head>

<body>

    @include("include.navbar")

    @yield('content')

    @include('include.footer')

    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    @include('include.script')
</body>

</html>
