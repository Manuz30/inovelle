<?php
   
 class Usuario
 {
     private $nome;
     private $email;
     private $senha;

     public function __construct(){}

     public function create($_nome, $_email, $_senha) {

        $this->nome = $_nome;
        $this->email = $_email;
        $this->email = $_email;
        
     }

     public function getNome() {
         return $this->nome;
     }

     public function getEmail() {
         return $this->email;
     }
    
     public function getSenha() {
         return $this->senha;
     }

    
    public function setNome($_nome) {
        $this->nome = $_nome;
    }
     public function setEmail($_email) {
         $this->email = $_email;
     }

     public function setSenha($_senha) {
        $this->senha = $_senha;
    }


     public function usuario() {

         include_once('./db/conn.php');
         $sql = "CALL piusuario(:nome, :email, :senha)";

         $data = [
             'nome' => $this->nome,
             'email' => $this->email,
             'senha' => $this->senha
         ];

         $statement = $conn->prepare($sql);
         $statement->execute($data);

         return true;
     }

     
    public function listarUsuario() {
        include_once('./db/conn.php');
        $sql = "CALL psListarCliente  ('')";

        $data = $conn->query($sql)->fetchAll();

        return $data;
    }

    public function excluirUsuario($_id) {
        include_once("./db/conn.php");
        $sql = "CALL pddeletar(:id)";

        $data = [
            'id' => $_id
        ];

        $statement = $conn->prepare($sql);
        $statement->execute($data);

        return true;
    }

    public function conectarUsuario($_email, $_senha) {
        include_once("./db/conn.php");
        $senha = md5($_senha);
        $sql = "CALL psLoginUsuario('$_email', '$senha')";
        $statement = $conn->prepare($sql);
       
        $statement->execute();
       
        if ($user = $statement->fetch()) {
            $this->nome = $user["nome"];
            return true;
        }
       
        else {
            return false;
        }
    }

    }