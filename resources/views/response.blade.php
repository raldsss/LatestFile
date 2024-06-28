<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDTP Employment Survey</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

        * {
            font-family: 'Poppins';
        }

        body {
            background-color: #f8f9fa;
            margin-bottom: 60px;
            /* Add margin-bottom to avoid content overlap with footer */
        }

        /* Adjusted Navbar Styling */
        .navbar-brand {
            color: #fff;
            /* White text */
            font-weight: bold;
            margin-left: auto;
            /* Align to the center */
            margin-right: auto;
            /* Align to the center */
            text-align: center;
            /* Center the text */
            width: 100%;
            /* Full width */
        }

        /* Styling the Form */
        form {
            background-color: #fff;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }

        .row {
            text-align: center;
        }
        .text-right, .p {
            position: relative;
            left: -4rem;
            top: 5px;
            cursor: pointer;
            text-decoration: underline;
            color: blue;
            /* letter-spacing: 1px; */
        }

        .text-center, .p {
            display: flex;
           margin-left: 9rem;

            /* letter-spacing: 1px; */
        }

        /* Footer Styling */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #0d2237;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer img {
            height: 40px;
            margin-right: 10px;
            border-radius: 50%;
            border: none;

        }
        strong{
            color: red;
        }
        .form{
            margin-top: -1rem;
        }

    </style>
</head>

<body>
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            timer: 1000,
            showConfirmButton: false
        })
    </script>
    @endif
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">SDTP Alumni Employment Survey</span>
        </div>
    </nav>

    <!-- Form -->
    <form id="form" action="#" method="post" class="mt-6">
        <div class="row">
            <h1>Thank you!</h1>
            <p>Your Response is Also Submitted</p>
        </div>


    </form>






    <!-- Footer -->
    <div class="footer">
        <img src="data:image/png;base64,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" alt="Logo">
        <span>© 2024 <strong>SDTP</strong>. All rights reserved.</span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
