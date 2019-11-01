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
                    Hipoclorit de sodiu concentratie 12% la canistra 25 kg
                </h2>
            </div>
            <div class="row">
                <div class="single-product">
                    <figure class="single-product__img">
                        <img src="img/products/2.4.jpg" alt="">
                    </figure>
                    <div class="single-product__specs">
                        <div class="single-product__info single-card">
                            <h3>Descrierea produsului:</h3>
                            <p>Hipocloritul de sodiu (NaOCl) reprezinta o solutie lichida transparenta, de culoare galben-verzui, cu miros specific de clor, folosita cu succes in actiunea de tratare a apei, ca agent oxidant, dar si ca dezinfectant.
                                Este cea mai populara varianta folosita pentru dezinfectarea apei fiind totodata si cea mai simpla si accesibila metoda.
                                Procedeul de clorinare este realizat pentru dezinfectarea imediata a apei, dar mai are un avantaj esential - caracterul remanent, ce reduce posibilitatea de regenerare ulterioara a agentilor patogeni.
                            </p>

                            <h3>Destinatia produsului:</h3>
                            <p>Hipocloritul de sodiu este un produs utilizat pentru tratarea si dezinfectarea apei din piscine, bazine olimpice si alte forme de bazine de agrement, publice sau private.
                            </P>
                            <h3>Caracteristici tehnice:</h3>
                            <ul>
                                <li> NaOCl: 12%, Stabilizat tip 2,5</li>
                                <li> Continut in clor activ: 14,45%</li>
                                <li> Continut in hidroxid de sodiu: 1,32%</li>
                                <li> Densitate: 1,244 g/cm3</li>
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