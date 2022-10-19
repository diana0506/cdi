<?php
    $header_links = array('Acasa' => 'index', 'Despre noi' => 'despre-noi', 'Produse' => 'produse', 'Blog' => 'blog', 'Contact' => 'contact');
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
                        <a href="<?= ($v == 'index' ? '/' : $v) ?>"><?= $k ?></a>
                    </li>
                    <?php
                }
            }
            ?>

        </ul>
        <div class="header__company-info">
            <div class="header__logo-box" onclick="window.location.href='/'">
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