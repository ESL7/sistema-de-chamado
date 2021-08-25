<?php
    require("conexao.php");

        $nome = $_POST['nome'];
        $ramal = $_POST['ramal'];
        $setor = $_POST['setor'];
        $descricao = $_POST['descricao'];

        $query = $conexao->prepare("INSERT INTO chamados (nome, ramal, setor, descricao, horaChamado) VALUES ('$nome', '$ramal', '$setor', '$descricao', NOW())");
        $query->execute();

        echo "<script>window.location = '../chamados.php'</script>"
?>