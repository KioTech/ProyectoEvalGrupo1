<div id="" class="row">
	<?php if (isset($authUrl)){ ?>
	<form id="form_signin">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="<?php echo $authUrl; ?>" class="btn btn-lg btn-default btn-block">
	  	<span class="glyphicon glyphicon-envelope" aria-hidden="true"> Gmail</span>
	  </a>
  </form>
  
  
	<?php }else{ ?>
	<header id="info">
		<a target="_blank" class="user_name" href="<?php echo $userData->link; ?>" /><img class="user_img" src="<?php echo $userData->picture; ?>" width="15%" />
		<?php echo '<p class="welcome"><i>Welcome ! </i>' . $userData->name . "</p>"; ?></a><a class='logout' href='https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=<?php echo base_url(); ?>index.php/user_authentication/logout'>Logout</a>
	</header>
	<?php
	echo "<p class='profile'>Profile :-</p>";
	echo "<p><b> First Name : </b>" . $userData->given_name . "</p>";
	echo "<p><b> Last Name : </b>" . $userData->family_name . "</p>";
	echo "<p><b> Gender : </b>" . $userData->gender . "</p>";
	echo "<p><b>Email : </b>" . $userData->email . "</p>";
	?>
	<?php }?>
</div>