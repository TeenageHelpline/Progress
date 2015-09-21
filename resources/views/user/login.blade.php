@extends('layouts.nosidebar')

@section('title')
	Log in
@endsection

@section('content')

	{{ \Site::checkMessages($errors) }}

	<form role="form" action="<?php echo route('userLogin'); ?>" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label for="auth-username">E-mail:</label>
			<input type="email" value="{{ old('email') }}" placeholder="Your e-mail" id="auth-email" name="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="auto-password">Password:</label>
			<input type="password" id="auth-password" placeholder="Your password" name="password" class="form-control" />
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" name="remember"<?php echo (old('remember')=='yes'?' checked="checked"':'') ?> value="yes" /> Stay logged in?
			</label>
		</div>
		<div class="form-group text-right">
			<button class="btn btn-primary">Log in</button>
			<p>
				or <a href="<?php echo route('userSignup'); ?>" title="Sign up">Sign up</a>
			</p>
		</div>
	</form>

@endsection
