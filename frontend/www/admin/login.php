<?php
require_once("../../config/settings.php");
$user = new User();

try{
	$logged_in = $user->loggedIn();
	if ($logged_in){
		header('Location: dashboard.php');
	}
}
catch (Exception $e){
	$errors[] = $e->getMessage();
	$logged_in = false;
}

if(isset($_POST['send'])){

	$data = array(
		'email' => array('email' => 'Invalid email'),
		'password' => array('required' => 'Password field cannot be empty!')
		);
	try{
		$errors = Functions::Validate($data,$_POST);
		if (!$errors){

			if(isset($_POST['persistent'])){
				$persistent = true;
			}else{
				$persistent = false;
			}
			if(!$user->login($_POST['email'], $_POST['password'], $persistent)){
				$_SESSION['error'] = "Date incorecte";
			}else{
				header("Location: dashboard.php");
			}
		}
	}
	catch(Exception $e){
		$errors[] = $e->getMessage();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>simposio admin</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="../assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="../assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/xenon-core.css">
	<link rel="stylesheet" href="../assets/css/xenon-forms.css">
	<link rel="stylesheet" href="../assets/css/xenon-components.css">
	<link rel="stylesheet" href="../assets/css/xenon-skins.css">
	<link rel="stylesheet" href="../assets/css/custom.css">
	<script src="../assets/js/jquery-1.11.1.min.js"></script>
</head>
<script type="text/javascript">
	$(document).ready(function($){
		setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
		setInterval(function () {
			$('#time').load(document.URL +  ' #time');
			if ($("#seconds:contains('0:01 seconds')").length) {
				$('.alert-danger').removeClass('alert-danger').addClass('alert-success').append('<span>Your restricted has been removed. Now you will redirected to login page</span>');
				setInterval(function () {
					window.location.href = "login.php";
				}, 2000);
			}
		}, 1000);
	});
</script>
<body class="page-body">
	<div class="login-container">
		<div class="row">
			<div class="col-sm-6">
				<div class="errors-container">
					<?php if ((isset($errors)) and (is_array($errors))) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
							<?php foreach ($errors as $error) :
							echo $error . "<br />";
							endforeach; ?>
						</div>
					<?php endif; 
					if (isset($_SESSION['succes'])) : ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
						<?= $_SESSION['succes']; ?>
					</div>
					<?php unset($_SESSION['succes']);
					endif ; ?>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" role="form" id="login" class="login-form fade-in-effect">
					<div class="login-header">
						<img src="<?= HOST ?>assets/images/cdi_group.svg" alt=""  />
						<p>Dear user, log in to access the admin area!</p>
					</div>
					<div class="form-group">
						<label class="control-label" for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" />
					</div>

					<div class="form-group">
						<label class="control-label" for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" />
					</div>
					<div class="form-group">
						<label>
							<input type="checkbox" name="persistent" id="persistent" value="true" class="cbr" />
							Keep me logged in
						</label>
						<!-- <input type="checkbox" name="persistent" id="persistent" value="true" />
						<label for="persistent">Keep me logged in</label> -->
					</div>
					<div class="form-group">
						<input type="hidden" name="send" value="true" />
						<button type="submit" class="btn btn-primary  btn-block text-left">
							<i class="fa-lock"></i>
							Log In
						</button>
					</div>
				</form>
			</div>	
		</div>
			
		<?php
		require("blocks/footer.php");
		?>