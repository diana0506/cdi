<?php
    $industry = "dezapezire";
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
                    Sare dezapezire sac 25kg
                </h2>
            </div>
            <div class="row">
                <div class="single-product">
                    <figure class="single-product__img">
                        <img src="img/products/sare-pentru-deszapezire.jpg" alt="">
                    </figure>
                    <div class="single-product__specs">
                        <div class="single-product__info single-card">
                            <h3>Descrierea produsului:</h3>
                            <p>In sezonul rece si in conditii meteorologice nefavorabile, sarea este folosita pentru dezghetarea carosabilului, a spatiilor destinate pietonilor, pentru facilitarea iesirilor din garaje si alte spatii. Prin intermediul proprietatilor
                                sale chimice, sarea impiedica deraparea autovehiculelor si implicit scade riscul de accidentare in perioada de iarna, ca urmare a caderilor masive de zapada si a scaderii temperaturilor sub pragul de inghet. Sarea pentru
                                deszapezire se utilizeaza sub forma de solutie salina sau in combinatie cu nisipul, moment cand capata functii antiderapante. Sezonul rece este extrem de imprevizibil, fapt pentru care recomandam tuturor soferilor care
                                sunt angrenati in trafic sa aiba intotdeauna un astfel de produs in portbagajul masinii. Se poate împrăștia sub formă de soluție salină sau ca agent antiderapant în combinație cu nisipul.
                            </p>
                            <h3>Destinatia produsului:</h3>
                            <p>Sarea pentru deszapezire este folosita pentru dezghetarea drumurilor, permitand fluidizarea traficului si a pietonilor in conditii de inghet si zapada excesiva.
                            </p>
                            <h3>Caracteristici tehnice:</h3>
                            <ul>
                                <li> NaCl: 98.6%,</li>
                                <li> Substanțe insolubile: 200 mg/kg</li>
                                <li> Conținut de calciu: 2900 mg/kg</li>
                                <li> Conținut de magneziu: 800 mg/kg</li>
                                <li> Conținut de potasiu: 150 mg/kg</li>
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