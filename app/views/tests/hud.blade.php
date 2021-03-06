@extends('layouts.master')

@section('content')
@include('modules.header')
@include('modules.hud', ['title' => 'Home', 'icon' => 'home', 'user_name' => $user_name])
<div class="box box-banner-0 center img-0">
	<div class="type-0 bold fg-2 clear-under">Jumpstart a healthy lifestyle</div>
	<div class="type-2 fg-2 measure">Our programs <span class="fg-3">bring children together</span> to play and learn about the value of <span class="fg-3">staying&nbsp;active</span> and <span class="fg-3">living&nbsp;healthy</span></div>
</div>
<div class="box box-pad-0">
	<div class="box-3">
		<div class="box box-pad-0">
			<div class="type-1 center">New here?</div>
		</div>
		<div class="box box-pad-0">
			<div class="type-3 fg-1 measure">Our programs are offered in over 6 locations across Long Island, and are taught by skilled professionals.</div>
		</div>
		<div class="box box-pad-2 center">
			<div class="btn-1 type-3 bg-3 fg-2">Get Started</div>
		</div>
	</div>
	<div class="box-3 center border-left">
		<div class="box box-pad-0">
			<div class="type-1">Sign in</div>
		</div>
		<div class="box box-pad-1">
			<label class="label fg-1" for="email">E-mail</label>
			<input class="input smaller-measure type-3" type="text" name="email"/>
		</div>
		<div class="box box-pad-1">
			<label class="label fg-1" for="password">Password</label>
			<input class="input smaller-measure type-3" type="text" name="password"/>
		</div>
		@include('modules.button-0', ['text' => 'Sign in'])
	</div>
</div>