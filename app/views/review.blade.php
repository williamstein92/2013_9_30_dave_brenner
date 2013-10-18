@extends('layouts.master')

@section('content')
@include('modules.header')
@include('modules.hud', ['title' => 'Review Your Order', 'icon' => 'eye-open', 'user_name' => $user_name])
@include('modules.banner', ['title' => 'Review Your Order'])
<div class="box bg-1">
	<div class="box-2">
		@include('modules.section_divide', ['name' => 'Please select which child you are signing up for each lesson.'])
		<div class="box box-pad-0">Or, go back and choose different classes:</div>
		<a href="{{ $enroll }}">@include('modules.button-0', ['text' => 'Class Selection'])</a>
	</div>
	<div class="box-4 bg-0 border-left">
		@include('modules.section_divide', ['name' => 'Orders'])
		{{ Form::open(['url' => $pay]) }}
		@foreach ($classes as $class)
		@include('modules.lesson-1', $class)
		@endforeach
		<div class="box box-pad-0 bg-1"><div class="float-left margin-0"><input class="input type-3" type="checkbox" name="terms_of_agreement" @if (Session::has('_old_input') && isset(Session::get('_old_input')['terms_of_agreement'])) checked@endif/></div><div class="float-left">I agree to the <a href="{{ $terms_of_service }}">Terms and Conditions</a></div></div>
		@if ($errors->first('terms_of_agreement'))
		<div class="box box-pad-3 fg-4 bg-1 terms-of-agreement-errors visible-toggle visible">
		@else
		<div class="box box-pad-3 fg-4 bg-1 terms-of-agreement-errors visible-toggle invisible">
		@endif
			<p>{{ $errors->first('terms_of_agreement') }}</p>
		</div>
		<div class="box box-pad-0 bg-1"><div class="box-pad-5 float-left"><span class="bold">Total:</span> ${{ $total_price }}</div><div class="float-right"><button type="submit" class="btn-0 bg-4 fg-2">Finish &amp; Pay</button></div></div>
		{{ Form::close() }}
	</div>
	<div class="box box-pad-0 bg-0">{{ $links }}</div>
</div>
@stop