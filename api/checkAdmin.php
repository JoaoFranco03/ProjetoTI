<?php
//Inicia a Sessao
session_start();
//Verifica se a sessao está ativa e se tem previlegios de Admin
if (!isset($_SESSION['user']) || $_SESSION['privileges'] != 1) {
   header('refresh:5;url=' . $_SERVER['HTTP_REFERER'] . '');
   die("Acesso Restrito");
}
?>