<section class="section_intro">
    <div>
        <?php
        if (isset($_SESSION['login']) && !is_null($_SESSION['login'])) {
        ?>
            <div class="form">
                <a href="/index.php?action=goAdmin" class="back_button">Espace membre</a>
                <form action="/index.php" method="get">
                    <button type="submit" value="logout" name="action" class="button_form">Déconnexion</button>
                </form>
            </div>
        <?php
        }
        else {
        ?>
            <form action="/index.php" method="post">
                <div class="form">
                    <input class="input_member"  id="name" type="text" name="login" placeholder="Pseudo" />
                    <input class="input_member" id="password" type="password" name="password" placeholder="Mot de passe" />
                    <button type="submit" class="button_form">Connexion</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</section>
