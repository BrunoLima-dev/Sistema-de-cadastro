<?php
    require_once 'CLASSES/usuarios.php';
    $u = new usuario;

?>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Projeto Login</title>
</head>
<body>
    <div id="corpo-form-card">
        <h1>Cadastrar</h1>
        <!-- Formulario -->
        <form method="POST" >
            <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
            <input type="text" name="telefone" placeholder="telefone" maxlength="30">
            <input type="email" name="email" placeholder="email" maxlength="40">
            <input type="password" name="senha" placeholder="senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirmar Senha">
            <input id="acessar" type="submit" value="Cadastrar"> 
        </form>         
    </div>
    <?php
        //verificar se a pessoa clicou no butão
        if (isset($_POST['nome']))
        {
            $nome = addslashes($_POST['nome']);//  addslashes para evitar a entrada de script malicioso
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confirmaSenha = addslashes($_POST['confSenha']);
            // verificar se esta preenchido
            if (!empty($nome)  &&!empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmaSenha))
            {
                $u ->conectar("bd_projeto_login","localhost","root","");
                if ($u->msgErro == "") //esta tudo certo ok
                {
                    if($senha == $confirmaSenha)
                    {
                        if($u->cadastrar($nome,$telefone,$email,$senha,$senha))
                        {   
                            ?>
                                <div id="msg-sucesso">
                                    Cadastrado com Sucesso! Acesse para entrar!
                                </div>                            
                            <?php
                        }
                        else 
                        {
                            ?>
                                <div class="msg-erro">
                                    echo "email já cadastrado!
                                </div>                            
                            <?php
                        }   
                    }
                    else 
                    {
                        ?>
                            <div class="msg-erro">
                                senha e confirma senha não correspondem!
                            </div>                            
                        <?php
                        
                    }
                }
                else 
                {
                    ?>
                        <div class="msg-erro">
                            <?php echo "Erro: ".$u->msgErro;?>
                        </div>                            
                    <?php
                    
                }

            }else 
            {
                ?>
                    <div class="msg-erro">
                        Preencha todos os campos!
                    </div>                            
                <?php                
            }
        }
    ?>
</body>
</html>