<?php

$Bco = 	'finaflor';
$Usuario = 'root';
$Senha = '';

try
{
    $conexao = new PDO("mysql:host=localhost;dbname=$Bco", "$Usuario", "$Senha");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
}
catch (PDOException $Erro)
{
	echo 'Erro entrar em contato com equipe TI ' . $Erro->getMessage();
}

