<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>this is for testing purpose</title>
</head>
<body>

@foreach ($tests as $test)
    <p>{{$test->name}};</p>
    <p>{{$test->address}};</p>
@endforeach

</body>
</html>