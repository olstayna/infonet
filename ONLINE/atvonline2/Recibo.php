<?php

$Comanda = $_GET["Comanda"];
$Valor = $_GET["Valor"];
$Genero = $_GET ["Genero"];

echo '*** RECIBO *** '. '<br><br>';
echo 'Comanda Nº: '. $Comanda . '<br>';
echo 'Valor do Gasto: ' . $Valor . '<br>';
echo 'Valor Final: ' . Recibo($Valor,$Genero);

function Recibo($Vl,$Gen)
{
    if($Gen == 'F')
    {
        $VlFinal = $Vl - ($Vl * 5/100);
    }
    else{
        $VlFinal = $Vl;
    }
    return $VlFinal;
}
