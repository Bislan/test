<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon CMS basé sur mon framework artisanal</title>
        <link rel="stylesheet" href="<?php echo ROOT.VIEWS_DIR; ?>templates/default_styles.css" />
     </head>
    <body>
        <section id="main">
            <header>
                <h1>Mon CMS basé sur mon framework artisanal</h1>
                <nav>
                    <?php echo Application::getContenu('menu'); ?>
                </nav>
            </header>
            <section>
                <?php echo Application::getContenu('content'); ?>
            </section>
            <footer>
                <p>@copy IEPS 2013</p>
            </footer>
        </section>
    </body>
</html>        