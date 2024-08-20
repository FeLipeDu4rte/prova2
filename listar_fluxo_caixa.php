<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="listar.css">
</head>
<body>
    <header>
        <nav>
            <p><a href="index.php" id="home">Home</a>
            <a href="cadastro_fluxo_caixa.html">Cadastro Fluxo de Caixa</a>
            <a href="listar_fluxo_caixa.php">Listagem de Fluxo</a>
            <a href="Consulta_fluxo_caixa.html">Consulta Saldo do Caixa</a>
        </nav>
    </header>
    <div class="tabela">
        <?php
        // tabela cidade
            include('include/conexao.php');
            $sql = "SELECT * FROM fluxo_caixa";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($con));
            }
        ?>
        <div class="container">
            <h1>Consulta de fluxo de caixa</h1>
            <table class="table-custom">
                <tr>
                    <th>Código</th>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Historico</th>
                    <th>Cheque</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php
                    while($row = mysqli_fetch_array($result)) {
                        // Data no formato YYYY-MM-DD
                        $data_original = $row['data'];
                        // Cria um objeto DateTime a partir da data original
                        $data = new DateTime($data_original);
                        // Formata a data para o formato DD-MM-YYYY
                        $data_formatada = $data->format('d/m/Y');
                        //tabela cidade
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$data_formatada."</td>";
                        echo "<td>".$row['tipo']."</td>";
                        echo "<td>".'R$'.$row['valor']."</td>";
                        echo "<td>".$row['historico']."</td>";
                        echo "<td>".($row['cheque'] == 1 ? 'Sim' : 'Não')."</td>";
                        echo "<td><a href='Altera_fluxo_caixa.php?id=".$row['id']."'>Alterar</a></td>";
                        echo "<td><a href='Excluir_fluxo_caixa.php?id=".$row['id']."&tabela=fluxo_caixa'>Deletar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
    <footer>
        <p>@copywriting | Nuness</p>
    </footer>
</body>
</html>