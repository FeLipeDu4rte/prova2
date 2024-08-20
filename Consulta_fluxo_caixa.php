<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site Básico</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        header nav {
            margin: 0;
            padding: 0;
        }
        header nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 5px;
            background-color: #444;
            border-radius: 5px;
        }
        header nav a:hover {
            background-color: #000;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #home{
            background-color: #ffff;
            color: #000;
        }

        #home nav a{
            background-color: #444;
        }
    </style>
</head>
<body>
    <?php
        // tabela cidade
            include('include/conexao.php');
            $sql = "SELECT * FROM fluxo_caixa";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die("Erro na consulta SQL: " . mysqli_error($con));
            }
    ?>
    <header>
        <nav>
            <p><a href="index.php" id="home">Home</a>
            <a href="cadastro_fluxo_caixa.html">Cadastro Fluxo de Caixa</a>
            <a href="listar_fluxo_caixa.php">Listagem de Fluxo</a>
            <a href="Consulta_fluxo_caixa.html">Consulta Saldo do Caixa</a>
        </nav>
    </header>
    
    <main>
    <div class="tabela">
        <?php
            $tipo = $_POST['tipo'];
            if($tipo == 'entrada') {
                $sql ="select sum(valor) valor from fluxo_caixa where tipo = 'entrada'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                echo 'Valor Entrada ='.$row['valor'];
            } else if ($tipo == 'saida'){
                $sql ="select sum(valor) valor from fluxo_caixa where tipo = 'saida'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                echo 'Valor Saída ='.$row['valor'];
            } else if ($tipo == 'saldo'){
                $sql = "select sum(case when tipo = 'entrada' then valor else 0 end) -
                                sum(case when tipo = 'saida' then valor else 0 end) as valor from fluxo_caixa";   
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                echo 'Valor Total = '.$row['valor'];
            }
        ?>
    </div>
    </main>
    
    <footer>
        <p>@copywriting | Nuness</p>
    </footer>
</body>
</html>