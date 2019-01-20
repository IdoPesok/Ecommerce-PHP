<?php

session_start();

session_unset();
session_destroy();

header("Location: ../products/index.php");
exit();