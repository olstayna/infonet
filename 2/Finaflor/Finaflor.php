<?php

include "conexao.php";

$Produto = $_GET["Produto"];
$Fabricacao = $_GET["Fabricacao"];
$Validade = $_GET["Validade"];
$Preco = $_GET["Preco"];
$Botao = $_GET["Botao"];


// ================== rotina de Inclusao =======================================================
//insert into tb_kits (Produto,Fabricacao,Validade,Preco) values (125,'Basico HTML','120.55','2020/01/25');
if ($Botao == "Gravar")
{
	try 
	{
		$Comando=$conexao->prepare("insert into tb_kits (Produto,Fabricacao,Validade,Preco) values (?,?,?,?) ");
		$Comando->bindParam(1, $Produto);
		$Comando->bindParam(2, $Fabricacao);
        $Comando->bindParam(3, $Validade);
        $Comando->bindParam(4, $Preco);

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


// ================== rotina de Exclusao =======================================================
//delete from tb_kits where Produto = 124;
if ($Botao == "Excluir")
{
	try 
	{
		$Comando=$conexao->prepare("delete from tb_kits where Produto = ?");
		$Comando->bindParam(1, $Produto);

		$Comando->execute();

		if ($Comando->rowCount() > 0)
		{
			echo "<script> alert('Exclusao efetuado com sucesso!') </script>";
		}
		else
		{
			echo "<script> alert('Erro na Exclusao do registro!') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo "Erro, avisar equipe de TI " . $Erro->getMessage();
	}

}



// ================== rotina de Consultar =======================================================
//select * from tb_kits where Produto = 123;
if ($Botao == "Consultar")
{
	//Consulta por bloco --------------------------
	try
	{
		if ($Produto == '')
		{
			$Matriz = $conexao->prepare("select * from tb_kits");
		}
		else
		{
			$Matriz = $conexao->prepare("select * from tb_kits where Produto = ?");
			$Matriz->bindParam(1, $Produto);
		}

		if ($Matriz->execute())
		{
			while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ))
			{
				echo 'Produto '   . $Linha->PRODUTO . '<br>';
				echo 'Fabricacao '    . $Linha->FABRICACAO	 . '<br>';
                echo 'Validade ' . $Linha->VALIDADE . '<br>';
                echo 'Preco ' . $Linha->PRECO. '<br>';
				echo '<hr>';
			}
		}
		else
		{
			echo "<script> alert('Erro na Consulta') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo 'Avisar equipe de TI ' . $Erro->getMessage();
	}

}



// ================== rotina de Alteracao =======================================================
//update tb_kits set Preco=150 where Produto = 124;
if ($Botao == "Alterar")
{
	try 
	{
		$Comando=$conexao->prepare("update tb_kits set Preco=?,Fabricacao=?,Validade=? where Produto = ?");
		$Comando->bindParam(1, $Preco);
        $Comando->bindParam(2, $Fabricacao);
        $Comando->bindParam(3, $Validade);
		$Comando->bindParam(4, $Produto);

		$Comando->execute();

		if ($Comando->rowCount() > 0)
		{
			echo "<script> alert('Alteracao efetuado com sucesso!') </script>";
		}
		else
		{
			echo "<script> alert('Erro na Alteracao do registro!') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo "Erro, avisar equipe de TI " . $Erro->getMessage();
	}

}