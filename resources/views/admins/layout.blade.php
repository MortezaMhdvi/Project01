<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/style.css">

    <title></title>
</head>
<body>
@include('layouts.header')

<main class="col-md-9 px-md-4">
    @yield('content')
</main>
<script src="/js/jquery-3.7.1.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/sweetalet.js"></script>
<script src="/js/jquery.repeater.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });

</script>

@yield('script')

</body>

</html>
