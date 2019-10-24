<?php

    if (isset($_POST['new_send'])){

        $toAdmin = "office@cdigrup.ro";
        $subjectAdmin = "Ati primit o solicitare de informatii de pe siteul www.cdigrup.ro";

        $headersAdmin = "MIME-Version: 1.0" . "\r\n";
        $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headersAdmin .= 'From: Cdi Grup<office@cdigrup.ro>' . "\r\n";

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $qnt = $_POST['qnt'] . ' kg';
        $message = $_POST['message'];

        $txtAdmin = "Nume: $name \r\nTelefon: $phone \r\nEmail: $email \r\nCantitate: $qnt \r\nMesaj: $message";

        mail($toAdmin,$subjectAdmin,$txtAdmin,$headersAdmin);

        $_SESSION['succes'] = "Mesajul a fost trimis cu succes. Multumim.";
    }


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
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <link rel="shortcut icon" href="">
</head>

<body>
    <?php include('./blocks/header.php'); ?>
    <section class="section-book">
        <div class="row">
            <?php
                if (isset($_SESSION['succes'])) : ?>
                    <div class="alert alert--success">
                        <!-- <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button> -->
                        <?= $_SESSION['succes']; ?>
                    </div>
                    <?php unset($_SESSION['succes']);
                endif ;
            ?>
            <div class="book">
                <div class="book__form">
                    
                    <form action="" method="post" class="form">
                        <div class="u-margin-bottom-medium">
                            <h2 class="heading-secondary">
                                Cerere oferta
                            </h2>
                        </div>

                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="ex: Popescu Ion" id="name" name="name" required>
                            <label for="name" class="form__label">Nume complet</label>
                        </div>

                        <div class="form__group">
                            <input type="email" class="form__input" placeholder="ex: popescu.ion@email.ro" id="email" name="email" required>
                            <label for="email" class="form__label">Email</label>
                        </div>

                        <div class="form__group">
                            <input type="phone" class="form__input" placeholder="ex: 07xx xxx xxx" id="phone" name="phone" required>
                            <label for="phone" class="form__label">Telefon</label>
                        </div>

                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="ex: 20kg" id="qnt" name="qnt" required>
                            <label for="qnt" class="form__label">Cantitate</label>
                        </div>

                        <div class="form__group">
                            <textarea class="form__input" placeholder="Mesajul tau" id="message" required name="message"></textarea>
                            <label for="message" class="form__label">Mesaj</label>
                        </div>

                        <!-- <div class="form__group u-margin-bottom-medium">
                            <div class="form__radio-group">
                                <input type="radio" class="form__radio-input" id="small" name="size">
                                <label for="small" class="form__radio-label">
                                    <span class="form__radio-button"></span>
                                    Persoana fizica
                                </label>
                            </div>

                            <div class="form__radio-group">
                                <input type="radio" class="form__radio-input" id="large" name="size">
                                <label for="large" class="form__radio-label">
                                    <span class="form__radio-button"></span>
                                    Persoana juridica
                                </label>
                            </div>
                        </div> -->
                        <input type="hidden" name="new_send" value="true">

                        <div class="form__group">
                            <button class="btn btn--green">Trimite &rarr;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <div class="popup" id="popup">
        <div class="popup__content">
            <div class="popup__left">
                <img src="img/nat-8.jpg" alt="Tour photo" class="popup__img">
                <img src="img/nat-9.jpg" alt="Tour photo" class="popup__img">
            </div>
            <div class="popup__right">
                <a href="#section-tours" class="popup__close">&times;</a>
                <h2 class="heading-secondary u-margin-bottom-small">Start booking now</h2>
                <h3 class="heading-tertiary u-margin-bottom-small">Important &ndash; Please read these terms before booking
                </h3>
                <p class="popup__text">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed sed risus pretium quam. Aliquam sem et tortor consequat id. Volutpat odio facilisis mauris sit amet massa vitae. Mi bibendum
                    neque egestas congue. Placerat orci nulla pellentesque dignissim enim sit. Vitae semper quis lectus nulla at volutpat diam ut venenatis. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. Proin fermentum leo
                    vel orci porta non pulvinar neque laoreet. Gravida neque convallis a cras semper. Molestie at elementum eu facilisis sed odio morbi quis. Faucibus vitae aliquet nec ullamcorper sit amet risus nullam eget. Nam libero justo laoreet sit.
                    Amet massa vitae tortor condimentum lacinia quis vel eros donec. Sit amet facilisis magna etiam. Imperdiet sed euismod nisi porta.
                </p>
                <a href="#" class="btn btn--green">Book now</a>
            </div>
        </div>
    </div>
    <section class="section-map">
        <div class="section-map__details">
            <figure>
                <!-- <img src="//geo3.ggpht.com/cbk?panoid=EO4-bRVwkI_IWWnJRv8Y7A&output=thumbnail&cb_client=search.LOCAL_UNIVERSAL.gps&thumb=2&w=227&h=160&yaw=284.053&pitch=0&thumbfov=100" alt=""> -->
            </figure>
            <h1>Acoperire Nationala</h1>
            <ul>
                <li>
                    <strong>Depozitul din Timisoara</strong>
                    <small>Soseaua Independentei, 48</small>
                </li>
                <li>
                    <strong>Depozitul din Bucuresti</strong>
                    <small>Soseaua Independentei, 48</small>
                </li>
            </ul>
        </div>
        <div id="map" class="map"></div>
    </section>
    <?php include('./blocks/footer.php'); ?>
    <script src="js/scripts.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjdLxZsC1eR4RzY3grkbGnDckk7DcCmBU&callback=initMap">
    </script>
</body>

</html>