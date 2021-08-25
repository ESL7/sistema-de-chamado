<?php
    require("acoes/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style/chamados.css"/>
    <script src="script/jquery.js"></script>
    <script src="script/acesso.js"></script>
</head>
<body>
    <header> 
        <div id="content">
            <span id="logo">Sistema de Acesso</span>
        </div>
    </header>
    <div id="formulario">
        <form action="acoes/cadastroChamados.php" method="POST">
            <div id="linha">
                <label for="Nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div id="linha">
                <label for="Ramal">Ramal:</label>
                <select name="ramal" id="ramal">
                    <?php
                        $query = $conexao->prepare("SELECT * FROM ramal");
                        $query->execute();
                        $fetchAll = $query->fetchAll();
                        foreach($fetchAll as $ramal){
                            echo '<option value="'.$ramal['ramal'].'">'.$ramal['ramal'].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div id="linha">
                <label for="Ramal">Setor:</label>
                <select name="setor" id="setor">
                    <?php
                        $query = $conexao->prepare("SELECT * FROM setor");
                        $query->execute();
                        $fetchAll = $query->fetchAll();
                        foreach($fetchAll as $setor){
                            echo '<option value="'.$setor['setor'].'">'.$setor['setor'].'</option>';
                        }
                    ?>
                </select>
            </div>
            
            <div id="linha">
                <label for="#">Descrição do problema:</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea> 
            </div>

            <div id="button">
                <button value="Entrar">Entrar</button>
            </div>
        </form>
    </div>
</body>
</html>