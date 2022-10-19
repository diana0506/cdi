<?php
require("../../config/settings.php");
if(isset($_POST['delete'])){
    $industries = new Industry($_POST['industry_id']);
    unlink($industries->image);
    $industries->delete($_POST['industry_id']);
    $_SESSION['succes'] = "The industry \"{$_POST['industryNmae']}\" was deleted!";
}
if (isset($_POST['new_industry'])){
    $industry = new Industry($_POST['new_industry']);
    
    try{
        
		$img = uniqid();
		if (isset($_FILES['industry_image'])) {
			if ($_FILES['industry_image']['error'] == 0){
				try{
					$ext = Functions::getExtension($_FILES['industry_image']['name']);
					$targets = "../img/industries/";
					$targets .= "img_" . $img .  "." . $ext;
					if (!move_uploaded_file($_FILES['industry_image']['tmp_name'], $targets)){
						$errors[] = "Eroare upload fisier " . $_FILES['industry_image']['name'];
					}
				}
				catch (Exception $e){
					$errors[] = "Eroare " . $e->getCode() . ": " . $e->getMessage();
				}
			}                
		} else {
			$targets = $_POST['industry_image'];
			
        }
        
        if (isset($_FILES['industry_image_mobile'])) {
			if ($_FILES['industry_image_mobile']['error'] == 0){
				try{
					$ext = Functions::getExtension($_FILES['industry_image_mobile']['name']);
					$mobile = "../img/industries/";
					$mobile .= "img_" . $img .  "." . $ext;
					if (!move_uploaded_file($_FILES['industry_image_mobile']['tmp_name'], $mobile)){
						$errors[] = "Eroare upload fisier " . $_FILES['industry_image_mobile']['name'];
					}
				}
				catch (Exception $e){
					$errors[] = "Eroare " . $e->getCode() . ": " . $e->getMessage();
				}
			}                
		} else {
			$mobile = $_POST['industry_image_mobile'];
			
		}
		$industry = new Industry;
		$industry->industry_name = $_POST['industry_name'];
        $industry->image = $targets;
        $industry->image_mobile = $mobile;
		

		if ($_POST['new_industry'] == 'true'){
			if ($industry->save()){
				$_SESSION['succes'] = "Industry '{$industry->industry_name}' was saved!";
				header('Location: industries.php');
			}else{
				$errors[] = "The industry was not saved!";
			}
		}elseif (is_numeric($_POST['new_industry'])){
			$industry->id = $_POST['new_industry'];
			if ($industry->save()){
				$_SESSION['succes'] = "Industry '{$industry->industry_name}' was modified!";
				header('Location: industries.php');
			}
		}
	}
    
    catch (Exception $e){
        $errors[] = $e->getMessage();
    }
}
require("blocks/header.php");
?>

