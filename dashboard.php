<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");
        
        $adm  = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else{
        echo "<script>window.location = 'index.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/dashboard.css">
    <title>Dashboard <?php echo $nome; ?></title>
    <?php
        if($adm){
    ?>
            <script src="script/jquery.js"></script>
            <script src="script/enviarChamado.js"></script>
    <?php        
        }
    ?>
</head>
<body>
    <header> 
        <div id="content">
            <div id="user">
                <span><?php echo $adm ? $nome. " (ADM)" : $nome; ?></span>
            </div>
            <span id="logo">Sistema de Acesso</span>
            <div id="logout">
            <a href="acoes/logout.php"><button>Sair</button></a>
            </div>
        </div>
    </header>

    <div id="content">
        <?php if($adm): ?>
            <div id="tabelaUsuarios">
                <span class="title">Lista de Usuarios</span>
                <table>
                    <thead>
                        <tr>
                            <td>Email</td>
                            <td>Senha</td>
                            <td>Nome</td>
                            <td>ADM</td>
                            <td>ID</td>
                            <td>Excluir</td>
                        </tr>                
                    </thead>
                    <tbody>
                        <?php
                            $query = $conexao->prepare("SELECT * FROM usuarios");
                            $query->execute();
                        
                            $users = $query->fetchAll(PDO::FETCH_ASSOC);

                            for($i = 0; $i < sizeof($users); $i++):
                                $usuarioAtual = $users[$i];
                        ?>
                            <tr>
                                <td><?php echo $usuarioAtual["email"]; ?></td>
                                <td><?php echo $usuarioAtual["senha"]; ?></td>
                                <td><?php echo $usuarioAtual["nome"]; ?></td>
                                <td><?php echo $usuarioAtual["adm"]; ?></td>
                                <td><?php echo $usuarioAtual["id"]; ?></td>
                                <td><button>Excluir</button></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>            
                </table>
            </div>

            <table>
                <h1>Chamados</h1>
                <thead>
                    <tr>
                        <td>Nome:</td>
                        <td>Ramal:</td>
                        <td>Setor:</td>
                        <td>Descrição:</td>
                        <td>Hora chamado:</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $conexao->prepare("SELECT * FROM chamados WHERE Solicitacao = 'Em aberto'");
                        $query->execute();
                        
                        $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
                        for($i = 0; $i < sizeof($chamados); $i++):
                            $chamadoAtual = $chamados[$i];
                    ?>
                    <tr>
                        <td><?php echo $chamadoAtual["nome"]; ?></td>
                        <td><?php echo $chamadoAtual["ramal"]; ?></td>
                        <td><?php echo $chamadoAtual["setor"]; ?></td>
                        <td><?php echo $chamadoAtual["descricao"]; ?></td>
                        <td><?php echo $chamadoAtual["horaChamado"]; ?></td>
                        <td><?php echo $chamadoAtual["Solicitacao"]; ?></td>
                        <td><button class="enviar" idUsuario= "<?php echo $chamadoAtual["id"]; ?>">Concluir</td>
                    </tr>
                        <?php endfor; ?>
                </tbody>
            </table>
            <table>
                <h1>Chamados</h1>
                <thead>
                    <tr>
                        <td>Nome:</td>
                        <td>Ramal:</td>
                        <td>Setor:</td>
                        <td>Descrição:</td>
                        <td>Hora chamado:</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = $conexao->prepare("SELECT * FROM chamados WHERE DATE(horaChamado) = CURRENT_DATE AND Solicitacao = 'Finalizado'") ;
                        $query->execute();
                        
                        $chamados = $query->fetchAll(PDO::FETCH_ASSOC);
                        for($i = 0; $i < sizeof($chamados); $i++):
                            $chamadoAtual = $chamados[$i];
                    ?>
                    <tr>
                        <td><?php echo $chamadoAtual["nome"]; ?></td>
                        <td><?php echo $chamadoAtual["ramal"]; ?></td>
                        <td><?php echo $chamadoAtual["setor"]; ?></td>
                        <td><?php echo $chamadoAtual["descricao"]; ?></td>
                        <td><?php echo $chamadoAtual["horaChamado"]; ?></td>
                        <td><?php echo $chamadoAtual["Solicitacao"]; ?></td>
                    </tr>
                        <?php endfor; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
</body>
</html>