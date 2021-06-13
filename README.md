# Projeto com Banco de dados Mysql
#### tela de login, tela de cadastro e tela de área privada.
## Tela de login

![Tela de Login](https://github.com/BrunoLima-dev/Sistema-de-cadastro/blob/main/index.png)

```html
 `
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
         </body>
    </html>
     `
```

## Tela de Cadastro

![tela de cadastro](https://github.com/BrunoLima-dev/Sistema-de-cadastro/blob/main/cadastrar.png)

```html
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
```
