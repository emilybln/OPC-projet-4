<section class="section_intro">
    <div>
        <?php

        var_dump($_SESSION['login']);
        if (isset($_SESSION['login']) && !is_null($_SESSION['login'])) {
            ?>
            <form action="/index.php?action=goAdmin" method="get">
                <input type="submit" value="Espace membre" class="back_button"/>
            </form>
            <form action="/index.php?action=logout" method="get">
                <input type="submit" value="Déconnexion" class="button_form"/>
            </form>
        <?php
        }
        else {
        ?>
            <form action="/index.php" method="post">
                <div class="form">
                    <input class="input_member"  id="name" type="text" name="login" placeholder="Pseudo" />
                    <input class="input_member" id="password" type="password" name="password" placeholder="Mot de passe" />
                    <input type="submit" value="Connexion" class="button_form" />
                </div>
            </form>
        <?php
        }
        ?>

    </div>
</section>
