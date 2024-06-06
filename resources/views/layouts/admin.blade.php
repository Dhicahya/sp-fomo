<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Spatifomo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('include.admin.style')

</head>

<body>
    

    @include('include.admin.sidebar')
    @include('include.admin.navbar')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

    @include('include.admin.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    
    @include('include.admin.script')

</body>

</html>
