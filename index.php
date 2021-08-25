<?php
    session_start();

    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        echo "<script>window.location = 'dashboard.php'</script>";
    }
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Sistema de acesso</title>
        <link rel="stylesheet" type="text/css" href="style/acesso.css" />
        <script type="text/javascript" src="script/jquery.js"></script>
        <script type="text/javascript" src="script/acesso.js"></script>
    </head>
    <body>
        <header>Sistema de acesso</header>

        <div id="mensagem"></div>

        <div id="formulario">
            <form id="formularioLogin">
                <span class="title">Acesse sua conta</span>

                <div id="linha">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" />
                </div>

                <div id="linha">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" />
                </div>

                <div id="button">
                    <button id="btnEntrar">Entrar</button>
                </div>
            </form>
        </div>
    </body>
</html>