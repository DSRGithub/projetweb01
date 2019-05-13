<?php
session_destroy();
print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php\">";
print $_SESSION['etudiant'];
//header("refresh: 0.0005 url=../index.php");