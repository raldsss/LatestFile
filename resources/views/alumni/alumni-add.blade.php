@extends('template.mains')
@section('title', 'Add Alumni')

<style>
    .content{
        margin-left: -15rem;
    }
    h1{
        position: relative;
        left: -15rem;
    }
    .error-message {
            color: red;
            display: none;
        }
</style>
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
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
              <div class="text-right">
                <a class="btn btn-warning btn-sm" onclick="window.history.back();">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Back
                </a>
              </div>
            </div>
            <form class="needs-validation" novalidate action="/alumni" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="firstName">FirstName</label>
                      <label for="firstName">First Name:</label>
                      <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" id="firstName" placeholder="FirstName" value="{{ old('firstName') }}" pattern="[A-Za-z]+" title="Please enter letters only." required>
                      @error('firstName')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                      <span class="error-message" id="firstName-error">Please enter letters only.</span>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="middleName">MiddleName</label>
                      <input type="text" name="middleName" class="form-control @error('middleName') is-invalid @enderror" id="middleName" placeholder="Middle Name" value="{{ old('middleName') }}" pattern="[A-Za-z]+" title="Please enter letters only." required>
                      @error('middleName')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                      <span class="error-message" id="middleName-error">Please enter letters only.</span>


                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="lastName">LastName</label>
                      <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" id="lastName" placeholder="Last Name" value="{{ old('lastName') }}" pattern="[A-Za-z]+" title="Please enter letters only." required>
                      @error('lastName')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                      <span class="error-message" id="lastName-error">Please enter letters only.</span>

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="streetAddress">Street Address</label>
                      <input type="text" name="streetAddress" class="form-control @error('streetAddress') is-invalid @enderror" id="streetAddress" placeholder="Street Address" value="{{old('streetAddress')}}" required>
                      @error('streetAddress')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="catbarangayegory">Barangay</label>
                      <input type="text" name="barangay" class="form-control @error('barangay') is-invalid @enderror" id="barangay" placeholder="Barangay" value="{{old('barangay')}}" required>
                      @error('barangay')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="city/municipality">City/Municipality:</label><br>
                        <select class="form-control" id="city" name="city" value="{{old('city')}}" required>
                        <option value="">--Select--</option>
                        <option value="Binalbagan">Binalbagan</option>
                        <option value="Bago City">Bago City</option>
                        <option value="Cadiz City">Cadiz City</option>
                        <option value="Calatrava">Calatrava</option>
                        <option value="Candoni">Candoni</option>
                        <option value="Cauyan">Cauyan</option>
                        <option value="Don Salvador Benedicto">Don Salvador Benedicto</option>
                        <option value="Enrique B. Magalona">Enrique B. Magalona</option>
                        <option value="Escalante City">Escalante City</option>
                        <option value="Himamaylan City">Himamaylan City</option>
                        <option value="Hinigaran">Hinigaran</option>
                        <option value="Hinoba-an">Hinoba-an</option>
                        <option value="Ilog">Ilog</option>
                        <option value="Isabela">Isabela</option>
                        <option value="Kabankalan">Kabankalan City</option>
                        <option value="la Carlota City">La Carlota City</option>
                        <option value="La Castellana">La Castellana</option>
                        <option value="Manapla">Manapla</option>
                        <option value="Moisis Padilla">Moisis Padilla</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Pontevedra">Pontevedra</option>
                        <option value="Pulupandan">Pulupandan</option>
                        <option value="Sagay">Sagay City</option>
                        <option value="San Carlos City">San Carlos City</option>
                        <option value="San Enrique">San Enrique</option>
                        <option value="Silay City">Silay City</option>
                        <option value="Sipalay">Sipalay</option>
                        <option value="Talisay">Talisay</option>
                        <option value="Toboso">Toboso</option>
                        <option value="Valladolid">Valladolid</option>
                        <option value="Victorias City">Victorias City</option>
                    </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="district">District:</label><br>
                        <input type="text" id="district" name="district" class="form-control" readonly >
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="province">Province</label>
                      <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" id="province" placeholder="Province" value="{{ old('province', 'Negros Occidendal') }}" readonly required>
                      @error('province')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="region">Region</label>
                      <input type="text" name="region" class="form-control @error('region') is-invalid @enderror" id="region" placeholder="Region" value="{{ old('region', 'VI') }}" readonly required>
                      @error('region')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="birthdate">Birthdate</label>
                      <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" onchange="calculateAge()" value="{{old('birthdate')}}" required>
                      @error('birthdate')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="age">Age</label>
                      <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age" placeholder='auto fill when "Birthdate" was selected' value="{{old('age')}}" required readonly>
                      @error('age')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" id="sex" name="sex" required>
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
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
                      <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" id="nationality" placeholder="Nationality" value="{{ old('nationality', 'Filipino') }}" readonly  required>
                      @error('nationality')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="civil_status">Civil Status</label>
                      <select class="form-control" id="civil_status" name="civil_status" required>
                        <option value="">--Select--</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
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
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{old('email')}}" required>
                      @error('email')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="batchNumber">BatchNumber</label>
                      <input type="number" name="batchNumber" class="form-control @error('batchNumber') is-invalid @enderror" id="batchNumber" placeholder="Batch Number" value="{{old('batchNumber')}}" required>
                      @error('batchNumber')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="training_status">Training Status:</label><br>
                        <select class="form-control" id="training_status" name="training_status" required>
                            <option value="">--Select--</option>
                            <option value="Still Training">Still Training</option>
                            <option value="Alumni">Alumni</option>
                            <option value="Employed">Employed</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="scholarship">Scholarship</label>
                      <input type="text" name="scholarship" class="form-control @error('scholarship') is-invalid @enderror" id="scholarship" placeholder="scholarship" value="{{ old('scholarship', 'NFTWSP') }}" readonly required>                      @error('scholarship')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>


                </div>
              </div>
              <div class="card-footer text-center">

                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                  Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
                    function updateDistrict() {

                var city = document.getElementById('city').value;

                var district = document.getElementById('district');

                var districtValue = '';



                if (['Calatrava', 'Don Salvador Benedicto', 'Escalante City', 'San Carlos City', 'Toboso'].includes(city)) {

                districtValue = 'District 1';

                } else if (['Cadiz City', 'Manapla', 'Sagay City'].includes(city)) {

                districtValue = 'District 2';

                } else if (['Murcia', 'Silay City', 'Talisay City', 'Victorias City'].includes(city)) {

                districtValue = 'District 3';

                } else if (['Bago City', 'La Carlota City', 'Pontevedra', 'Pulupandan', 'San Enrique', 'Valladolid'].includes(city)) {

                districtValue = 'District 4';

                } else if (['Binalbagan', 'Himamaylan City', 'Hinigaran', 'La Castellana', 'Moises Padilla'].includes(city)) {

                districtValue = 'District 5';

                } else {

                districtValue = 'District 6';

                }



                district.value = districtValue;

                }



                document.addEventListener('DOMContentLoaded', function() {

                document.getElementById('city').addEventListener('change', updateDistrict);

                });


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

                document.querySelectorAll('input[pattern]').forEach(input => {
            input.addEventListener('input', function () {
                var errorMessage = document.getElementById(this.id + '-error');
                if (this.value.match(/[^A-Za-z]/)) {
                    errorMessage.style.display = 'inline';
                    this.classList.add('is-invalid');
                } else {
                    errorMessage.style.display = 'none';
                    this.classList.remove('is-invalid');
                }
            });
        });





</script>
@endsection
