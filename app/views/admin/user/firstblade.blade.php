<section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
						
                    </ol>
                </section>
	<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Users</h3>
<a href="{{Request::root()}}/users/create" class="pull-right btn btn-info top-add-new" ><i class="fa fa-plus-circle"></i> Add new User</a>			
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table class="table table-bordered">
				<tr>
					<th>SN</th>
					@foreach($header_of_tables as $key=>$value)
					<th>{{$value}}</th>
					@endforeach
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php $k = 1; ?>
				@foreach($users as $userdata)
				<tr>
					<th><?php echo $k;
					$k++;
				?></th>
					
					@foreach(array_keys($header_of_tables) as $key)
						@if($key == "is_active" )
							@if($userdata->$key == 0)
								<th><span class="badge bg-green">Active</span></th>
							@else
								<th><span class="badge bg-red">Inactive</span></th>
							@endif
						@else
						<th>{{$userdata->$key}}</th>
						@endif
					@endforeach
					<td><a href="{{Request::root()}}/users/{{$userdata->id}}/edit" class="btn btn-success" title="edit">{{FA::icon('edit')}}</a></td>
					<td>  
 									{{ Form::open(array('method'=> 'DELETE', 'route' => array('users.destroy', $userdata->id))) }}	
									{{Form::button(FA::icon('times') , array(
           																 'type' => 'submit',
            															 'class'=> 'btn btn-danger',
           																 'onclick'=>'return confirm("Are you sure?")'
    																	));}}
                       				 {{ Form::close() }}
                                            </td>
					</tr>
					@endforeach
				
			  
			</table>
		</div><!-- /.box-body -->                                
	</div>			
</section>
