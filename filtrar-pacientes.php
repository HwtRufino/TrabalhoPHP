<?php

// Incluir a conexao com o banco de dados
include_once './connection.php';

//Receber os dados da requisão
$dados_requisicao = $_REQUEST;

// Lista de colunas na tabela
$colunas = [
    0 => 'id',
    1 => 'nome',
    2 => 'rg',
    3 => 'datanasc',
    4 => 'endereco',
    5 => 'telefone',
    6 => 'nome_mae',
    7 =>'nome_pai',
    9 => 'profissao'
];

// Obter a quantidade de registros no banco de dados
$query_qnt_usuarios = "SELECT COUNT(id) AS qnt_usuarios FROM paciente";
$result_qnt_usuarios = $conn->prepare($query_qnt_usuarios);
$result_qnt_usuarios->execute();
$row_qnt_usuarios = $result_qnt_usuarios->fetch(PDO::FETCH_ASSOC);
//var_dump($row_qnt_usuarios);






















$query_usuarios = "SELECT id, nome, rg, datanasc, endereco, telefone, nome_mae, nome_pai, profissao
                    FROM paciente ";
$query_usuarios .= " ORDER BY " . $colunas[$dados_requisicao['order'][0]['column']] . " " . $dados_requisicao['order'][0]['dir'] . " LIMIT :inicio , :quantidade";








$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT);
$result_usuarios->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
$result_usuarios->execute();

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
    //var_dump($row_usuario);
    extract($row_usuario);
    $registro = [];
    $registro[] = $id;
    $registro[] = $nome;
    $registro[] = $salario;
    $registro[] = $idade;
    $dados[] = $registro;
}

//var_dump($dados);

//Cria o array de informações a serem retornadas para o Javascript
$resultado = [
    "draw" => intval($dados_requisicao['draw']), // Para cada requisição é enviado um número como parâmetro
    "recordsTotal" => intval($row_qnt_usuarios['qnt_usuarios']), // Quantidade de registros que há no banco de dados
    "recordsFiltered" => intval($row_qnt_usuarios['qnt_usuarios']), // Total de registros quando houver pesquisa
    "data" => $dados // Array de dados com os registros retornados da tabela usuarios
];

//var_dump($resultado);

// Retornar os dados em formato de objeto para o JavaScript
echo json_encode($resultado);
