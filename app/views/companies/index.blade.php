<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding Many TO Many RELATIONS</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
	</div>
	
</nav>
    <div>
        <h1>All the Companies(<a href="{{ URL::to('companies/create') }}">Create a Company</a>)</h1>
    </div>


<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td></td>
			<td></td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($companies as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
                        <td>{{ $value->vatId }}</td>
                        <td></td>

			<!-- we will also add show, edit, and delete buttons -->
			<td width="350">

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'tags/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Tag', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('companies/' . $value->id) }}">Show Company</a>

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('tags/' . $value->id . '/edit') }}">Edit Tag</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>

</div>
</body>
</html>