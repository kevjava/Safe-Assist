<section class="user_profile">
	<div class="username">{{$user->username}}</div>
	<div class="first_name">{{$user->first_name}}</div>
	<div class="last_name">{{$user->last_name}}</div>
	<div class="last_name">{{$user->last_name}}</div>
	<div class="email">{{$user->email}}</div>
	@include('ui.includes.address', ['address' => $user->address])
	
	@if (Auth::user()->administrator)
		<div class="admin-profile">
			<p>You have been granted administrator access to this site.</p>
		</div>
	@endif
	
	@if (Auth::user()->agent)
		<div class="agencies">
			<p>You are registered as a first responder for the following agencies:</p>
			@foreach ($user->agencies as $agency)
				@include('ui.includes.agency')
			@endforeach
		</div>
	@endif
</section>
