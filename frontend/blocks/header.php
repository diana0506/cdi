<?php
    $header_links = array('Acasa' => 'index.php', 'Despre noi' => 'despre-noi.php', 'Produse' => 'produse.php', 'Blog' => 'blog.php', 'Contact' => 'contact.php');
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<div class="navigation">
        <input type="checkbox" class="navigation__checkbox" id="navi-toogle">
        <label for="navi-toogle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>
        <div class="navigation__background">&nbsp;</div>
        <nav class="navigation__nav">
            <ul class="navigation__list">
                <?php
                    foreach($header_links as $k => $v) {
                        ?>
                        <li class="navigation__item">
                            <a class="navigation__link" href="<?= $v ?>"><?= $k ?></a>
                        </li>
                        <?php
                      }
                ?>
                <!-- <li class="navigation__item">
                    <a href="index.html" class="navigation__link">Acasa</a></li>
                <li class="navigation__item">
                    <a href="despre-noi.html" class="navigation__link">Despre noi</a></li>
                <li class="navigation__item">
                    <a href="produse.html" class="navigation__link">Produse</a></li>
                <li class="navigation__item">
                    <a href="blog.html" class="navigation__link">Blog</a></li>
                <li class="navigation__item">
                    <a href="contact.html" class="navigation__link">Contact</a></li> -->
            </ul>
        </nav>
    </div>
    <header class="header header--products">
        <ul class="header__menu">
            <li>
                <a href="tel:+40721969733">0721.969.733</a>
            </li>
            <?php
            foreach($header_links as $k => $v) {
                if (strpos($url, $v) !== false) {
                    ?>
                    <li>
                        <a><?= $k ?></a>
                    </li>
                    <?php
                }else {
                    ?>
                    <li>
                        <a href="<?= ($v == 'index.php' ? '/' : $v) ?>"><?= $k ?></a>
                    </li>
                    <?php
                }
            }
            ?>
            <!-- <li>
                <a href="tel:+40723123123">+40 723 123 123</a>
            </li>
            <li>
                <a href="index.html">Acasa</a>
            </li>
            <li>
                <a href="despre-noi.html">Despre noi</a>
            </li>
            <li>
                <a>Produse</a>
            </li>
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li> -->
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
        <?php
        if($industry) {
            ?>
                <div class="header__overlay header__overlay--<?= $industry ?>"></div>
            <?php
        }else {
            ?>
                <div class="header__overlay"></div>
            <?php
        }
        ?>
    </header>