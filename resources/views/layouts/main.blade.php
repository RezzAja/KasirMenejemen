<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier Management</title>

    <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/boxicons-2.1.4/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
</head>

<body class="bg-body-tertiary">
   @include('components.navbar')

    <section class="py-5">
        <div class="container">
           @yield('content')
        </div>
    </section>
    <script src="{{ url('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
