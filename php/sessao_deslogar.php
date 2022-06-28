<?php

    session_start();

    $_SESSION['email'] = "";
    $_SESSION['logged'] = "";

    session_unset();
    session_destroy();

    echo json_encode("OK");
?>