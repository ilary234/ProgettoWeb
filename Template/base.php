<!DOCTYPE html>
<html lang="it">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <header>
            <!--<h1>Gruppi M&P</h1>-->
            <div class="row">
                <nav class="col-12">
                    <ul class="row nav text-center">
                        <li class="nav-item col-3 col-sm-auto"><a class="nav-link" href="#">Gruppi</a></li>
                        <li class="nav-item col-3 col-sm-auto"><a class="nav-link" href="#">Annunci</a></li>
                        <li class="nav-item col-3 col-sm-auto ms-auto"><a class="nav-link" href="#">Login</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <?php
                if(isset($templateParams["nome"])){
                    require($templateParams["nome"]);
                }
            ?>
        </main>
        <footer>
            <div class="row">
                <nav class="col-12">
                    <ul class="row nav text-center justify-content-center">
                        <li class="nav-item col-5 col-sm-auto"><a class="nav-link" href="#">AlmaEsami</a></li>
                        <li class="nav-item col-5 col-sm-auto"><a class="nav-link" href="#">Virtuale</a></li>
                        <li class="nav-item col-5 col-sm-auto"><a class="nav-link" href="#">Studenti Online</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
        <?php
            if(isset($templateParams["js"])):
                foreach($templateParams["js"] as $script):
        ?>
        <script src="<?php echo $script; ?>"></script>
        <?php
            endforeach;
        endif;
        ?>
    </body>
</html>