<div class="main-content">
	<nav class="navbar user-info-navbar"  role="navigation">
	<!-- User Info, Notifications and Menu Bar -->
		<ul class="user-info-menu left-links list-inline list-unstyled">
			<?php require("blocks/notifications.php"); ?>
		</ul>
		<?php require("blocks/user-settings.php"); ?>
	</nav>
	<div class="page-title">
		<div class="title-env">
			<h1 class="title">Industrii</h1>
			<p class="description">Administreaza industriile</p>
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Industrii</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12">
						<?php if ((isset($errors)) and (is_array($errors))) : ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <?php foreach ($errors as $error) :
                                echo $error;
                                endforeach; ?>
                            </div>
                        	<?php endif; 
                        	if ((isset($_GET['add'])) or (isset($_GET['edit']))) :
								if (isset($_GET['edit'])) :
									$edit = new Industry($_GET['edit']);
								endif;

                            ?>

                            <form class="validate" action="<?php echo $_SERVER['PHP_SELF'];?>?action=industries" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xs-3">
                                        <label class="control-label">Industry Name</label>
                                        <input type="text" class="form-control" name="industry_name" id="industry_name" value="<?php echo (isset($edit)) ? $edit->industry_name : '';?>" />
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label class="control-label">Industry Image</label>
                                        <?php 
                                        if(isset($edit)) {
                                            ?>
                                                <div class="img">
                                                    <img style="height: 32px; float: left; margin-right: 10px;" src="<?=$edit->image?>" alt="">
                                                    <input type="hidden" name="industry_image" value="<?=$edit->image?>">
                                                    <a style="margin: 0" class="btn btn-info" id="changeImage">
                                                        Change image
                                                    </a>
                                                </div>
                                                <script>
                                                    const btn = document.querySelector('#changeImage');
                                                    const img = document.querySelector('.img');
                                                   
                                                    const input = document.createElement('input');
                                                    input.setAttribute('type', 'file');
                                                    input.setAttribute('name', 'industry_image');
                                                    input.setAttribute('class', 'form-control');
                                                    input.setAttribute('data-validate', 'required');
                                                    input.setAttribute('data-message-required', 'Industry image is required');
                                                    btn.addEventListener('click', ()=>{
                                                        img.innerHTML = '';
                                                        img.appendChild(input);
                                                    });
                                                </script>
                                            <?php
                                        } else {
                                            ?>
                                                <input type="file" class="form-control" name="industry_image" id="industry_image" data-validate="required" data-message-required="Industry image is required" />
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label class="control-label">Industry Image Mobile</label>
                                        <?php 
                                        if(isset($edit)) {
                                            ?>
                                                <div class="img">
                                                    <img style="height: 32px; float: left; margin-right: 10px;" src="<?=$edit->image?>" alt="">
                                                    <input type="hidden" name="industry_image_mobile" value="<?=$edit->image?>">
                                                    <a style="margin: 0" class="btn btn-info" id="changeImage">
                                                        Change image
                                                    </a>
                                                </div>
                                                <script>
                                                    const btn = document.querySelector('#changeImage');
                                                    const img = document.querySelector('.img');
                                                   
                                                    const input = document.createElement('input');
                                                    input.setAttribute('type', 'file');
                                                    input.setAttribute('name', 'industry_image_mobile');
                                                    input.setAttribute('class', 'form-control');
                                                    input.setAttribute('data-validate', 'required');
                                                    input.setAttribute('data-message-required', 'Industry image is required');
                                                    btn.addEventListener('click', ()=>{
                                                        img.innerHTML = '';
                                                        img.appendChild(input);
                                                    });
                                                </script>
                                            <?php
                                        } else {
                                            ?>
                                                <input type="file" class="form-control" name="industry_image_mobile" id="industry_image_mobile" data-validate="required" data-message-required="Industry image is required" />
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
								</div>
								
                               
                                <input type="hidden" name="new_industry" value="<?php echo (isset($edit)) ? $edit->id : 'true';?>" />
                                <button class="btn btn-info" type="submit" value="Save">
                                    <i style="top: 3px; padding-right: 10px;" class="glyphicon glyphicon-save"></i>Save
                                </button>
                            </form>
                            <?php else : 
                            if (isset($_SESSION['succes'])) : ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">×</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <?= $_SESSION['succes']; ?>
                            </div>
													
                            <?php unset($_SESSION['succes']);
                        endif ;
                        $industries = Industry::All();
					
                        
                        if (count($industries) > 0) :
                            ?>
                           	<p style="margin-bottom: 15px">
								<a class="btn btn-primary btn-sm" href="industries.php?action=industries&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add industry</a>
							</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Mobile Image</th>
                                        <th>Name</th>
										
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                $cnt = 0;
                        
                                foreach ($industries as $industry) : 
                                    $cnt++;  
                                    ?>  
                                    <tr>
                                        <td><?= $industry->id; ?></td>
                                        <td><img src="<?= $industry->image; ?>" width="50px" alt=""></td>
                                        <td><img src="<?= $industry->image_mobile; ?>" width="50px" alt=""></td>
                                        <td style="max-width: 200px"><?= $industry->industry_name; ?></td>
                                        
                                        <td>
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-warning" href="industries.php?action=industries&edit=<?= $industry->id ?>">
                                                <i class="fa-wrench"></i>
                                            </a>
                                            
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-red" onclick="jQuery('#deleteModal_<?=$industry->id?>').modal('show', {backdrop: 'true'});">
                                                <i class="fa-remove"></i>
                                            </a>
                                            <div id="deleteModal_<?=$industry->id?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Really delete <?= $industry->industry_name; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="delete" method="post" action="">
                                                                <input type="hidden" name="industry_id" value="<?= $industry->id; ?>"/> 
                                                                <input type="hidden" name="industryNmae" value="<?= $industry->industry_name; ?>"/> 
                                                                <input type="hidden" name="delete" value="true"/>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button id="remove" type="submit" value="Delete" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <?php
                            else : ?>
							<p style="margin-bottom: 15px">
								<a class="btn btn-primary btn-sm" href="industries.php?action=industries&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add industry</a>
							</p>
                            <div class="error">No industries added in database!</div>
                        <?php endif;
                        endif ?>

						</div>
					</div>
				</div>
			</div>
		</div> 

	</div>
	<?php
	require("blocks/footer.php");
	?>
</div>
