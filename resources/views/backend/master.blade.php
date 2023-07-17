<!DOCTYPE html>
<html lang="en">
<head>

  {{-- meta Tags --}}
  @include('backend.include.meta')

  {{-- title --}}
  <title>AdminLTE 3 | Dashboard 2</title>

  {{-- styles css --}}
  @include('backend.include.style')

</head>
<body>
  <div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
 @guest

 @else
 <!--wrapper start-->
<div class="wrapper">
  <!-- Preloader -->
  @include('backend.include.preloader')
  {{-- top navbar --}}
  @include('backend.include.navbar')
  {{-- sidebar menu --}}
  @include('backend.include.sidebar')
  @endguest
  <!-- Content-->
   @yield('body')
  <!--Footer -->
  @include('backend.include.footer')
</div>
</div>
<!--wrapper Ends-->

<!--SCRIPTS -->
@include('backend.include.script')

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





</body>
</html>
