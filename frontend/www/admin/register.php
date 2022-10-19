<?php
require("../../config/settings.php");
	if (isset($_POST['send'])){
		$data = array(
	        		'name' => array('required' => '"Name" field cannot be empty'),
					'last_name' => array('required' => '"Last Name" field cannot be empty'),
					'email' => array('email' => 'Invalid email', 'check_db' => array('users', 'email','Email already in database')),
					'password' => array('required' => 'Fill the password field','match' => array('repeat','The passwords does not match')),
					'repeat' => array('required' => 'Repeat password')
					);
		try{
	    	$errors = Functions::Validate($data,$_POST);
			if ((isset($errors)) and (is_array($errors))){
				$errors[] = $e->getMessage();
			}else{
				$user = new User();
				$user->date_created = date('Y-m-d H:i:s');
				$user->date_last_visit = date('Y-m-d H:i:s');
				$user->access = 0;
				$user->name = $_POST['name'];
				$user->last_name = $_POST['last_name'];
				$user->email = $_POST['email'];
				$user->password = password_hash($_POST['password'],PASSWORD_DEFAULT);

				try {
					if($user->save()){
						$_SESSION['succes'] = "The account has been created. Now you can login";
						$url = "login.php";
	                    echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=".$url."\"> ";
	                    exit();
					}else{
						$errors[] = "The user was not saved!";
					}
				}
				catch (Exception $e){
					$errors[] = $e->getMessage();
				}
				
			}
		}
		catch (Exception $e){
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
	<title>Micul Magazin</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?= HOST ?>/assets/css/custom.css">
	<script src="<?= HOST ?>/assets/js/jquery-1.11.1.min.js"></script>
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
			<script type="text/javascript">
				$(document).ready(function($){
					setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
				});
			</script>
			<div class="errors-container">
				<?php
				 if ((isset($errors)) and (is_array($errors))) : ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">×</span>
							<span class="sr-only">Close</span>
						</button>
						<?php foreach ($errors as $error) :
						echo $error;
						endforeach; ?>
					</div>
				<?php 
					endif; 
				?>
			</div>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" role="form" id="login" class="login-form fade-in-effect">
				<div class="login-header">
					<img src="<?= HOST ?>img/cdi_group.svg" alt="" width="80" />
					<p>Dear user, log in to access the admin area!</p>
				</div>
				<div class="form-group">
					<label class="control-label" for="name">Name</label>
					<input type="text" class="form-control" name="name" id="name" />
				</div>
				<div class="form-group">
					<label class="control-label" for="last_name">Last Name</label>
					<input type="text" class="form-control" name="last_name" id="last_name" />
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
					<label class="control-label" for="repeat">Repeat Password</label>
					<input type="password" class="form-control" name="repeat" id="repeat" />
				</div>
				<div class="form-group">
					<input type="hidden" name="send" value="true" />
					<button type="submit" class="btn btn-primary  btn-block text-left">
						<i class="fa-lock"></i>
						Register
					</button>
				</div>
			</form>
		</div>	
	</div>
<?php
require("blocks/footer.php");
?>