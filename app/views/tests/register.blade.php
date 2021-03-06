@include('modules.header')
@include('modules.hud', ['title' => 'Register', 'icon' => 'edit', 'user_name' => 'John Smith'])
@include('modules.banner', ['title' => 'Register'])
<div class="box bg-1">
	<div class="box-2">
		@include('modules.section_divide', ['name' => 'Completed'])
		@include('modules.menu-1', ['items' => ['Your Information', 'Child Information', ['John', 'Jane']]])
		@include('modules.button-0', ['text' => 'Finish'])
	</div>
	<div class="box-4 bg-0">
		<div class="box box-pad-0 fg-1 border-0">Current</div>
		<div class="box box-pad-0">
			@foreach($fields as $field)
				@include('modules.input-0', $field)
			@endforeach
		</div>
		@include('modules.button-0', ['text' => 'OK'])
	</div>
</div>
