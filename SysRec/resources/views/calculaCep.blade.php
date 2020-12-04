<?php
/* O código abaixo foi desenvolvido na vídeo aula, na qual eu ensino com usar a Api dos correios, para calcular o frete de um determinado produto
     * Video: https://www.youtube.com/watch?v=61-klmvyUvA
     * www.scriptmundo.com
     * = Este código foi atualizado (06/02/2019) , portando algumas coisas estão diferentes do video
     */

use phpDocumentor\Reflection\Types\Integer;

$cep_origem = "19920202";     // Seu CEP , ou CEP da Loja
$cep_destino = $_REQUEST['cep']; // CEP do cliente, que irá vim via GET
/* DADOS DO PRODUTO A SER ENVIADO */
$peso          = 2;
$valor         = 100;
$tipo_do_frete = '41106'; //Sedex: 40010   |  Pac: 41106
$altura        = 6;
$largura       = 20;
$comprimento   = 20;
$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
$url .= "nCdEmpresa=";
$url .= "&sDsSenha=";
$url .= "&sCepOrigem=" . $cep_origem;
$url .= "&sCepDestino=" . $cep_destino;
$url .= "&nVlPeso=" . $peso;
$url .= "&nVlLargura=" . $largura;
$url .= "&nVlAltura=" . $altura;
$url .= "&nCdFormato=1";
$url .= "&nVlComprimento=" . $comprimento;
$url .= "&sCdMaoProria=n";
$url .= "&nVlValorDeclarado=" . $valor;
$url .= "&sCdAvisoRecebimento=n";
$url .= "&nCdServico=" . $tipo_do_frete;
$url .= "&nVlDiametro=0";
$url .= "&StrRetorno=xml";
$xml = simplexml_load_file($url);
$frete =  $xml->cServico;
$valor = intval($frete->Valor);
$prazo = $frete->PrazoEntrega;
echo "  <div class='flex-w flex-sb-m p-b-12'>
            <span class='s-text18 w-size19 w-full-sm'>
                Valor PAC:
            </span>

            <span class='m-text21 w-size20 w-full-sm'>
                <input style='background-color:transparent;' class='total' type='text' disabled value='$valor'>
            </span>
        </div>

        <!--  -->
        <div class='flex-w flex-sb-m p-b-12'>
            <span class='s-text18 w-size19 w-full-sm'>
                Prazo:
            </span>
            <span class='m-text21 w-size20 w-full-sm'>
                <input style='background-color:transparent;' id='prazoTempo' type='text' disabled value='$prazo'>
            </span>
        </div>";
