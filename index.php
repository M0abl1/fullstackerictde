<?php include("head.php"); ?>


<body>
    <?php include("topbar.php"); ?>

    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Bolos</h2>
                <h1 class="display-4 text-uppercase">Escolha um e aproveite</h1>
            </div>
            <div class="tab-class text-center">
                <div class="tab-content">

                    <?php include("bolos.php"); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Equipe-->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Equipe</h2>
                <h1 class="display-4 text-uppercase">Melhores Funcionarios</h1>
            </div>
            <!-- chef 1-->
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid " src="img/chef1.jpg" alt="">

                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">Joaquin Moedas</h4>
                            <p class="text-white m-0">Provador de Cozinheira</p>
                        </div>
                    </div>
                </div>
                <!--chef 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/chef2.jpg" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">

                            </div>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">Segundinho </h4>
                            <p class="text-white m-0">Cozinheiro</p>
                        </div>
                    </div>
                </div>

                <!--chef 3 -->

                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/chef3.jpg" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">

                            </div>
                        </div>
                        <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">Vinicius hot dog</h4>
                            <p class="text-white m-0">Cozinheiro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- feedback -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">feedback</h2>
                <h1 class="display-4 text-uppercase">Melhores Clientes</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid flex-shrink-0" src="img/cliente1.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-3">
                            <h4 class="text-primary text-uppercase mb-1">Guilherme</h4>
                            <span>Estagiario</span>
                        </div>
                    </div>
                    <p class="mb-0">Melhor bolo da minha vida.
                    </p>
                </div>
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid flex-shrink-0" src="img/cliente2.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-3">
                            <h4 class="text-primary text-uppercase mb-1">Kaike</h4>
                            <span>Politico</span>
                        </div>
                    </div>
                    <p class="mb-0">Melhor empresa pra fazer um caixa 2
                    </p>
                </div>
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid flex-shrink-0" src="img/cliente3.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-3">
                            <h4 class="text-primary text-uppercase mb-1">Thigas</h4>
                            <span>Garoto de programa</span>
                        </div>
                    </div>
                    <p class="mb-0"> Melhor doce da cidade é na doce encanto
                    </p>
                </div>
                <div class="testimonial-item bg-dark text-white border-inner p-4">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid flex-shrink-0" src="img/testimonial-4.jpg" style="width: 60px; height: 60px;">
                        <div class="ps-3">
                            <h4 class="text-primary text-uppercase mb-1">Gabriela</h4>
                            <span>Cozinheira</span>
                        </div>
                    </div>
                    <p class="mb-0">Melhor parte e o provador de cozinheiras rs rs
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>