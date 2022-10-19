<?php
require("../../config/settings.php");
if(isset($_POST['delete'])){
    $products = new Product($_POST['product_id']);
    unlink($products->image);
    $products->delete($_POST['product_id']);
    $_SESSION['succes'] = "The product \"{$_POST['productName']}\" was deleted!";
}
if (isset($_POST['new_product'])){
    $product = new Product($_POST['new_product']);
    
    try{
        
		$img = uniqid();
		if (isset($_FILES['product_image'])) {
			if ($_FILES['product_image']['error'] == 0){
				try{
					$ext = Functions::getExtension($_FILES['product_image']['name']);
					$targets = "../img/products/";
					$targets .= "img_" . $img .  "." . $ext;
					if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $targets)){
						$errors[] = "Eroare upload fisier " . $_FILES['product_image']['name'];
					}
				}
				catch (Exception $e){
					$errors[] = "Eroare " . $e->getCode() . ": " . $e->getMessage();
				}
			}                
		} else {
			$targets = $_POST['product_image'];
			
		}
		$product = new Product;
		$product->product_name = $_POST['product_name'];
		$product->category_id = $_POST['category'];
		$product->image = $targets;
		$product->description = $_POST['description'];
		$product->industry_id = $_POST['industry'];

		if ($_POST['new_product'] == 'true'){
			if ($product->save()){
				$_SESSION['succes'] = "Product '{$product->product_name}' was saved!";
				header('Location: dashboard.php');
			}else{
				$errors[] = "The product was not saved!";
			}
		}elseif (is_numeric($_POST['new_product'])){
			$product->id = $_POST['new_product'];
			if ($product->save()){
				$_SESSION['succes'] = "Product '{$product->product_name}' was modified!";
				header('Location: dashboard.php');
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
			<h1 class="title">Produse</h1>
			<p class="description">Administreaza produse</p>
		</div> 
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">Produse</div>
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
									$edit = new Product($_GET['edit']);
								endif;

                            ?>

                            <form class="validate" action="<?php echo $_SERVER['PHP_SELF'];?>?action=products" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-xs-3">
                                        <label class="control-label">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo (isset($edit)) ? $edit->product_name : '';?>" />
                                    </div>
                                    <div class="form-group col-xs-2">
                                        <label class="control-label">Product Image</label>
                                        <?php 
                                        if(isset($edit)) {
                                            ?>
                                                <div class="img">
                                                    <img style="height: 32px; float: left; margin-right: 10px;" src="<?=$edit->image?>" alt="">
                                                    <input type="hidden" name="product_image" value="<?=$edit->image?>">
                                                    <a style="margin: 0" class="btn btn-info" id="changeImage">
                                                        Change image
                                                    </a>
                                                </div>
                                                <script>
                                                    const btn = document.querySelector('#changeImage');
                                                    const img = document.querySelector('.img');
                                                   
                                                    const input = document.createElement('input');
                                                    input.setAttribute('type', 'file');
                                                    input.setAttribute('name', 'product_image');
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
                                                <input type="file" class="form-control" name="product_image" id="product_image" data-validate="required" data-message-required="Product image is required" />
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label" for="category">Category</label>
                                        <select id="category" name="category" class="selectboxit">
                                            <option value="-1" selected disabled="disabled">- Choose category -</option>
                                                <?php
                                                $categories = Category::All();                  

                                                if($categories > 0) {
                                                    foreach ($categories as $category) {

                                                        $selected = (isset($_GET['edit']) and $edit->category_id == $category->id) ? "selected" : ""; ?>
                                                        <option value="<?= $category->id; ?>"  <?= $selected; ?>><?= $category->category_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                        <span class="error">Category is required</span>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $("form").submit(function(){
                                                    var category = $('#category');
                                                    if (category.val() != null) {
                                                        return true;
                                                    }
                                                    category.parent().addClass('select-error');
                                                    return false;
                                                });
                                                $("#category").change(function(){
                                                    $(this).parent().removeClass('select-error');
                                                    $(".error").hide();
                                                });
                                            });
                                        </script>
									</div>
									<div class="form-group col-md-2">
                                        <label class="control-label" for="industry">Industry</label>
                                        <select id="industry" name="industry" class="selectboxit">
                                            <option value="-1" selected disabled="disabled">- Choose industry -</option>
                                                <?php
                                                $industries = Industry::All();                  

                                                if($industries > 0) {
                                                    foreach ($industries as $industry) {

                                                        $selected = (isset($_GET['edit']) and $edit->industry_id == $industry->id) ? "selected" : ""; ?>
                                                        <option value="<?= $industry->id; ?>"  <?= $selected; ?>><?= $industry->industry_name; ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                        </select>
                                        <span class="error">Industry is required</span>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $("form").submit(function(){
                                                    var industry = $('#industry');
                                                    if (industry.val() != null) {
                                                        return true;
                                                    }
                                                    industry.parent().addClass('select-error');
                                                    return false;
                                                });
                                                $("#industry").change(function(){
                                                    $(this).parent().removeClass('select-error');
                                                    $(".error").hide();
                                                });
                                            });
                                        </script>
									</div>
									<div class="form-group col-xs-2">
                                        <label class="control-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" value="<?php echo (isset($edit)) ? $edit->price : '';?>" />
                                    </div>
								</div>
								<div class="row">
									<div class="form-group col-xs-12">
									<textarea class="ckeditor" name="description"><?php echo (isset($edit)) ? $edit->description : '';?></textarea>
									</div>
								</div>
                               
                                <input type="hidden" name="new_product" value="<?php echo (isset($edit)) ? $edit->id : 'true';?>" />
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
                        $products = Product::All();
					
                        
                        if (count($products) > 0) :
                            ?>
                           	<p style="margin-bottom: 15px">
								<a class="btn btn-primary btn-sm" href="dashboard.php?action=products&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add Product</a>
							</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
										<th>Category</th>
										<th>Industry</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                $cnt = 0;
                        
                                foreach ($products as $product) : 
                                    $cnt++;  
                                    ?>  
                                    <tr>
                                        <td><?= $product->id; ?></td>
                                        <td><img src="<?= $product->image; ?>" width="50px" alt=""></td>
                                        <td style="max-width: 200px"><?= $product->product_name; ?></td>
                                        <?php
                                            try {
                                                $category = new Category($product->category_id);
                                            }
                                            catch (Exception $e){
                                                $errors[] = $e->getMessage();
                                            }
                                        ?>
										<td><?= $category->category_name; ?></td>
										<?php
                                            try {
                                                $industry = new Industry($product->industry_id);
                                            }
                                            catch (Exception $e){
                                                $errors[] = $e->getMessage();
                                            }
                                        ?>
                                        <td><?= $industry->industry_name; ?></td>
                                        <td>
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-warning" href="dashboard.php?action=products&edit=<?= $product->id ?>">
                                                <i class="fa-wrench"></i>
                                            </a>
                                            
                                            <a style="float: left; margin-right: 10px;" class="btn btn-icon btn-red" onclick="jQuery('#deleteModal_<?=$product->id?>').modal('show', {backdrop: 'true'});">
                                                <i class="fa-remove"></i>
                                            </a>
                                            <div id="deleteModal_<?=$product->id?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Really delete <?= $product->product_name; ?>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="delete" method="post" action="">
                                                                <input type="hidden" name="product_id" value="<?= $product->id; ?>"/> 
                                                                <input type="hidden" name="productName" value="<?= $product->product_name; ?>"/> 
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
								<a class="btn btn-primary btn-sm" href="dashboard.php?action=products&add=true"><i class="fa fa-plus" style="padding-right: 15px"></i>Add Product</a>
							</p>
                            <div class="error">No products added in database!</div>
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
