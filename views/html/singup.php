

<div class="">
<article class="card-body mx-auto" style="max-width: 400px;">
	
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<div>
	<?=$msg?>
	</div>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input  class="form-control" name="username" placeholder="Username" type="text">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input  class="form-control" name="email" placeholder="Email address" type="email">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Create password" type="password">
    </div>    
	<div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="cpassword" placeholder="Confirm password" type="password">
    </div>                                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="signup"> Create Account  </button>
    </div>       
    <p class="text-center">Have an account? <a href="/login">Log In</a> </p>                                                                 
</form>
</article>
</div> 
