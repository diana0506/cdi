<footer class="footer">

<div class="footer__logo-box">
    <picture class="footer__logo">
        <source srcset="img/cdi_group.svg 1x, img/cdi_group.svg 2x" media="(max-width: 37.5em)">
        <img srcset="img/cdi_group.svg 1x, img/cdi_group.svg 2x" alt="Full logo" src="img/cdi_group.svg">
    </picture>
</div>
<div class="row">
    <div class="col-1-of-2">
        <div class="footer__navigation">
            <ul class="footer__list">
            <?php
             $header_links = array('Acasa' => 'index', 'Despre noi' => 'despre-noi', 'Produse' => 'produse', 'Blog' => 'blog', 'Contact' => 'contact');
             $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            foreach($header_links as $k => $v) {
                if (strpos($url, $v) !== false) {
                    ?>
                    <li class="footer__item">
                        <a class="footer__link footer__link--active"><?= $k ?></a>
                    </li>
                    <?php
                }else {
                    ?>
                    <li class="footer__item">
                        <a class="footer__link" href="<?= ($v == 'index' ? '/' : $v) ?>"><?= $k ?></a>
                    </li>
                    <?php
                }
            }
            ?>
                <!-- <li class="footer__item">
                    <a href="/" class="footer__link">Acasa</a>
                </li>
                <li class="footer__item">
                    <a href="despre-noi.html" class="footer__link">Despre noi</a>
                </li>
                <li class="footer__item">
                    <a class="footer__link">Produse</a>
                </li>
                <li class="footer__item">
                    <a href="blog.html" class="footer__link">Blog</a>
                </li>
                <li class="footer__item">
                    <a href="contact.html" class="footer__link">Contact</a>
                </li> -->
            </ul>
            <div class="company-contact">
                <h4>CDI DISTRIBUTION GRUP , Str. Energiei, nr.2 Dobroiesti, Ilfov</h4>
                <p>
                    <a href="mailto:office@cdigrup.ro">Email: office@cdigrup.ro</a>
                </p>
                <p>
                    <a href="tel:+40721.969.733">Telefon: 0721.969.733</a>
                </p>
                <p><a href="tel:+40727.838.455">Telefon: 0727.838.455</a></p>
                <p><a href="mailto:vanzari@cdigrup.ro">Email: vanzari@cdigrup.ro</a></p>


            </div>
        </div>
    </div>
    <div class="col-1-of-2">
        <p class="footer__copyright">
            <a href="#" class="footer__link">CDI Distribution Grup</a> este o firma privata cu capital integral romanesc, care si-a inceput activitatea in 2004. A urmat o evolutie ascendenta
            <a href="#" class="footer__link">in topul firmelor private de distributie</a> din Romania. Ne-am remarcat in primul rand prin preturi competitive, servicii de calitate, flexibilitate in comunicarea cu clientii promptitudine si comunicare
            24/24 oricand si oriunde pe orice distanta.
        </p>
    </div>
</div>
</footer>
<a class="whatsapp-module" href="https://api.whatsapp.com/send?phone=+40721969733">
    <img src="../img/WhatsApp.svg" alt="">
</a>