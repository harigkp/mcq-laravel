<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content=" - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Machine Test</title>
		
        @include('frontlayout.partials.head')

  </head>
  <body>
  
    @include('frontlayout.partials.header')


	  <!-- Content -->
	  @yield('content')	  
	  <!-- /Content -->
	  
  <!-- Footer -->
    
  <!-- /Footer --> 	  
	</div> 
	</div> 
</main>


<!-- footer script -->
@include('frontlayout.partials.footerscript')
<!-- /footer script -->

 </body>
</html>