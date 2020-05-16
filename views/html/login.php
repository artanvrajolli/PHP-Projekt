<?php
if(!isset($msg)){
$msg = "";
}

if($is_online == 1){
 header("location: /dashboard");
}

?>

<div class="">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Login</h4>
	<div>
	<?=$msg?>
	</div>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input  class="form-control" name="email" placeholder="Username" type="text">
    </div>  
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Password" type="password">
    </div>                                        
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" name="loginin">Login</button>
    </div>                                                                      
</form>
</article>
</div> 
