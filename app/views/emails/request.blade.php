<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>RadioSNHU DJ Request</h2>

		<div>
			We just recieved a request to DJ an event!<br><hr>
			From: {{ $name }} (<a href="mailto:{{ $email }}">{{ $email }}</a>)<br>
			To: RadioSNHU (<a href="mailto:radiosnhu@snhu.edu">radiosnhu@snhu.edu</a>)<br>
			Subject: {{ $subject }}<br>
			Message:<br>
			{{ $msg }}
			<br>
			<hr>
			<br>
			That's it.
		</div>
	</body>
</html>
