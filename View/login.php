<?php require 'elements/header.php'?>
    <div class="">
        <div class="ui two column grid">
            <div class="column ui inverted blue  center aligned basic  autoplay" id="titleBack">
                <div class="homeImg">
                    <img src="assets/img/loginImage1.jpg" alt="" width="100%" height="100%">
                </div>
                <div id="mainTitle">
                    <div class="">
                        <h1 class="_title">CICAF</h1>
                    </div>    
                    <h4 class="ui center aligned inverted  header">
                        Cabinet des Informaticiens, Comptables, Auditeurs et Financiers
                    </h4>
                </div>
                
            </div>
            <div class="column">
                <div class="ui padded basic segment">
                <div class="ui padded basic segment">
                    <div class="content-center ">
                        <img src="assets/img/logo.svg" alt="logo cicaf">
                        <h2 class="text-primary w-bold log-h2">Connexion</h2>
                        <div class="">
                            Entrez vos coordonnées pour être identifier    
                        </div>
                    </div>
                    <div class="ui centered card">
                        <div class="content">
                        <?php
                                if(isset($message)) {
                                    echo $message;
                                }
                            ?>
                        <form action="" method="POST" class=" logForm ui form">
                            <div class="field">
                            <input type="text" name="login" id="login"
                            placeholder="Login" autocomplete="off">
                            </div>
                            <div class="field">
                            <input type="password" name="password" id="password"
                            placeholder="Password"
                            ></div>
                            <div class="field">
                                <button class="ui labeled icon fluid primary button">
                                    <i class="unlock icon"></i>
                                    Se connecter
                                </button>
                            </div>

                        </form>
                        </div>
                    </div>
                    <div class="ui hidden divider"></div>
                    <div class="ui three column grid">
                        <a href="#" class="fluid column">Apprendre plus</a>
                        <a href="#" class="fluid column">Apprendre plus</a>
                        <a href="#" class="fluid column">Apprendre plus</a>
                    </div>
                    <div class="hidden divider"></div>
                    <div class="ui medium header">Contactez-nous</div>
                    <div class="ui three column grid fz-o8">
                        <div class="column"><i class="phone icon"></i> +243 89 91 94 707</div>
                        <a href="#" class="column color-inherit"><i class="globe icon"></i> www.cicaf-consulting.org</a>
                        <div class="column"><i class="home icon"></i> 5 bis, KAYUMBA, c/LIMETE</div >
                    </div>
                    <div class="ui hidden divider"></div>
                    <div class="ui center aligned basic segment ">
                            Designed by <span class="bold">Sertek+</span> <span class="ital">sarlu</span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.6.0.js"></script>
    <script src="assets/js/moment.js"></script>
    <script src="assets/js/anime-master/lib/anime.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/css/semantic/semantic.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>