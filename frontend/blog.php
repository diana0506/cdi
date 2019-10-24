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
<?php include('./blocks/header.php'); ?>
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