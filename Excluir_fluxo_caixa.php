<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Registro</title>
    <style>
        body {
            background: linear-gradient(to bottom, #000000, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: #ffffff;
            text-align: center;
        }

        .container {
            background-color: #333333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        p {
            margin-top: 20px;
        }

        a {
            color: #ffffff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #voltar {
            margin-top: 10px;
            padding: 0.2px 15px;
            background-color: #444;
            border-radius: 5px;
            display: inline-block;
        }

        #voltar a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
        }

        #voltar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include('include/conexao.php');
        
        // Caso seja necessario adicionar mais tabelas
        $id = $_GET['id'];
        $tabela = $_GET['tabela'];
        
        // Validação básica para evitar injeção SQL
        $tabelasPermitidas = ['fluxo_caixa'];
        if (!in_array($tabela, $tabelasPermitidas)) {
            die("<h2>Erro: Tabela inválida!</h2>");
        }
        
        // Montagem da consulta de deleção
        $sql = "DELETE FROM $tabela WHERE id=$id";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            echo "<h2>Registro deletado com sucesso!</h2>";
        } else {
            echo "<h2>Erro ao deletar o registro!</h2>";
            echo "<h2>".mysqli_error($con)."</h2>";
        }
        ?>
        <div id="voltar">
            <p><a href="listar_fluxo_caixa.php">Voltar</a></p>
        </div>
    </div>
</body>
</html>
