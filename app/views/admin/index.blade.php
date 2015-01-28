<!DOCTYPE html>
<html>
     @include('admin.includes.header-top')
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
         @include('admin.includes.header-menus')
    
        <div class="wrapper row-offcanvas row-offcanvas-left">
				  @include('admin.includes.menus')
    
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <div class="row">
                	<div class="col-md-12">
                        @if(Session::has('success_message'))
                                <div class="alert alert-success col-md-11 alert-display-position alrt-scss">
                                <a class="close" data-dismiss="alert">X</a>  
                                {{ Session::get('success_message') }}</div>
                            @endif					
				<!-- success message ends -->	
				
				<!-- error message starts -->
						@if(Session::has('error_message'))
							<div class="alert alert-error col-md-11 alert-display-position alrt-err">
                            <a class="close" data-dismiss="alert">X</a>  {{ Session::get('error_message') }}</div>
						@endif
                        
                        @if(count($errors->all())>0)
                            <div class="alert alert-error col-md-11 alert-display-position alrt-err">  
                            <a class="close" data-dismiss="alert">X</a>  
                            {{implode("<br />",$errors->all())}}
                            </div>  
						@endif
 
           			</div>
                </div>             				
              {{$content}}
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        @include('admin.includes.footer')
    
    </body>
</html>