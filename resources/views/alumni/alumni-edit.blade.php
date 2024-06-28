@extends('template.mains')
@section('title', 'Edit alumni')


<style>
    .content{
        margin-left: -15rem;
    }
    h1{
        position: relative;
        left: -15rem;
    }
</style>


@section('content')

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
                            <div class="text-right">
                                <a class="btn btn-warning btn-sm" onclick="window.history.back();">
                                    <i class="fa-solid fa-arrow-rotate-left"></i> Back
                                </a>
                            </div>
                        </div>
                        <form class="needs-validation" novalidate action="/alumni/{{ $alumni->alumni_id }}" method="POST">
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
            <input type="text" name="middleName" class="form-control @error('middleName') is-invalid @enderror" id="middleName" placeholder="middleName" value="{{old('middleName', $alumni->middleName)}}"  required>
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
            <select id="city" name="city" class="form-control required">
                <option value="">--Select--</option>
                <option value="Bago City" {{ $alumni->city == 'Bago City' ? 'selected' : '' }}>Bago City</option>
                <option value="Binalbagan" {{ $alumni->city == 'Binalbagan' ? 'selected' : '' }}>Binalbagan</option>
                <option value="Cadiz City" {{ $alumni->city == 'Cadiz City' ? 'selected' : '' }}>Cadiz City</option>
                <option value="Calatrava" {{ $alumni->city == 'Calatrava' ? 'selected' : '' }}>Calatrava</option>
                <option value="Candoni" {{ $alumni->city == 'Candoni' ? 'selected' : '' }}>Candoni</option>
                <option value="Cauyan" {{ $alumni->city == 'Cauyan' ? 'selected' : '' }}>Cauyan</option>
                <option value="Don Salvador Benedicto" {{ $alumni->city == 'Don Salvador Benedicto' ? 'selected' : '' }}>Don Salvador Benedicto</option>
                <option value="Enrique B. Magalona" {{ $alumni->city == 'Enrique B. Magalona' ? 'selected' : '' }}>Enrique B. Magalona</option>
                <option value="Escalante City" {{ $alumni->city == 'Escalante City' ? 'selected' : '' }}>Escalante City</option>
                <option value="Himamaylan City" {{ $alumni->city == 'Himamaylan City' ? 'selected' : '' }}>Himamaylan City</option>
                <option value="Hinigaran" {{ $alumni->city == 'Hinigaran' ? 'selected' : '' }}>Hinigaran</option>
                <option value="Hinoba-an" {{ $alumni->city == 'Hinoba-an' ? 'selected' : '' }}>Hinoba-an</option>
                <option value="Ilog" {{ $alumni->city == 'Ilog' ? 'selected' : '' }}>Ilog</option>
                <option value="Isabela" {{ $alumni->city == 'Isabela' ? 'selected' : '' }}>Isabela</option>
                <option value="Kabankalan" {{ $alumni->city == 'Kabankalan' ? 'selected' : '' }}>Kabankalan City</option>
                <option value="La Carlota City" {{ $alumni->city == 'La Carlota City' ? 'selected' : '' }}>La Carlota City</option>
                <option value="La Castellana" {{ $alumni->city == 'La Castellana' ? 'selected' : '' }}>La Castellana</option>
                <option value="Manapla" {{ $alumni->city == 'Manapla' ? 'selected' : '' }}>Manapla</option>
                <option value="Moises Padilla" {{ $alumni->city == 'Moises Padilla' ? 'selected' : '' }}>Moises Padilla</option>
                <option value="Murcia" {{ $alumni->city == 'Murcia' ? 'selected' : '' }}>Murcia</option>
                <option value="Pontevedra" {{ $alumni->city == 'Pontevedra' ? 'selected' : '' }}>Pontevedra</option>
                <option value="Pulupandan" {{ $alumni->city == 'Pulupandan' ? 'selected' : '' }}>Pulupandan</option>
                <option value="Sagay City" {{ $alumni->city == 'Sagay City' ? 'selected' : '' }}>Sagay City</option>
                <option value="San Carlos City" {{ $alumni->city == 'San Carlos City' ? 'selected' : '' }}>San Carlos City</option>
                <option value="San Enrique" {{ $alumni->city == 'San Enrique' ? 'selected' : '' }}>San Enrique</option>
                <option value="Silay City" {{ $alumni->city == 'Silay City' ? 'selected' : '' }}>Silay City</option>
                <option value="Sipalay" {{ $alumni->city == 'Sipalay' ? 'selected' : '' }}>Sipalay</option>
                <option value="Talisay" {{ $alumni->city == 'Talisay' ? 'selected' : '' }}>Talisay</option>
                <option value="Toboso" {{ $alumni->city == 'Toboso' ? 'selected' : '' }}>Toboso</option>
                <option value="Valladolid" {{ $alumni->city == 'Valladolid' ? 'selected' : '' }}>Valladolid</option>
                <option value="Victorias City" {{ $alumni->city == 'Victorias City' ? 'selected' : '' }}>Victorias City</option>
            </select>
            @error('city')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

      <div class="col-lg-6">
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" id="district" placeholder="district" value="{{old('district', $alumni->district)}}" readonly required>
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
            <input type="text" name="region" class="form-control @error('region') is-invalid @enderror" id="region" placeholder="region" value="{{old('region', $alumni->region)}}" readonly required>
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
            <input type="number" name="age" class="form-control @error('age') is-invalid @enderror" id="age" placeholder="age" value="{{old('age', $alumni->age)}}" readonly required>
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
            <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" id="nationality" placeholder="nationality" value="{{old('nationality', $alumni->nationality)}}" readonly required>
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
            <input type="number" name="batchNumber" class="form-control @error('batchNumber') is-invalid @enderror" id="batchNumber" placeholder="batchNumber" value="{{old('batchNumber', $alumni->batchNumber)}}" required>
            @error('batchNumber')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="training_status">Training Status</label>
            <select id="city" name="training_status" class="form-control required">
                <option value="">--Select--</option>
                <option value="Still Training" {{ $alumni->training_status == 'Still Training' ? 'selected' : '' }}>Still Training</option>
                <option value="Alumni" {{ $alumni->training_status == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                <option value="Employed" {{ $alumni->training_status == 'Employed' ? 'selected' : '' }}>Employed</option>
            </select>
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
                                {{-- <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                                    Reset</button> --}}
                                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                                    Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.content -->
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

            // Adjust age if birth month hasn't occurred yet this year
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            document.getElementById("age").value = age;
        }
    }

    function addDot(input) {
    if (input.value.length === 1 && /^[A-Za-z]$/.test(input.value)) {
        input.value += '.';
    }
}
</script>

@endsection


