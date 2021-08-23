<?php

include "conexao.php";

$Nome = $_GET["Nome"];
$CPF = $_GET["CPF"];
$Email = $_GET["Email"];
$Telefone = $_GET["Telefone"];
$Endereco = $_GET["Endereco"];
$Senha = $_GET["Senha"];
$Botao = $_GET["Botao"];


// ================== rotina de Inclusao =======================================================
//insert into tb_clientes (Nome,CPF,Email,Telefone,Endereco,Senha) values (125,'Basico HTML','120.55','2020/01/25');
if ($Botao == "Cadastrar")
{
	try 
	{
		$Comando=$conexao->prepare("insert into tb_clientes (Nome,CPF,Email,Telefone,Endereco,Senha) values (?,?,?,?,?,?) ");
		$Comando->bindParam(1, $Nome);
		$Comando->bindParam(2, $CPF);
		$Comando->bindParam(3, $Email);
        $Comando->bindParam(4, $Telefone);
        $Comando->bindParam(5, $Endereco);
        $Comando->bindParam(6, $Senha);

		$Comando->execute();

		if ($Comando->rowCount() > 0)
		{
			echo "<script> alert('Cadastro efetuado com sucesso!') </script>";
		}
		else
		{
			echo "<script> alert('Erro na gravacao do registro!') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo "Erro, avisar equipe de TI " . $Erro->getMessage();
	}
}
