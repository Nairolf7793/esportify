<?php 

require_once "../db/session.php";

if (isset($_SESSION["user"])) {
    unset($_SESSION["user"]);

    header('location: http://localhost:3000');
}
?>