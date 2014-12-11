<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
	</div>
	
</nav>

<h1>Create a Company</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'companies')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('vatId', 'VatId') }}
		{{ Form::email('vatId', Input::old('vatId'), array('class' => 'form-control')) }}
	</div>

	

	{{ Form::submit('Create!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>