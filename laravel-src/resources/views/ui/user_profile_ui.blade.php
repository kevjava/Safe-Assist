<!DOCTYPE HTML>

<html>
	<head>
		<title>SafeAssist - Safety Through Information</title>
		@include('includes.head-content')
	</head>
	
	
	<body id="top">
		@include('includes.dialogs')
		@include('includes.header')
		@include('model.user', ['user' => Auth::user()])
	
				
		@include('includes.footer')

	</body>
</html>
