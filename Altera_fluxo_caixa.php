<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cidade</title>
    <link rel="stylesheet" href="../altera.css">
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
    
    <main>
    <div class="container">
        <h1>Alterar Cidade</h1>

        <?php
            include('include/conexao.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM fluxo_caixa WHERE id = $id";
                $result = mysqli_query($con, $sql);
                if ($row = mysqli_fetch_array($result)) {
                    $data = $row['data'];
                    $tipo = $row['tipo'];
                    $valor = $row['valor'];
                    $historico = $row['historico'];
                    $cheque = $row['cheque'];
                } else {
                    echo "<p>Cidade não encontrada.</p>";
                    exit;
                }
            }
        ?>

        <form action="Altera_fluxo_caixa_exe.php" method="post">
            <fieldset>
                <legend>Dados</legend>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" value="<?php echo $data; ?>">
                </div>
                <div>
                    <label for="tipo">Tipo:</label>
                    <input TYPE="Radio" Name="tipo" Value="Entrada" value="<?php echo $tipo; ?>">Entrada
                    <input TYPE="Radio" Name="tipo" Value="Saida" value="<?php echo $tipo; ?>">Saída
                </div>
                <div>
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $valor; ?>">
                </div>
                <div>
                    <label for="historico">Historico:</label>
                    <input type="text" name="historico" id="historico" value="<?php echo $historico; ?>">
                </div>
                <div> 
                    <legend>Caso seja cheque, marque a opção abaixo:</legend>
                    <label for="cheque">Cheque</label>
                    <input type="checkbox" id="cheque" name="cheque" value="1" <?php echo ($cheque == 1 ? 'checked' : ''); ?>/>
                </div>
                <div>
                    <button type="submit">Enviar</button>
                </div>
            </fieldset>
        </form>
    </div>
    </main>
    <footer>
        <p>@copywriting | Nuness</p>
    </footer>
</body>
</html>
