
    <?php include('./blocks/header.php'); ?>

    <main>
        <section class="section-products">
            <div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    Produse
                </h2>
            </div>

            <div class="row">
                <ul class="list-categories">
                    <li>
                        <a class="active" data-filter="*">Toate produsele</a>
                    </li>
                    <?php
 
                    $categories = Category::All("order_type", "ASC");
                    foreach($categories as $category) {
                        ?>
                            <li><a data-filter="<?= $category->slug ?>"><?= $category->category_name?></a></li>
                        <?php
                    }
                    ?>
                    
                    
                </ul>

                
                <div class="categories-description">
                    <?php
                        $categories = Category::All("order_type", "ASC");
                        foreach($categories as $category) {
                            ?>
                                <div class="<?= $category->slug ?> content">
                                    <?= $category->description_before_products  ?>
                                </div>
                            <?php
                        }
                    ?>
                </div>


                <div class="gallery">
                    <?php 
                        $products = Product::All();
                        $i = 1;
                        foreach($products as $product) {
                            $category_product = new Category($product->category_id);
                            ?>
                            <a href="/produs?produs=<?= $product->url ?>" class="gallery__item active gallery__item--<?= $i ?> <?= $category_product->slug ?>">
                                <div class="overlay">
                                    <h3 class="product-title"><?= $product->product_name ?></h3>
                                </div>
                                <img src="<?= $product->image ?>" alt="<?= $product->product_name ?>" class="gallery__img">
                            </a>
                        <?php
                        $i++;
                        }

                    ?>
                    
                    <!-- <a href="sare-tablete-piscina-austria-sac-25kg-solvary-trade.php" class="gallery__item active gallery__item--2 sare-intretinere-piscine">
                        <div class="overlay">
                            <h3 class="product-title">Sare tablete piscina Austria sac 25 kg (Solivary trade)</h3>
                        </div>
                        <img src="img/products/1.1.jpg" alt="Gallery image 2" class="gallery__img">
                    </a>
                    <a href="sare-tablete-austria-25kg-Solvary-Trade-tablete.php" class="gallery__item active gallery__item--3 sare-dedurizare-apa">
                        <div class="overlay">
                            <h3 class="product-title">Sare tablete Austria sac 25 kg Solvary Trade</h3>
                        </div>
                        <img src="img/products/1.1.jpg" alt="Gallery image 3" class="gallery__img">
                    </a>
                    <a href="sare-tablete-austria-25kg-Silver-tabs.php" class="gallery__item active gallery__item--4 sare-dedurizare-apa">
                        <div class="overlay">
                            <h3 class="product-title">Sare tablete Austria 25 kg Silver tabs.</h3>
                        </div>
                        <img src="img/products/1.2.jpg" alt="Gallery image 4" class="gallery__img">
                    </a>
                    <a href="sare-tablete-belorusia-sac-25kg.mozirsalt.php" class="gallery__item active gallery__item--5 sare-dedurizare-apa">
                        <div class="overlay">
                            <h3 class="product-title"> Sare tablete Belorusia sac 25 kg ( Mozirsalt )</h3>
                        </div>
                        <img src="img/products/1.3.jpg" alt="Gallery image 5" class="gallery__img">
                    </a>
                    <a href="sare-dezapezire-sac-25kg.php" class="gallery__item active gallery__item--6 produse-dezapezire">
                        <div class="overlay">
                            <h3 class="product-title">Sare pentru deszapezire sac 25 kg</h3>
                        </div>
                        <img src="img/products/sare-pentru-deszapezire.jpg" alt="Gallery image 6" class="gallery__img">
                    </a>
                    <a href="sare-de-mare-tablete-turcia-sac-25kg-sac-pure-white.php" class="gallery__item active gallery__item--7 sare-dedurizare-apa">
                        <div class="overlay">
                            <h3 class="product-title">Sare de mare tablete Turcia sac 25 kg</h3>
                        </div>
                        <img src="img/products/1.5.jpg" alt="Gallery image 7" class="gallery__img">
                    </a>
                    <a href="sare-de-mare-extrafina-25kg-sac.php" class="gallery__item active gallery__item--8 sare-intretinere-piscine">
                        <div class="overlay">
                            <h3 class="product-title"> Sare de mare extrafina sac 25 kg</h3>
                        </div>
                        <img src="img/products/2.3-extrafina.jpg" alt="Gallery image 8" class="gallery__img">
                    </a>
                    <a href="hipoclorit-de-sodiu-concentratie-12-la-cub-1250 kg.php" class="gallery__item active gallery__item--9 sare-intretinere-piscine">
                        <div class="overlay">
                            <h3 class="product-title">Hipoclorit de sodiu concentratie 12% la cub 1250 kg</h3>
                        </div>
                        <img src="img/products/2.5.jpg" alt="Gallery image 9" class="gallery__img">
                    </a>
                    <a href="hipoclorit-de-sodiu-concentratie-12-la-canistra.php" class="gallery__item active gallery__item--10 sare-intretinere-piscine">

                        <div class="overlay">
                            <h3 class="product-title">Hipoclorit de sodiu concentratie 12% la canistra 25 kg</h3>
                        </div>
                        <img src="img/products/2.4.jpg" alt="Gallery image 10" class="gallery__img">
                    </a>

                    <a href="clorura-de-magneziu-sac-25kg-import-germania-producator-deusa.php" class="gallery__item active gallery__item--11 produse-dezapezire">
                        <div class="overlay">
                            <h3 class="product-title">Clorura de magneziu sac 25 kg import Germania producator DEUSA</h3>
                        </div>
                        <img src="img/products/3.3.jpg" alt="Gallery image 10" class="gallery__img">
                    </a>
                    <a href="clorura-de-calciu-tehnica-74-sac-25kg-import-italia-fabrica-solvay.php" class="gallery__item active gallery__item--12 produse-dezapezire">
                        <div class="overlay">
                            <h3 class="product-title">Clorura de calciu tehnica 74 % sac 25 kg import Italia fabrica Solvay</h3>
                        </div>
                        <img src="img/products/3.2.jpg" alt="Gallery image 10" class="gallery__img">
                    </a>

                    <a href="clorura-calciu-tehnica-sac-25kg-concentratie-94-97.php" class="gallery__item active gallery__item--13 produse-dezapezire">
                        <div class="overlay">
                            <h3 class="product-title">Clorura de calciu tehnica 94-97 % sac 25 kg import Italia fabrica Solvay</h3>
                        </div>
                        <img src="img/products/3.1.jpg" alt="Gallery image 10" class="gallery__img">
                    </a> -->

                    <!-- next 5 -->
                    <!-- <a href="clorura-calciu-tehnica-sac-25kg-concentratie-94-97%.php" class="gallery__item active gallery__item--11 produse-dezapezire">
                    <div class="overlay">
                        <h3 class="product-title">Clorura de calciu tehnica 74 % sac 25 kg import Italia fabrica Solvay</h3>
                    </div>
                    <img src="img/products/3.1.jpg" alt="Gallery image 9" class="gallery__img">
                </a>
                <a href="hipoclorit-de-sodiu-concentratie-12-la-canistra.php" class="gallery__item active gallery__item--12 produse-dezapezire">
                    
                    <div class="overlay">
                        <h3 class="product-title">Clorura de calciu tehnica 74 % sac 25 kg import Italia fabrica Solvay</h3>
                    </div>
                    <img src="img/products/2.4.jpg" alt="Gallery image 10" class="gallery__img">
                </a>

                <a href="clorura-de-magneziu-sac-25kg-import-germania-producator-deusa.php" class="gallery__item active gallery__item--13 produse-dezapezire">
                    <div class="overlay">
                        <h3 class="product-title">Clorura de calciu tehnica 74 % sac 25 kg import Italia fabrica Solvay</h3>
                    </div>
                    <img src="img/products/3.3.jpg" alt="Gallery image 10" class="gallery__img">
                </a> -->
                    <!-- <a href="sare-dezapezire-ambalata-in-biguri-cantitate-1300kg.php" class="gallery__item active gallery__item--14 produse-dezapezire">
                        <div class="overlay">
                            <h3 class="product-title">Sare dezapezire ambalata in biguri 1300kg</h3>
                        </div>
                        <img src="img/products/sare-deszapezire-biguri-1300-kg.jpg" alt="Gallery image 10" class="gallery__img">
                    </a>

                    <a href="sare-de-mare-tablete-turcia-sac-25kg-pure-white-sac.php" class="gallery__item active gallery__item--15 sare-intretinere-piscine">
                        <div class="overlay">
                            <h3 class="product-title">Sare de mare tablete Turcia 25kg(Pure White)</h3>
                        </div>
                        <img src="img/products/1.5.jpg" alt="Gallery image 10" class="gallery__img">
                    </a> -->
                </div>
                <div class="categories-description">
                    <?php
                        $categories = Category::All("order_type", "ASC");
                        foreach($categories as $category) {
                            ?>
                                <div class="<?= $category->slug ?> content">
                                    <?= $category->description_after_products  ?>
                                </div>
                            <?php
                        }
                    ?>
                </div>




            </div>
        </section>
    </main>
    <?php include('./blocks/footer.php'); ?>
    <script>
        // product filter


        const setActiveProducts = (param) => {
            const productItems = document.querySelectorAll('.gallery__item');
            const gallery = document.querySelector('.gallery');
            const content = document.querySelectorAll('.content');

            arrContent = [...content];
            arrContent.forEach(element => {
                element.classList.remove('active');
            });
            arrContent.forEach(elem => {
                if (elem.classList.contains(param)) {
                    elem.classList.add('active');
                } else if (param == '*') {
                    elem.classList.remove('active');
                }
            });

            arrProductItems = [...productItems];
            arrProductItems.forEach(element => {
                element.classList.remove('active');
            });
            arrProductItems.map((elem) => {
                if (elem.classList.contains(param)) {
                    elem.classList.add('active');
                    gallery.classList.add('filtered');
                } else if (param == '*') {
                    elem.classList.add('active');
                    gallery.classList.remove('filtered');
                }
            })
        }

        const categoryListItems = document.querySelectorAll('.list-categories li a');
        arrListItems = [...categoryListItems];

        arrListItems.map((elem) => {
            elem.addEventListener('click', function() {
                arrListItems.forEach(element => {
                    element.classList.remove('active');
                });
                this.classList.add('active');
                setActiveProducts(this.dataset.filter);
            })
        });
    </script>
