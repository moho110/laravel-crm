<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
	<title>{{$hello}}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/articles/vrml.css')}}">
</head>
<body>
<h1>{{$welcome}}</h1>
<div class="container">
	<table border="0" weight="100%">
@foreach($cmfaccessbanks as $cmfaccessbank)
<tr align="center">
	<td>{{$cmfaccessbank->id}}.</td>
	<td><a href="detail/{{$cmfaccessbank->id}}" target="_blank">{{$cmfaccessbank->createman}}</a></td>
</tr>
@endforeach
</table>
</div>
{{ $cmfaccessbanks->links() }}
</body>
</html>