<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDTP Employment Survey</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    <style>
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

     
        .navbar-brand {
            color: #fff;
            font-weight: bold;
            text-align: center;
            width: 100%;
            letter-spacing: 2px;
        }


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
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .button__icon {
            width: 48px;
            height: 40px;
            background-color: var(--clr);
            display: grid;
            place-items: center;
            color: #fefefe;
        }

        .button__text {
            display: inline-block;
            transition: color .2s;
            padding: 2px 1.5rem 2px;
            padding-left: .75rem;
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

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .row {
            width: 100%;
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
            left: -10px;
            top: -5rem;
        }
        }
        span{
            font-size: 23px;
            text-align: center;
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


    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div>

                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                   <span>View and Update Your Data</span>
                                </div>
                            </div>
                            <form class="needs-validation" action="{{ route('updatealumni', ['alumni_id' => $alumni->alumni_id]) }}" method="POST">
                                @csrf
                                @method('PUT')

    <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
                <label for="name">Firstname</label>
                <input type="text" name="firstName" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name Alumni" value="{{old('firstName', $alumni->firstName)}}" required>
                @error('name')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="middleName">Middlename</label>
                <input type="text" name="middleName" class="form-control @error('middleName') is-invalid @enderror" id="middleName" placeholder="middleName" value="{{old('middleName', $alumni->middleName)}}" required>
                @error('middleName')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="lastName">Lastname</label>
                <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="lastName" value="{{old('lastName', $alumni->lastName)}}" required>
                @error('lastName')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="streetAddress">StreetAddress</label>
                <input type="text" min="1" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" id="streetAddress" placeholder="streetAddress" value="{{old('streetAddress', $alumni->streetAddress)}}" required>
                @error('streetAddress')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="province">Barangay</label>
                <input type="text" name="barangay" class="form-control @error('barangay') is-invalid @enderror" id="barangay" placeholder="barangay" value="{{old('barangay', $alumni->barangay)}}" required>
                @error('barangay')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="city">City/Municipality:</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="city" value="{{old('city', $alumni->city)}}" required>
                @error('city')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="district" value="{{old('district', $alumni->district)}}" required>
                @error('district')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror

            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="province">Province</label>
                <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" id="province" placeholder="province" value="{{old('province', $alumni->province)}}" readonly required>
                @error('province')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" name="region" class="form-control @error('region') is-invalid @enderror" id="region" placeholder="region" value="{{old('region', $alumni->region)}}" required>
                @error('region')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" onchange="calculateAge()" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" placeholder="birthdate" value="{{old('birthdate', $alumni->birthdate)}}" required>
                @error('birthdate')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" readonly name="age" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="age" value="{{old('age', $alumni->age)}}" required>
                @error('age')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="sex">Sex</label>
                <select id="city" name="sex" class="form-control required">
                    <option value="">--Select--</option>
                    <option value="Male" {{ $alumni->sex == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $alumni->sex == 'Female' ? 'selected' : '' }}>Female</option>

                </select>
                @error('sex')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" id="nationality" placeholder="nationality" value="{{old('nationality', $alumni->nationality)}}" required>
                @error('nationality')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="civil_status">Civil Status</label>
                <select id="civil_status" name="civil_status" class="form-control required">
                    <option value="">--Select--</option>
                    <option value="Single" {{ $alumni->civil_status == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ $alumni->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                    <option value="Divorced" {{ $alumni->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                    <option value="Widowed" {{ $alumni->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                </select>
                @error('civil_status')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{old('email', $alumni->email)}}" required>
                @error('email')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="batchNumber">BatchNumber</label>
                <input type="number" readonly name="batchNumber" class="form-control @error('batchNumber') is-invalid @enderror" id="batchNumber" placeholder="batchNumber" value="{{old('batchNumber', $alumni->batchNumber)}}" required>
                @error('batchNumber')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="training_status">Training Status</label>
                <input type="text" readonly name="training_status" class="form-control @error('training_status') is-invalid @enderror" id="training_status" placeholder="training_status" value="{{old('training_status', $alumni->training_status)}}" required>
                @error('training_status')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label for="scholarship">Scholarship</label>
                <input type="text" name="scholarship" class="form-control @error('scholarship') is-invalid @enderror" id="scholarship" placeholder="scholarship" value="{{old('scholarship', $alumni->scholarship)}}" readonly required>
                @error('scholarship')
                <span class="invalid-feedback text-danger">{{ $message }}</span>
                @enderror
            </div>
          </div>


        </div>
      </div>

                                <div class="card-footer text-right">

                                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                        Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function calculateAge() {
        var birthdate = document.getElementById("birthdate").value;
        if (birthdate) {
            var today = new Date();
            var birthDate = new Date(birthdate);
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDifference = today.getMonth() - birthDate.getMonth();

            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            document.getElementById("age").value = age;
        }
    }
</script>

</body>

</html>
