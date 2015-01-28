
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>TestProject | Registration Page</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href={{asset('css/AdminLTE.css')}} rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
        	<div class="form-box" id="login-box">
            
			<!-- Login error messages starts -->
				<div class="col-md-12">				
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
			<!-- Login error message ends -->		
            <div class="header">Register New User</div>
            {{ Form::open(array('action' => 'UserController@registerNewUser','method'=>'post')) }}
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full name"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password"/>
                    </div>
                     <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                    </div>
                </div>
                <div class="footer">                    

                    <button type="submit" name="submit" class="btn bg-olive btn-block">Sign me up</button>

                    <a href="{{Request::root()}}/users/login" class="text-center">I already have an account</a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Register using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>