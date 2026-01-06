<!DOCTYPE html>
<html lang="it">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <!--<h1>Gruppi M&P</h1>-->
            <div class="row">
                <nav class="col-12">
                    <ul class="row nav text-center">
                        <li class="nav-item col-3 col-sm-auto"><a class="nav-link" href="index.php">Gruppi</a></li>
                        <li class="nav-item col-3 col-sm-auto"><a class="nav-link" href="annunci.php">Annunci</a></li>
                        <li class="nav-item col-3 col-sm-auto ms-auto">
                            <?php if(isset($_SESSION['username'])): ?>
                                <a class="nav-link" href="areaRiservata.php">Login</a>
                            <?php else: ?>
                                <a class="nav-link" href="login.php">Login</a>
                            <?php endif; ?>
                        </li>
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
                        <li class="nav-item col-4 col-sm-auto"><a class="nav-link" href="https://almaesami.unibo.it">AlmaEsami</a></li>
                        <li class="nav-item col-4 col-sm-auto"><a class="nav-link" href="https://virtuale.unibo.it/">Virtuale</a></li>
                        <li class="nav-item col-4 col-sm-auto"><a class="nav-link" href="https://studenti.unibo.it/">Studenti Online</a></li>
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
<script>
    function updateFooterHeight() {
        const footer = document.querySelector('footer');
        if (footer) {
            document.documentElement.style.setProperty(
                '--footer-height',
                footer.offsetHeight + 'px'
            );
        }
    }

    window.addEventListener('load', updateFooterHeight);
    window.addEventListener('resize', updateFooterHeight);
</script>