@extends('template.mains')
@section('title', 'Edit Employmentdata')


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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/employmentdata" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
        <form class="needs-validation" novalidate action="/employmentdata/{{ $employmentdata->emp_id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">
            <divc lass="row">
            <div class="col-lg-6">
            <div class="form-group">
            <label for="batchNumber">firstname</label>
            <input type="number" name="batchNumber" class="form-control @error('batchNumber') is-invalid @enderror" id="batchNumber" placeholder="Name Alumni" value="{{old('batchNumber', $employmentdata->batchNumber)}}" required>
            @error('batchNumber')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{old('name', $employmentdata->name)}}" required>
            @error('name')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="employment_status">employment_status</label>
            <input type="text" name="employment_status" class="form-control @error('employment_status') is-invalid @enderror" id="employment_status" placeholder="employment_status" value="{{old('employment_status', $employmentdata->employment_status)}}" required>
            @error('employment_status')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="company_name">company_name</label>
            <input type="text" min="1" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name"  value="{{old('company_name', $employmentdata->company_name)}}" required>
            @error('company_name')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="job_title">job_title</label>
            <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror" id="job_title"  value="{{old('job_title', $employmentdata->job_title)}}" required>
            @error('job_title')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="location">location:</label>
            <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location"  value="{{old('location', $employmentdata->location)}}" required>
            @error('location')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label for="remarks">remarks</label>
            <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" id="remarks"  value="{{old('remarks', $employmentdata->remarks)}}" required>
            @error('remarks')
            <span class="invalid-feedback text-danger">{{ $message }}</span>
            @enderror

        </div>
      </div>
    </divc>
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


@endsection

