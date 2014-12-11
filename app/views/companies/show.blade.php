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
		<a class="navbar-brand" href="{{ URL::to('/') }}">Home</a>
	</div>
	
</nav>

<h1>Showing Companies</h1>
    {{ Form::model($company, array('action' => array('CompanyController@update', $company->id), 'method' => 'PUT')) }}
    
    <div class="checkbox">
        <label>
            {{$company->name}}
        </label>
    </div>
    <br>
    
    {{ Form::submit('Update Posts!', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
</body>
</html>