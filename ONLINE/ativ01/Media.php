<?php

$CodProd = $_GET["CodProd"];
$Descriçao = $_GET["Descriçao"];
$Valor = $_GET["Valor"];
$Vencimento = $_GET["Vencimento"];
$Valor = $_GET["Valor"];
$Quantidade = $_GET["Quantidade"];

$Total = ($Valor * $Quantidade);

echo 'Código do Produto: ' . $CodProd . '<br>';
echo 'Descrição: ' . $Descriçao . '<br>';
echo 'Valor: ' . $Valor . '<br>';
echo 'Vencimento: ' . $Vencimento . '<br>';
echo 'Quantidade: ' . $Quantidade . '<br>'; 
echo 'Total: ' . $Total . '<br>';
