<?php
if(!isset($msg)){
$msg = "";
}

if($is_online == 1){
 header("location: /dashboard");
}

?>
<div class="container" style="min-height: 700px;">
    <h1>Login</h1>
<div>
      <?=$msg?>
</div>
  <form method="POST">
    <div class="form-group">
      <label for="exampleFormControlInput1">Username / Email</label>
      <input type="text" name="email" class="form-control w-25 p-3" id="exampleFormControlInput1" placeholder="Username / Email">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Password</label>
      <input type="password" name="password" class="form-control w-25 p-3" id="exampleFormControlInput1" placeholder="passsword">
    </div>
    <input class="btn btn-primary" type="submit" name="loginin" value="Login" id="butto" ><br><br>
  </form>
  <!--
<form id="registration" method="post">
				<input type="text" name="username" placeholder="Username" id="button" required><br><br>
				<input type="email" name="email" placeholder="Email" id="button" required><br><br>
				<input type="password" name="password" placeholder="Password" id="button" required><br><br>
				<input type="password" name="cpassword" placeholder="Confirm Password" id="button" required><br><br>
					<br><br>
				<input type="submit" name="signup" value="Sign up" id="butto" onclick="myFunction()"><br><br>
				<p id="sub" style="color: white;"></p>
				<p style="color: white;">Already have an account? &nbsp;<a href="forget.html" name="login" id="log">Log In</a></p>
			</form>-->
</div>