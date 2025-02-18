@include('includes.errors')
@if (!Auth::check()) @include('includes.dialogs.login') @endif
@if (!Auth::check()) @include('includes.dialogs.register') @endif
<header id="header" class="skel-layers-fixed">
	<a href="/" target="_top"><img src="/images/safe-assist-banner.jpg" title="Safe Assist Logo" alt="Safe Assist Logo" /></a>
	<nav id="nav">
		<ul>
			<li><a href="/">Home</a> </li>
			<li><a href="/about">About</a></li>
			<li><a href="/contact">Contact</a></li>
			<li><a href="/partners">Partners</a></li>
			@if (Auth::check()) 
				<li><a class="ui-link" href="/profile">Profile</a></li>
				<li><a class="ui-link" href="/caregiver">Caregiver</a></li>
				@if (Auth::user()->administrator)
					<li><a class="ui-link" href="/admin">Admin</a></li>
				@endif
				@if (Auth::user()->agent)
					<li><a class="ui-link" href="/agent">First Responder</a></li>
				@endif
				<li><a id="logout_button" href="/auth/logout" class="button special">Logout</a></li>
			@else 
				<li><a id="enroll_button" class="button special triggersDialog" data-dialog="registerDialog">Enroll</a></li>
				<li><a id="login_button" class="button special triggersDialog" data-dialog="loginDialog">Sign In</a></li>
			@endif	
		</ul>
	</nav>
</header>
