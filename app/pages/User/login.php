
<div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" method="post">

    		<h4 class="display-4  fs-1">LOGIN</h4><br>
    		<?php if(isset($error) && !empty($error)){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $error; ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Email</label>
		    <input type="text" 
		           class="form-control"
		           name="email"
		           required>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="password" required>
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Login</button>
		  <a href="../../exam/user/registration" class="link-secondary">Sign Up</a>
		</form>
    </div>