<!DOCTYPE html>
<html lang="en">
<head>
	{{-- meta --}}
	@include('frontend.include.meta')

	{{-- title --}}
	<title>@yield('title')</title>

	{{-- style --}}
	@include('frontend.include.style')
</head>
<body>

	<div class="backdrop"></div>
	<a class="backtop fas fa-arrow-up" href="#"></a>

	{{-- header Top --}}
	@include('frontend.include.header_top')

	{{-- header --}}
	@include('frontend.include.header')

	{{-- navbar --}}
	@include('frontend.include.navbar')
	
	{{-- Categorys in a Mobile View --}}
	@include('frontend.include.categories')

	{{-- Cart Model --}}
	@include('frontend.include.cart_model')

	{{-- Mobile Navbar --}}
	@include('frontend.include.mobile_navbar')

	{{-- product Model --}}
	@include('frontend.include.product_model')	

	{{-- Content --}}
	@yield('body')

	{{-- footer --}}
	@include('frontend.include.footer')

	{{-- script --}}
	@include('frontend.include.script')

</body>
</html>