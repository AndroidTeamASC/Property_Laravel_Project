@extends('layouts/app')
  @section('content')
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            {{-- <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
              <div class="text-center">
                <a href="#" class="btn btn-neutral btn-icon mr-4">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div> --}}
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign up with credentials</small>
              </div>
              <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group align-items-center">
                  <div class="col-auto">
                    <label class="sr-only" for="name">Name</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text text-blue"><i class="far fa-user"></i></i></div>
                      </div>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-auto">
                    <label class="sr-only" for="email">Email</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text text-blue"><i class="fas fa-envelope-square"></i></div>
                      </div>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-auto">
                    <label class="sr-only" for="password">Password</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text text-blue"><i class="fas fa-lock"></i></div>
                      </div>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                  </div>
                  <div class="col-auto">
                    <label class="sr-only" for="password-confirm">Comfirm Password</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text text-blue"><i class="fas fa-lock"></i></div>
                      </div>
                      <input type="password" class="form-control" id="password-confirm" placeholder="Comfirm Password" name="password_confirmation">
                    </div>
                  </div>
                </div>
                <div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4" value="Create account">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection