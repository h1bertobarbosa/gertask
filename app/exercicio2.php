<?php
session_start();

if (verificaLoginSessao() || verificaLoginCookie()) {

    executarRedirecionamento();
}

function executarRedirecionamento()
{
    header("Location: http://www.google.com");
    exit();
}

function verificaLoginSessao()
{
    if (isset($_SESSION['loggedin'])) {
        return true;
    }

    return false;
}

function verificaLoginCookie()
{
    if (isset($_COOKIE['Loggedin'])) {
        return true;
    }

    return false;
}
