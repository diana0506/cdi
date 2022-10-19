

<?php 
$products = new Product();

$product = $products->getProduct($_GET['produs']);


$industries = new Industry($product[0]->industry_id);
$industry = $industries->slug;

title($product[0]->product_name); meta( '');


include('./blocks/header.php'); 

?>
    <aside>
        <div class="header__company-info">
            <div class="header__logo-box">
                <img src="img/cdi_group.svg" alt="logo" class="header__logo">
            </div>

            <div class="info info--no-rotate">
                <span class="slogan">SPECIALISTI IN SARE</span>
                <div class="social">
                    <a href="">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <main>
        <section class="section-single-products">
            <div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    <?= $product[0]->product_name ?>
                </h2>
            </div>
            <div class="row">
                <div class="single-product">
                    <figure class="single-product__img">
                        <img src="<?= $product[0]->image ?>" alt="<?= $product[0]->product_name ?>">
                    </figure>
                    <div class="single-product__specs">
                        <div class="single-product__info single-card">
                           <?= $product[0]->description ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="product-actions">
                <a href="contact.php" class="btn btn--green">Cerere oferta</a>
                <a href="tel:+40721969733" class="btn btn--yellow">Suna acum</a>
            </div>
            
        </section>
    </main>
    <?php include('./blocks/footer.php'); ?>