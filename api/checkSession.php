<?php
//Inicia a Sessao
session_start();
//Verifica se a sessao está ativa
if (!isset($_SESSION['user'])) {
   header("refresh:5;url=index.php");
   die("Acesso Restrito");
}
?>