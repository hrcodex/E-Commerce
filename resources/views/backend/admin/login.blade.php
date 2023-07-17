@extends('backend.master')

@section('body')
    <div class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Admin Login Panel</p>
          
                <form action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @if (session('error'))
                  <strong style="color: red;">  {{ session('error') }} </strong>
                  @endif
                 
                  <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                        <label for="remember">
                          Remember Me
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                
                <!-- /.social-auth-links -->
        
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
@endsection

@section('script')
  
<script>
  //  sweet alert -
  //  aita <a> tag e add kortte hove =/ onclick="confirmation(event)"
  
      function confirmation(ev){
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
        Swal.fire({
          title: 'You Want To Delete?',
          text: "Once Delete, This will be Permenently Delete!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Delete'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = urlToRedirect;
            Swal.fire(
                'Deleted',
                'Successfully',
                'success'
                     )
          }
        })
    }
  
  
  //  Tost Message -
  
  @if (Session::has('messege'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
          case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
          case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
          case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
          case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
        }
          
        @endif
  
    </script>
@endsection