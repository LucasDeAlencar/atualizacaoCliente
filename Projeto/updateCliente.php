<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $token = $_GET['token'];
    $clienteID = $_GET['clienteID'];
    $primeiroNome = $_GET['primeiroNome'];
    $senha = $_GET['senha'];
    
    if ($token == "daazi2020") {
        include_once "db_modelo.php";
        $sql = "UPDATE cliente SET primeiroNome = ?, senha = ? WHERE id = ?";
        $statement = $pdo->prepare($sql);

        $statement->bindParam(1, $primeiroNome);
        $statement->bindParam(2, $senha);
        $statement->bindParam(3, $clienteID);

        $statement->execute();
       // $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        //echo "<pre>".print_r($results)."</pre"; 
        //echo$json = json_encode($results);
        echo "Registro alterado com sucesso";
    
    }else{
        echo "Não autorizado.";
    }
} else {
    echo "Acesso Negado.";
}
