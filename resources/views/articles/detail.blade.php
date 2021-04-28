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
	<tr align="left">
		<td>编号：</td>
		<td>{{$cmfaccessbanks->id}}</td>
	</tr>
	<tr align="left">
		<td>创建人：</td>
		<td>{{$cmfaccessbanks->createman}}</td>
	</tr>
	<tr align="left">
		<td>创建时间：</td>
		<td>{{$cmfaccessbanks->createtime}}</td>
	</tr>
	<tr align="left">
		<td>过往金额：</td>
		<td>{{$cmfaccessbanks->oldjine}}</td>
	</tr>
	<tr align="left">
		<td>金额：</td>
		<td>{{$cmfaccessbanks->jine}}</td>
	</tr>
</table>
</div>
</body>
</html>