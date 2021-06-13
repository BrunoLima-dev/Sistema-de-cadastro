<?php
class Usuario
    {
        private $pdo;
        public $msgErro = "";

        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;
            try {
                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
            } catch (PDOException $e){
                $msgErro = $e->getMessage(); /*tratamento de erro*/
            }
            
        }

        public function cadastrar($nome, $telefone, $email, $senha){
            global $pdo;
            //verificar se já existe o email cadastrado
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
            $sql->bindValue(":e",email);  //aqui vai substitui o :e por email
            $sql->execute(); 
            // se vinher algum id maior que zero é porque essa pessoa ja esta cadastrada
            if  ($sql->rowCount() > 0){  
                return false; // se já estiver cadastrada
            }
            
            // caso não exista, cadastrar
            else {
                $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
                $sql->bindValue(":n",($nome));
                $sql->bindValue(":t",($telefone));
                $sql->bindValue(":e",($email));
                $sql->bindValue(":s",md5($senha));
                $sql->execute();
                return true;
            }
            
        }

        public function logar($email, $senha){
            global $pdo;
            //verificar se o email e senha estão cadastrados, se sim
            $sql = $pdo-> prepare("SELECT id_usuario from usuarios WHERE email = :e AND senha = :s");
            $sql->bindValue(":e",$email); //faz a troca de valores
            $sql->bindValue(":s",md5($senha)); //faz a troca de valores
            $sql->execute(); //executa

            //se for maior entra no sistema
            if ($sql->rowCount() > 0){
                $dado = $sql->fetch(); //transformando os dados que vem do banco em array
                session_start(); //inicia uma sessão
                $_SESSION['id_usuario'] = $dado['id_usuario']; //guarda os dados
                return true; //logado com sucesso
            }
            else {
                return false; //não foi possivel logar
            }

            
        }

    }

?>