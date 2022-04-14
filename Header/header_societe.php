    <div class="main-bar">
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div class="logo-header">
                <a href="../../home.php">Seminaire</a>
            </div>
        <ul>
            <li><a href="../../home.php"><i class="fa fa-home" aria-hidden="true"></i>  Accueil  </a></li>
            <li><a href="../../inscription.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a></li>
            <li  ><a href="../participant/liste_participants.php"><i class="fa fa-group" aria-hidden="true"></i> Participants</a></li>
            <li class="active"><a href="../societe/liste_societe.php"><i class="fa fa-building" aria-hidden="true"></i> Sociétes</a></li>
            <li><a href="../../recherche_societe.php"><i class="fa fa-search" aria-hidden="true"></i> Rechercher</a></li>
            <li><a href="../../deconnexion.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Déconnecter [<?php echo($_SESSION['login'])?>]</a></li>
        </ul>
        </nav>
    </div>