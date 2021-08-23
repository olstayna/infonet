<?php

include "conexao.php";

$Produto = $_GET["Produto"];
$Email = $_GET["Email"];
$Quantidade = $_GET["Quantidade"];
$Botao = $_GET["Botao"];


// ================== rotina de Inclusao =======================================================
//insert into tb_pedidos (Produto,Email,Quantidade) values (125,'Basico HTML','120.55','2020/01/25');
if ($Botao == "Gravar")
{
	try 
	{
		$Comando=$conexao->prepare("insert into tb_pedidos (Produto,Email,Quantidade) values (?,?,?) ");
		$Comando->bindParam(1, $Produto);
		$Comando->bindParam(2, $Email);
        $Comando->bindParam(3, $Quantidade);

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
//delete from tb_pedidos where Produto = 124;
if ($Botao == "Excluir")
{
	try 
	{
		$Comando=$conexao->prepare("delete from tb_pedidos where Produto = ?");
		$Comando->bindParam(1, $Produto);

		$Comando->execute();

		if ($Comando->rowCount() > 0)
		{
			echo "<script> alert('Exclusao efetuada com sucesso!') </script>";
		}
		else
		{
			echo "<script> alert('Erro na exclusao do registro!') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo "Erro, avisar equipe de TI " . $Erro->getMessage();
	}

}



// ================== rotina de Consultar =======================================================
//select * from tb_pedidos where Produto = 123;
if ($Botao == "Consultar")
{
	//Consulta por bloco --------------------------
	try
	{
		if ($Produto == '')
		{
			$Matriz = $conexao->prepare("select * from tb_pedidos");
		}
		else
		{
			$Matriz = $conexao->prepare("select * from tb_pedidos where Produto = ?");
			$Matriz->bindParam(1, $Produto);
		}

		if ($Matriz->execute())
		{
			while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ))
			{
				echo ' Produto '   . $Linha->PRODUTO . '<br>';
				echo ' Email '    . $Linha->EMAIL . '<br>';
                echo 'Quantidade ' . $Linha->QUANTIDADE . '<br>';
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
//update tb_pedidos set Quantidade=150 where Produto = 124;
if ($Botao == "Alterar")
{
	try 
	{
		$Comando=$conexao->prepare("update tb_pedidos set Quantidade=?,Email=? where Produto = ?");
		$Comando->bindParam(1, $Quantidade);
        $Comando->bindParam(2, $Email);
        $Comando->bindParam(3, $Produto);

		$Comando->execute();

		if ($Comando->rowCount() > 0)
		{
			echo "<script> alert('Alteracao efetuada com sucesso!') </script>";
		}
		else
		{
			echo "<script> alert('Erro na alteracao do registro!') </script>";
		}

	}
	catch (PDOException $Erro)
	{
		echo "Erro, avisar equipe de TI " . $Erro->getMessage();
	}

}