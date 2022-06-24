<?php

require("./util/PDO_MonSite.class.php");
$monPdo = new PDO_MonSite();
$monPdo->utilisateur_ajouter("root","secret");
?>
