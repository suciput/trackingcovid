@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="login-box">
                            <div class="login-logo">
                                <a href="#"><b>Tracking Covid</b></a>
                            </div>
                            <!-- /.login-logo -->
                            <div class="card">
                                <div class="card-body login-card-body">
                                    <p class="login-box-msg">Sign in to start your session</p>
                    
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-8">
                                               
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>
                    
                    
                                    <!-- /.social-auth-links -->
                                </div>
                                <!-- /.login-card-body -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
