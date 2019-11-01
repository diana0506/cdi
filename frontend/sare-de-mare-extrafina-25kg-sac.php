<?php
    $industry = "piscine";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.min.css">
    <script src="https://kit.fontawesome.com/45638df98b.js"></script>
    <link rel="shortcut icon" href="">
</head>

<body>
<?php include('./blocks/header.php'); ?>
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
                    Sare de mare extrafina sac 25 kg
                </h2>
            </div>
            <div class="row">
                <div class="single-product">
                    <figure class="single-product__img">
                        <img src="img/products/2.3-extrafina.jpg" alt="">
                    </figure>
                    <div class="single-product__specs">
                        <div class="single-product__info single-card">
                            <h3>Descrierea produsului:</h3>
                            <p>Aceasta sare de origina marina extrafina alba si lipsita de impuritati, este obtinut prin evaporare naturala si este utilizat in industria alimentara si nealimentara. Produsul vine ambalat in saci de polietilena de 25 kg</p>
                        <h3>Destinatia produsului:</h3>

                        <p>Sarea de mare extrafina isi gaseste folosinta indeosebi in industria alimentara, in procesarea directa a alimentelor, dar si pentru consumul uman.
                        </p>
                        <ul>
                           <li> Industria alimentara</li>
                           <li> Producerea de baurturi alcoolice si non-alcoolice</li>
                           <li>Consumul alimentar uman</li>
                        </ul>
                    <h3>Caracteristici tehnice:</h3>
                    <ul>
                        <li> NaCl: 98.4%</li>
                        <li> Substanțe insolubile: 500 mg/kg</li>
                        <li>Alcalinitate: 250 mg/kg</li>
                        <li>Conținut de calciu: 2500 mg/kg</li>
                        <li>Conținut de magneziu: 1000 mg/kg</li>
                        <li>Conținut de potasiu: 278 mg/kg</li>
                     </ul>
                 </div>

            </div>
        </div>
    </div>
            <a href="contact.html" class="btn btn--green">Cerere oferta</a>
        </section>
    </main>
    <?php include('./blocks/footer.php'); ?>
</body>

</html>