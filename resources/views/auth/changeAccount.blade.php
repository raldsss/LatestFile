@extends('template.mains')
@section('title', 'User Account')

<style>
  .content{
        margin-left: -15rem;
    }
    h1{
        position: relative;
        left: -15rem;
    }

  @media (max-width: 768px) {
    h1 {
      text-align: left;
      margin-left: 20px;
    }
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
                <a class="btn btn-warning btn-sm" onclick="window.history.back();">
                    <i class="fa-solid fa-arrow-rotate-left"></i> Back
                </a>
              </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form class="needs-validation" novalidate action="{{ route('user.update', $user->id_user) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                      <div class="invalid-feedback">
                        Please provide a name.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                      <div class="invalid-feedback">
                        Please provide a valid email.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control">
                      <div class="invalid-feedback">
                        Please provide a password.
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control">
                      <div class="invalid-feedback">
                        Please confirm your password.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-success" type="submit">
                  <i class="fa-solid fa-floppy-disk"></i> Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
