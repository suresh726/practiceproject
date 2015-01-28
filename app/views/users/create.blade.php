<section class="content-header">
	<h1> Dashboard <small>Control panel</small></h1>
	<ol class="breadcrumb">
		<li>
			<a href="#"><i class="fa fa-dashboard"></i> Home</a>
		</li>
		<li class="active">
			Users
		</li>

	</ol>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3 class="box-title">Add new User</h3>
		</div><!-- /.box-header -->
		<!-- form start -->
		{{ Form::open(array('route' => 'admin.store')) }}
		<!-- Form body starts -->
		
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					@foreach($form_fields as $key => $value)

					@if($value['group'] == 1)

					<div class="form-group">

						@if($value['type'] == "text")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<input name = {{$value['column']}} type="text" class="form-control" />
						@elseif($value['type'] == "select")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<select class="form-control" name={{$value['column']}}>
							@foreach($value['options'] as $option_value=>$option_text)
							<option value={{$option_value}}>{{$option_text}}</option>
							@endforeach
						</select>
						@elseif($value['type']=="password")
							<label for={{$value['column']}}>{{$value['label']}}</label>
							<input type="password" name={{$value['column']}} class="form-control"/>
						@endif
					</div>

					@endif
					@endforeach
				</div>
				<div class="col-md-6">
					@foreach($form_fields as $key => $value)
					@if($value['group'] == 2)

					<div class="form-group">

						@if($value['type'] == "text")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<input name={{$value['column']}} type="text" class="form-control"/>
						@elseif($value['type'] == "select")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<select class="form-control" name={{$value['column']}}>
							@foreach($value['options'] as $option_value=>$option_text)
							<option value={{$option_value}}>{{$option_text}}</option>
							@endforeach
						</select>
						@elseif($value['type']=="password")
							<label for={{$value['column']}}>{{$value['label']}}</label>
							<input type="password" name={{$value['column']}} class="form-control"/>
						@endif
					</div>

					@endif
					@endforeach
				</div>
				<div class="col-md-12">
					@foreach($form_fields as $key => $value)
					@if($value['group'] == 3)

					<div class="form-group">

						@if($value['type'] == "text")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<input name={{$value['column']}} type="text" class="form-control"/>
						@elseif($value['type'] == "select")
						<label for={{$value['column']}}>{{$value['label']}}</label>
						<select class="form-control" name={{$value['column']}}>
							@foreach($value['options'] as $option_value=>$option_text)
							<option value={{$option_value}}>{{$option_text}}</option>
							@endforeach
						</select>
						@elseif($value['type']=="password")
							<label for={{$value['column']}}>{{$value['label']}}</label>
							<input type="password" name={{$value['column']}} class="form-control"/>
						@endif
					</div>
					@endif
					@endforeach
				</div>
			</div>
			<!-- Form body ends -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">
					Save
				</button>
				<a class="btn btn-warning btn-sm" href="{{ Request::root() }}/admin">Cancel</a>
			</div>

			{{ Form::close() }}
		</div>

</section>

