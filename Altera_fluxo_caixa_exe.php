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
    </style>
<?php
include('include/conexao.php');

if (isset($_POST['id'], $_POST['data'], $_POST['tipo'], $_POST['valor'], $_POST['historico'], $_POST['cheque'])) {
    $id = $_POST['id'];
    $data = $_POST['data'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $historico = $_POST['historico'];
    $cheque = isset($_POST['cheque']) ? 1 : 0;

    $sql = "UPDATE fluxo_caixa SET data = '$data', tipo = '$tipo', valor = '$valor', historico = '$historico', cheque = $cheque WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<h2>Dados do fluxo alterado com sucesso!</h2>";
    } else {
        echo "<h2>Erro ao alterar dados!</h2>";
        echo "<p>" . mysqli_error($con) . "</p>";
    }
} else {
    echo "<h2>Dados incompletos.</h2>";
}
?>
<p><a href="listar_fluxo_caixa.php">Voltar</a></p>
