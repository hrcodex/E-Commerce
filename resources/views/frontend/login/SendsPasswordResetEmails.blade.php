@extends('frontend.master')

@section('title')
   Reset Password
@endsection

@section('body')

<section class="user-form-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            
                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>worried?</h2>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>
                    <form class="user-form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-button">
                            <button type="submit">get reset link</button>
                        </div>
                    </form>
                </div>
                <div class="user-form-remind">
                    <p>Go Back To<a href="{{ route('login') }}">login here</a></p>
                </div>
                <div class="user-form-footer">
                    <p>Greeny | &COPY; Copyright by <a href="#">Mironcoder</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection