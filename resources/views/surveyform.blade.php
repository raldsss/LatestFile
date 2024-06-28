<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDTP Employment Survey</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        /* Adjusted Navbar Styling */
        .navbar-brand {
            color: #fff; /* White text */
            font-weight: bold;
            text-align: center; /* Center the text */
            width: 100%; /* Full width */
            letter-spacing: 2px;
        }

        /* Form styling */
        .form-group {
            margin-bottom: 1rem;
        }

        button[type="submit"] {
            width: 100%;
        }

        .button {
            text-decoration: none;
            line-height: 1;
            overflow: hidden;
            position: relative;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, .05);
            background-color: #fff;
            color: #121212;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            min-width: 200px;
        }

        .button-decor {
            position: absolute;
            inset: 0;
            background-color: var(--clr);
            transform: translateX(-100%);
            transition: transform .3s;
            z-index: 0;
        }

        .button-content {
            display: flex;
            align-items: center;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .button__icon {
            width: 58px;
            height: 50px;
            background-color: var(--clr);
            display: grid;

            font-size: 25px;
            place-items: center;
            color: #fefefe;
        }

        .button__text {
            display: inline-block;
            transition: color .2s;
            padding: 1px 1.5rem 2px;
            padding-left: .75rem;
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            max-width: 350px;
        }

        .button:hover .button__text {
            color: #fff;
        }

        .button:hover .button-decor {
            transform: translate(0);
        }

        /* Centering the card */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
            top: -10rem;

        }



        .row {
            width: 100%;
        }
        a{
            text-decoration: none;
            color: #000;
        }
        @media only screen and (max-width: 768px) {
  .navbar, .navbar-dark, .bg-primary{
    width: 100%;
    background: #0079ad;
  }
  body{
    width: 120vw;
  }
  .container{
    position: relative;
    /* left: -10px;  */
    top: -5rem;
  }
  .button__icon {
            font-size: 23px;

        }

        .button__text {

            font-size: 23px;

        }


}
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

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
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

    <div class="container mt-8">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <div class="btn" style="font-size: 20px;"><i class="fa-solid fa-arrow-rotate-left"></i>Welcome <span>{{ $alumni->firstName }}!</span></div><hr><br><br>

                            <button type="button" class="button" style="--clr: #0d6efd; min-width: 235px;">
                                <a href="{{ route('view', ['alumni_id' => $alumni->alumni_id]) }}">
                                    <span class="button-decor"></span>
                                    <div class="button-content">
                                        <div class="button__icon">
                                            <i class='bx bx-user-circle'></i>
                                        </div>
                                        <span class="button__text">View Information</span>
                                    </div>
                                </a>
                            </button>






                            <br><br>

                            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="--clr: #0d6efd;  min-width: 235px;">
                                <span class="button-decor"></span>
                                <div class="button-content">
                                    <div class="button__icon">
                                        <i class='bx bx-book-open'></i>
                                    </div>
                                    <span class="button__text">Answer Survey</span>
                                </div>
                            </button><br><br>

                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-center">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Employment Survey Form</h2>
                                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>

                                </div>
                                <div class="modal-body">
                                    <form id="form" action="{{ route('store', ['alumni' => $alumni->alumni_id]) }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="batchNumber" class="form-label">Batch Number</label>
                                                        <input type="number" id="batchNumber" name="batchNumber" class="form-control" value="{{ $alumni->batchNumber }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" id="name" name="name" class="form-control" value="{{ $alumni->firstName }}, {{ $alumni->lastName }} {{ $alumni->middleName }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="employment_status" class="form-label">Current employment status</label>
                                                        <select name="employment_status" id="employment_status" class="form-select" required>
                                                            <option value="">Select one</option>
                                                            <option value="Employed">Employed</option>
                                                            <option value="Unemployed">Unemployed</option>
                                                            <option value="With Job Offer">With Job Offer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="additional-fields" style="display: none;">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="company_name" class="form-label">Company name</label>
                                                            <input type="text" id="company_name" name="company_name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="job_title" class="form-label">Job Title</label>
                                                            <input type="text" id="job_title" name="job_title" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="location" class="form-label">Location</label>
                                                            <input type="text" id="location" name="location" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="remarks" class="form-label">Remarks</label>
                                                            <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit"  class="btn btn-primary">Submit</button>
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

    <div class="footer">
        <img src="data:image/png;base64,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" alt="Logo">
        <span>© 2024 <strong>SDTP</strong>. All rights reserved.</span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleFields() {
            var employmentStatus = document.getElementById("employment_status").value;
            var additionalFields = document.getElementById("additional-fields");

            if (employmentStatus === "Employed" || employmentStatus === "With Job Offer") {
                additionalFields.style.display = "block";
            } else {
                additionalFields.style.display = "none";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("employment_status").addEventListener("change", toggleFields);
            toggleFields();
        });
    </script>



{{-- <script>
    function getLastSubmissionDate() {
        var storedDate = localStorage.getItem('lastSubmissionDate');
        return storedDate ? new Date(storedDate) : new Date(0);
    }


    function setLastSubmissionDate(date) {
        localStorage.setItem('lastSubmissionDate', date.toISOString());
    }

    function checkSubmitButtonStatus() {
        var lastSubmissionDate = getLastSubmissionDate();
        var now = new Date();
        var oneMonthAgo = new Date(lastSubmissionDate);
        oneMonthAgo.setMonth(oneMonthAgo.getMonth() + 1);

        if (now < oneMonthAgo) {
            document.getElementById('submitBtn').setAttribute('disabled', 'disabled');
        } else {
            document.getElementById('submitBtn').removeAttribute('disabled');
        }
    }

    checkSubmitButtonStatus();


    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();

        var now = new Date();
        setLastSubmissionDate(now);
        checkSubmitButtonStatus();

        alert('Form submitted successfully!');
    });
</script> --}}
</body>

</html>

