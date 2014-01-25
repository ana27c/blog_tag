<?php

//on passe le cookie sid à -1
setcookie('sid', '', -1);
//on renvoit à la page d'accueil
header('Location: index.php');