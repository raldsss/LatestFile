<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

        * {
            font-family: 'Poppins';
        }

        .sidebar {
            height: 100vh;
            background-color: #0d2237;
            color: white;
            padding-top: 20px;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link {
            color: white;
            display: flex;
            align-items: center;
        }

        .sidebar-hidden {
            transform: translateX(-100%);
        }

        .content-wrapper {
            transition: margin-left 0.3s ease;
            margin-left: 250px;
            padding: 20px;
        }

        .content-expanded {
            margin-left: 0;
        }

        .sidebar .nav-link.active {
            background-color: #495057;
        }

        .sidebar .nav-item + .nav-item {
            margin-top: 10px;
        }

        .nav-icon {
            margin-right: 10px;
        }

        .main-header {
            transition: margin-left 0.3s ease;
            margin-left: 250px;
            width: calc(100% - 250px);
        }

        .main-header-expanded {
            margin-left: 0;
            width: 100%;
        }

        .brand-link {
            display: flex;
            align-items: center;
            padding: 10px;
        }

        .brand-link .brand-image {
            height: 35px;
            width: 35px;
        }

        .user-panel {
            padding: 10px;
            margin-bottom: 1rem;
        }

        .user-panel .image {
            margin-right: 10px;
        }

        .user-panel .image img {
            height: 35px;
            width: 35px;
        }

        p {
            position: relative;
            top: 8px;
        }

        /* Hide toggle button on desktop and show on mobile */
        @media (min-width: 769px) {
            #toggleSidebar {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 200px;
            }

            .sidebar-hidden {
                transform: translateX(0);
            }

            .content-wrapper {
                margin-left: 0;
            }

            .content-expanded {
                margin-left: 200px;
            }

            .main-header {
                margin-left: 0;
                width: 100%;
            }

            .main-header-expanded {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            #toggleSidebar {
                display: block;
            }
        }



    </style>
</head>

<body>

    @include('sweetalert::alert')

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" id="toggleSidebar"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">







                <li class="nav-item">
                    <a href="/changeAccount" class="nav-link">
                        <span style="cursor: pointer; margin-top: -5px; border-radius:50px;" class="btn btn-primary">Admin</span>
                    </a>
                </li>

            </ul>
        </nav>



        <!-- /.navbar -->

        <aside class="sidebar">
            <div href="/dashboard" class="brand-link d-flex align-items-center mb-3">
                <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/449139518_2255795391429131_1842697537809638665_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeG733AJhmIhZLTRhryPm-gz84p3bpuuUzrzindum65TOoxypQGXpRZKGSf_5XA6ERwoPs58j_9VL6VJLBZ7i-kb&_nc_ohc=Z7VZ_AxojhoQ7kNvgFDDJR2&_nc_ht=scontent.fmnl13-1.fna&oh=00_AYBj2K9Hjn_A4o2QHSH1IARlSN5rPJj4-Opz0_8qrppkWA&oe=668453EB" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8;border-radius:50%;">
                <span class="brand-text font-weight-light ml-3">AETS 1</span>
            </div>
            <hr style="color: rgb(193, 193, 193); background-color: rgb(193, 193, 193); border: none; height: 1px;">


            <div class="user-panel d-flex align-items-center mb-3">
                <div class="image">
                    <img src="https://cdn-icons-png.flaticon.com/512/6596/6596121.png" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <div href="#" class="d-block">{{ auth()->user()->name }}</div>
                </div>
            </div>
            <hr style="color: rgb(193, 193, 193); background-color: rgb(193, 193, 193); border: none; height: 1px;">

            <nav>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/alumni" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Alumni Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employmentdata.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Employment Data</p>
                        </a>
                    </li>
                    <li class="nav-item mt-auto">
                        <a class="nav-link" href="#" onclick="logout(event)">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        <form action="/logout" method="POST" id="logout-form" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        function logout(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to logout",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#82868b',
                confirmButtonText: 'Yes, Log Out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        $(function() {
            var url = window.location.href;
            $('ul.nav a').filter(function() {
                return this.href === url;
            }).addClass('active');
        });

        // Toggle sidebar visibility
        $('#toggleSidebar').click(function() {
            $('.sidebar').toggleClass('sidebar-hidden');
            $('.content-wrapper').toggleClass('content-expanded');
            $('.main-header').toggleClass('main-header-expanded');
        });
    </script>





</body>

</html>
