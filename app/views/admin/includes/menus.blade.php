<aside class="left-side sidebar-offcanvas">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src={{asset('img/avatar5.png')}} class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p>
					Hello, {{$user_firstname}}
				</p>

				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..."/>
				<span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button> </span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="active">
				<a href="#"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
			</li>
			<li>
				<a href="{{Request::root()}}/admin"> <i class="fa fa-th"></i> <span>Users</span> </a>
			</li>
			<li class="treeview">
				<a href="#"> <i class="fa fa-bar-chart-o"></i> <span>Useful Contacts</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li>
						<a href="{{Request::root()}}/contacts"><i class="fa fa-angle-double-right"></i> Phone Numbers</a>
					</li>

				</ul>
			</li>
			
			<li class="treeview">
				<a href="#"> <i class="fa fa-edit"></i> <span>Staff</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-angle-double-right"></i> Staff List</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#"> <i class="fa fa-table"></i> <span>Notes</span> <i class="fa fa-angle-left pull-right"></i> </a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-angle-double-right"></i> Notes List</a></li>
				</ul>
			</li>
			<li>
				<a href="{{Request::root()}}/post_staffs"> <i class="fa fa-calendar"></i> <span>Posts</span> </a>
			</li>
		
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>