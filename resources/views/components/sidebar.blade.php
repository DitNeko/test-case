<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Sidebar</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar styles */
        .aside {
            width: 250px;
            background-color: #563d7c;
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .aside ul {
            padding: 0;
        }

        .aside a {
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.2s;
        }

        .aside a:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
            transition: 0.7s;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .sidebar-collapsed .aside {
            transform: translateX(-250px);
        }

        .sidebar-collapsed .main-content {
            margin-left: 0;
        }

        .toggle-btn {
            border: none;
            background: none;
            color: #563d7c;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .list-unstyled li {
            margin: 10px 0;
        }

        .text-sidebar i {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="aside" id="collapsedSidebar">
        <div class="p-3">
            <a href="/dashboard" class="text-decoration-none "><h4 class="text-white mb-4 mt-3">Main Menu</h4></a> 
            <ul class="list-unstyled">
                <li>
                    <a href="/dashboard" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-home"></i> Beranda
                    </a>
                </li>
                <li>
                    <a href="/inbox" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-inbox-in"></i> Inbox
                    </a>
                </li>
                <li>
                    <a href="/layanan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-settings"></i> Layanan
                    </a>
                </li>
                <li>
                    <a href="/Permohonan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-envelope-download"></i> Permohonan Saya
                    </a>
                </li>
                <li>
                    <a href="/surveyKepuasan" class="text-sidebar text-decoration-none ms-2 d-flex align-items-center">
                        <i class="fi fi-rr-test"></i> Survey Kepuasan
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <button class="toggle-btn mt-3 ms-3" id="toggleBtn">
            <i class="bi bi-list"></i>
        </button>

        <div class="container mt-4">
        {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('collapsedSidebar');
        const mainContent = document.getElementById('mainContent');

        toggleBtn.addEventListener('click', () => {
            document.body.classList.toggle('sidebar-collapsed');
        });
    </script>

</body>

</html>
