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
        <div id="corpo-form">
            <h1>Entrar</h1>
            <!-- Formulario -->
            <form method="POST">
                <input type="email" name="email" placeholder="Usuario">
                <input type="password" name="senha" placeholder="senha">
                <input id="acessar" type="submit" value="ACESSAR">
                <a href="cadastrar.php" id="cadastrar">Ainda não é escrito?<strong>Cadastre-se!</strong></a>
            </form>
        </div>
        <?php
            if (isset($_POST['email']))
            {  
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);            
                
                if (!empty($email) && !empty($senha))
                {   
                    $u ->conectar("bd_projeto_login","localhost","root","");
                    if ($u->msgErro == "")
                    {         
                        if($u->logar($email,$senha))
                        {
                        header("location: AreaPrivada.php");
                        }
                        else 
                        {
                            ?>
                            <div class="msg-erro">
                                Email e/ou senha estão incorretos!
                            </div>
                            <?php
                        }
                    }
                    else 
                    {
                        ?>
                        <div class="msg-erro">
                            <?php  ?>
                        </div>
                        <?php
                    }
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        preencha todos os campos!
                    </div>
                    <?php                                
                }   
            }       
        ?>
    </body>
</html>
 