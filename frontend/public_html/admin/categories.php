<?php
require("../../config/settings.php");
if(isset($_POST['delete'])){
    $category = new Category($_POST['category_id']);
    // unlink($category[0]->image);
    $category->delete($_POST['category_id']);
    $_SESSION['succes'] = "The product \"{$_POST['categoryName']}\" was deleted!";
}
if (isset($_POST['new_category'])){
    $category = new Category($_POST['new_category']);
    if($_POST['new_category'] == 'true') {
        $data = array(
            "category_name" => array(
                "required" => "Category name is required!",
                "check_db" =>  array(
                    "categories",
                    "category_name",
                    "This category is already in the database"
                )
            )

        );
    }elseif($_POST['category_name'] == $category->category_name){
        $data = array(
            "category_name" => array("required" => "Category name is required!")
        );
    }else{
        $data = array(
            "category_name" => array(
                "required" => "Category name is required!",
                "check_db" =>  array(
                    "categories",
                    "category_name",
                    "This category is already in the database"
                )
            )

        );
    }
    try{
        $errors = Functions::Validate($data, $_POST);
        if (!$errors){
           
            $category = new Category;
            $category->category_name = $_POST['category_name'];
            $category->description_before_products = $_POST['description_before_products'];
            $category->description_after_products = $_POST['description_after_products'];

            if ($_POST['new_category'] == 'true'){
                if ($category->save()){
                    $_SESSION['succes'] = "Category '{$category->category_name}' was saved!";
                    header('Location: categories.php');
                }else{
                    $errors[] = "The category was not saved!";
                }
            }elseif (is_numeric($_POST['new_category'])){
                $category->id = $_POST['new_category'];
                if ($category->save()){
                    $_SESSION['succes'] = "Category '{$category->category_name}' was modified!";
                    header('Location: categories.php');
                }else{
                    $errors[] = "The category was not saved!";
                }
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
			<h1 class="title">Categorii</h1>
			<p class="description">Administreaza categoriile</p>
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Categorii</div>
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
									$edit = new Category($_GET['edit']);
								endif;

                            ?>

                            <form class="validate" action="<?php echo $_SERVER['PHP_SELF'];?>?action=categories" method="POST">
                                <div class="row">
                                    <div class="form-group col-xs-3">
                                        <label class="control-label">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo (isset($edit)) ? $edit->category_name : '';?>" />
                                    </div>
                                    <!-- <div class="form-group col-xs-3">
                                        <label class="control-label">Product Image</label>
                                        <?php 
                                        if(isset($edit)) {
                                            ?>
                                                <div class="img">
                                                    <img style="height: 32px; float: left; margin-right: 10px;" src="<?=$edit->image?>" alt="">
                                                    <input type="hidden" name="category_image" value="<?=$edit->image?>">
                                                    <a style="margin: 0" class="btn btn-info" id="changeImage">
                                                        Change image
                                                    </a>
                                                </div>
                                                <script>
                                                    const btn = document.querySelector('#changeImage');
                                                    const img = document.querySelector('.img');
                                                   
                                                    const input = document.createElement('input');
                                                    input.setAttribute('type', 'file');
                                                    input.setAttribute('name', 'category_image');
                                                    input.setAttribute('class', 'form-control');
                                                    input.setAttribute('data-validate', 'required');
                                                    input.setAttribute('data-message-required', 'Product image is required');
                                                    btn.addEventListener('click', ()=>{
                                                        img.innerHTML = '';
                                                        img.appendChild(input);
                                                    });
                                                </script>
                                            <?php
                                        } else {
                                            ?>
                                                <input type="file" class="form-control" name="category_image" id="category_image" data-validate="required" data-message-required="Product image is required" />
                                            <?php
                                        }
                                        ?>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label class="control-label">Text before products</label>
                                        <textarea class="ckeditor" name="description_before_products"><?php echo (isset($edit)) ? $edit->description_before_products : '';?></textarea>
                                    </div>
                                    <div class="form-group col-xs-12 col-md-6">
                                        <label class="control-label">Text after products</label>
                                        <textarea class="ckeditor" name="description_after_products"><?php echo (isset($edit)) ? $edit->description_after_products : '';?></textarea>
                                    </div>
                                </div>
                               
                                <input type="hidden" name="new_category" value="<?php echo (isset($edit)) ? $edit->id : 'true';?>" />
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
                        
                        $categories = Category::All();
					
                        
                        if (count($categories) > 0) :
                            ?>
                            <p style="margin-bottom: 15px">
								<a class="btn btn-primary btn-sm" href="categories.php?action=products&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add category</a>
							</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                $cnt = 0;
                        
                                foreach ($categories as $category) : 
                                    $cnt++;  
                                    ?>  
                                    <tr>
                                        <td><?= $category->id; ?></td>
                                     
                                        <td style="max-width: 200px"><?= $category->category_name; ?></td>
                                        
                                        <td>
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-warning" href="categories.php?action=products&edit=<?= $category->id ?>">
                                                <i class="fa-wrench"></i>
                                            </a>
                                            
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-red" onclick="jQuery('#deleteModal_<?=$category->id?>').modal('show', {backdrop: 'true'});">
                                                <i class="fa-remove"></i>
                                            </a>
                                            <div id="deleteModal_<?=$category->id?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Really delete <?= $category->category_name; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="delete" method="post" action="">
                                                                <input type="hidden" name="category_id" value="<?= $category->id; ?>"/> 
                                                                <input type="hidden" name="categoryName" value="<?= $category->category_name; ?>"/> 
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
								<a class="btn btn-primary btn-sm" href="categories.php?action=products&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add category</a>
							</p>
                            <div class="error">No categories added in database!</div>
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
