<?php
/*
== Arquivo com funções no banco de dados ==
*/
/*
Vamos deixar as configurações só onde deve ser configuração
e lógica só onde é lógica?
*/
require 'config.php';

// Isso aqui ainda vai ficar melhor hohohohoho
try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
} catch(PDOException $e) {
	echo "Falhou a conexão: ".$e->getMessage();
}

// Busca uma frase aleatória no banco
function get_random_phrase($pdo_conn){
    $sql = "SELECT id, frase, autor FROM lista ORDER BY RAND() LIMIT 1";
    $result = $pdo_conn->query($sql);

    return $result->fetch(PDO::FETCH_ASSOC);
}

// Busca total de frases cadastrado
function get_total_frases($pdo_conn){
    $sql = "SELECT COUNT(*) AS num_phrases FROM lista";
    $result = $pdo_conn->query($sql);
    $total = $result->fetch(PDO::FETCH_ASSOC);

    return $total['num_phrases'];
}

// Busca total de usuários cadastrados
function get_total_users($pdo_conn){
    $sql = "SELECT COUNT(*) AS users FROM usuarios";
    $result = $pdo_conn->query($sql);
    $total = $result->fetch(PDO::FETCH_ASSOC);

    return $total['users'];

}
