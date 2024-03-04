<?php

// incluir o banco de dados do firebase
include('config.php');

//pegando todos os pontos do firebase
$laco = $database->getReference('dbMotor/')->getSnapshot();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link com o css -->
    <link rel="stylesheet" href="style/index_style.css">
    <!-- link com o google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Mapa</title>
</head>

<body class="center">
    <div class="cell center">
        <div class="header">
            <div class="conteudo center">
                <span class="material-symbols-outlined">
                    menu
                </span>
                <img src="static/logo.png" alt="logo motor trip" class="logo">
                <span class="material-symbols-outlined" id="favorito">
                    favorite
                </span>
            </div>
            <div class="pesquisa center">
                <form action="" class="form-pesquisa center">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    <input type="text" placeholder="Para onde deseja ir?">
                    <span class="material-symbols-outlined">
                        mic
                    </span>
                </form>
            </div>
        </div>
        <!-- carrossel -->
        <div class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        home
                    </span>
                    <h4>Todos</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        local_gas_station
                    </span>
                    <h4>Abastecimento</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        water_drop
                    </span>
                    <h4>Água</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        flash_on
                    </span>
                    <h4>Energia</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        wifi
                    </span>
                    <h4>Internet</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        wc
                    </span>
                    <h4>Banheiro</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        bathtub
                    </span>
                    <h4>Chuveiro</h4>
                </div>
                <div class="carousel-item">
                    <span class="material-symbols-outlined">
                        restaurant
                    </span>
                    <h4>Comida</h4>
                </div>

                <!-- Add more filter items as needed -->
            </div>
            <button class="prev" onclick="prevSlide()" disabled>❮</button>
            <button class="next" onclick="nextSlide()">❯</button>
        </div>
        <!-- cards -->
        <div class="holder center" id="holder">
            <div class="primeiro">
            </div>
            <?php foreach ($laco->getValue() as $card) : ?>
                <?php $url = "static/" . $card['id'] . ".jpg"; ?>
                <div class="segundo center">
                    <div class="imagem">
                        <img src="<?php echo $url ?>" alt="">
                    </div>
                    <div class="descricao">
                        <div class="flex center">
                            <h1><?php echo $card['nome'] ?></h1>
                            <span class="material-symbols-outlined">
                                favorite
                            </span>
                        </div>
                        <h2><?php echo $card['end'] ?></h2>
                        <div class="flex center">
                            <div class="coluna1">

                            </div>
                            <div class="coluna2">

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <button class="popup-button center" onclick="togglePopup()">Ver no mapa <span class="material-symbols-outlined">
                map
            </span></button>

        <!-- conteiner do mapa -->
        <div class="popup-container" id="popupContainer">
            <div class="popup-content">
                <div class="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126418.55911513905!2d-35.02025099397418!3d-8.042165341659707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7ab196f88c446e5%3A0x3c9ef52922447fd4!2sRecife%20-%20PE!5e0!3m2!1spt-BR!2sbr!4v1709326699213!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
        <!-- --------script----------- -->
        <script>
            let currentIndex = 0;
            const totalSlides = document.querySelectorAll('.carousel-item').length;
            const slides = document.querySelector('.carousel-inner');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            function showSlide(index) {
                if (index >= totalSlides || index < 0) {
                    return;
                }

                const translateValue = -index * 33 + '%';
                slides.style.transform = 'translateX(' + translateValue + ')';
                currentIndex = index;

                // Disable/Enable buttons based on current index
                prevButton.disabled = currentIndex === 0;
                nextButton.disabled = currentIndex === 5;
            }

            function togglePopup() {
                const popupContainer = document.getElementById('popupContainer');
                const popBack = document.getElementById('holder');
                const isPopupVisible = getComputedStyle(popupContainer).transform === 'matrix(1, 0, 0, 1, 0, 0)';

                if (isPopupVisible) {
                    // If the popup is currently visible, hide it
                    popupContainer.style.transform = 'translateY(100%)';
                    popupContainer.addEventListener('transitionend', () => {
                        popupContainer.style.display = 'none';
                        popBack.style.display = 'block';
                    }, {
                        once: true
                    }); // Delayed display:none;
                } else {
                    // If the popup is currently hidden, show it
                    popupContainer.style.display = 'block';
                    popBack.style.display = 'none';
                    setTimeout(() => {
                        popupContainer.style.transform = 'translateY(0)';
                    }, 0);
                }
            }
        </script>
</body>

</html>