<?php

require_once "../config/session.php";

session_destroy();
unset($_SESSION);

header ('location: ../index.php');