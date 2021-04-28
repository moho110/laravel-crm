<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>{{$hello}}</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/articles/vrml.css')}}">
	<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
</head>
<body>
<h1>{{$welcome}}</h1>
@foreach($cmfaccessbank as $cmfaccessbank)
编号：{{$cmfaccessbank->id}}<p>
创建人：{{$cmfaccessbank->createman}}<p>
创建时间：{{$cmfaccessbank->createtime}}<p>
@endforeach
</body>
</html>