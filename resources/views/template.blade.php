<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RS Meet</title>

    {!! HTML::style('css/material.css') !!}
    {!! HTML::style('css/custom.css') !!}
    
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
	<div class="container">
		<ul class="breadcrumb larger" style="background-color: #f9f9f9;">
  			<li>{!! HTML::link('/', 'Home') !!}</li>
  			<li>{!! HTML::link('/search', 'Search Posts') !!}</li>
  			<li>{!! HTML::link('/post/create', 'Create a Post') !!}</li>
  			<li>{!! HTML::link('/about', 'About') !!}</li>
		</ul>

		@if(Session::has('message'))
			<div class="alert alert-dismissible alert-success">
  				<button type="button" class="close" data-dismiss="alert">×</button>
  				{{ Session::get('message') }}
			</div>
 		@endif

		@yield('content')
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>