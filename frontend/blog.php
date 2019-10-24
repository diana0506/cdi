<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.min.css">
    <title>Document</title>
</head>

<body>
    <div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toogle">
        <label for="navi-toogle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>
        <div class="navigation__background">&nbsp;</div>
        <nav class="navigation__nav">
            <ul class="navigation__list">
                <li class="navigation__item">
                    <a href="index.html" class="navigation__link">Acasa</a></li>
                <li class="navigation__item">
                    <a href="#" class="navigation__link">Despre noi</a></li>
                <li class="navigation__item">
                    <a href="produse.html" class="navigation__link">Produse</a></li>
                <li class="navigation__item">
                    <a href="blog.html" class="navigation__link">Blog</a></li>
                <li class="navigation__item">
                    <a href="contact.html" class="navigation__link">Contact</a></li>
            </ul>
        </nav>
    </div>
    <header class="header header--products">
        <ul class="header__menu">
            <li>
                <a href="tel:+40723123123">+40 723 123 123</a>
            </li>
            <li>
                <a href="index.html">Acasa</a>
            </li>
            <li>
                <a href="">Despre noi</a>
            </li>
            <li>
                <a href="produse.html">Produse</a>
            </li>
            <li>
                <a>Blog</a>
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li>
        </ul>
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
        <div class="header__overlay"></div>
    </header>
    <main>
        <section class="section-stories">
            <div class="bg-video">
                <video class="bg-video__content" autoplay muted loop>
                    <source src="img/video.mp4" type="video/mp4">
                    <source src="img/video.webm" type="video/webm"> Your browser is not supported!
                </video>
            </div>

            <div class="u-center-text u-margin-bottom-big">
                <h2 class="heading-secondary">
                    We make people genuinely happy
                </h2>
            </div>

            <div class="row">
                <div class="story">
                    <figure class="story__shape">
                        <img src="img/salt.jpg" alt="Person on a tour" class="story__img">
                        <figcaption class="story__caption">Mary Smith</figcaption>
                    </figure>
                    <div class="story__text">
                        <h3 class="heading-tertiary u-margin-bottom-small">Lorem ipsum dolor sit amet consectetur</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur
                            libero repellat quis consequatur
                            ducimus quam nisi exercitationem omnis earum qui. Aperiam, ipsum sapiente aspernatur libero
                            repellat
                            quis consequatur ducimus quam nisi exercitationem omnis earum qui.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="story">
                    <figure class="story__shape">
                        <img src="img/salt.jpg" alt="Person on a tour" class="story__img">
                        <figcaption class="story__caption">Jack Wilson</figcaption>
                    </figure>
                    <div class="story__text">
                        <h3 class="heading-tertiary u-margin-bottom-small">Lorem ipsum dolor sit amet consectetur</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur
                            libero repellat quis consequatur
                            ducimus quam nisi exercitationem omnis earum qui. Aperiam, ipsum sapiente aspernatur libero
                            repellat
                            quis consequatur ducimus quam nisi exercitationem omnis earum qui.
                        </p>
                    </div>
                </div>
            </div>

            <div class="u-center-text u-margin-top-huge">
                <a href="#" class="btn-text">Read all stories &rarr;</a>
            </div>
        </section>
    </main>

    <?php include('./blocks/footer.php'); ?>
</body>

</html>