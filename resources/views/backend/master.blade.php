<!DOCTYPE html>
<html lang="en">
<head>
 
  @include('backend.include.meta')
  <title>@yield('title')</title>
  @include('backend.include.style')
  @yield('style')

</head>
  <body class="hold-transition sidebar-mini layout-fixed">
    @guest

    @else
  <div class="wrapper">
    {{-- @include('backend.include.preloader') --}}
    @include('backend.include.navbar')
    @include('backend.include.sidebar')
    @endguest
    @yield('body')
    @include('backend.include.footer')
  </div>


    @include('backend.include.script')
    @yield('script')


    	
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
