<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
</head>

<body>
    <style>
        body {
            background: #f5f6f7;
        }

        .wrap-body {
            margin: 0;
            width: 100%;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background-color: #ffffff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .aside {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow: hidden;
            transition: left 0.3s ease;
            padding-top: 60px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background-color: #ffffff;
        }

        .aside.open {
            left: -250px;
        }

        .main-dashboard {
            margin-top: 60px;
            padding: 5px;
            padding-top: 20px;
            transition: margin-left 0.3s ease;
            margin-left: 250px;
        }

        .main-dashboard.shifted {
            margin-left: 0;
        }

        .card-box {
            width: 300px;
            height: 150px;
            background-color: violet;
        }

        .t-box {
            color: black;
        }

        .t-box:hover {
            color: #0d6efd;
        }

        .card-box {
            background-color: #ffffff;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .text-sidebar {
            color: black;
        }

        .text-sidebar:hover {
            color: #0d6efd;
        }

        .fi-rr-menu-burger:hover {
            color: #0d6efd;
        }
    </style>

    <!-- isi -->
     <div class="wrap-body">
        @if (session('success'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                <div class="toast-header bg-primary">
                    <img src="Icons/notification-bell.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Notifikasi</strong>
                    <!-- Menampilkan waktu toast muncul -->
                    <small>{{ now()->format('H:i:s') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif

        @if (session('error'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="successToast">
                <div class="toast-header bg-primary">
                    <img src="Icons/notification-bell.png" class="rounded me-2" alt="...">
                    <strong class="me-auto">Notifikasi</strong>
                    <!-- Menampilkan waktu toast muncul -->
                    <small>{{ now()->format('H:i:s') }}</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        @endif

             

        
        
        {{ $slot }}
    </div>
    <!-- isi end -->
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/public/Js/countryData.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <!-- jQuery (select2 dependency) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
