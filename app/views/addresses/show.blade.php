<!-- app/views/nerds/show.blade.php -->

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
		<a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('nerds') }}">View All Nerds</a></li>
		<li><a href="{{ URL::to('nerds/create') }}">Create a Nerd</a>
	</ul>
</nav>

<h1>Showing Posts</h1>
    {{ Form::model($addresses, array('action' => array('AddressController@update', $addresses->id), 'method' => 'PUT')) }}
    
    <div class="checkbox">
        <label>
            {{$addresses->id}}
        </label>
    </div>
    <br>
    
    {{ Form::submit('Update Posts!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
</body>
</html>