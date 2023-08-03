<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/projeto_47/db/conexao.php';


class Admin {
    private $id_admin;
    private $nome_admin;
    private $email_admin;
    private $senha_admin;
   
    

    public function __construct($id_admin = false)
    {
        if ($id_admin) {
            $this->id_admin = $id_admin;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT id_admin, nome_admin, email_admin, senha_admin,  FROM admins WHERE id_admin = :id_admin";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_admin', $this->id_admin);
        $stmt->execute();

        $usuario = $stmt->fetch();
        $this->id_admin = $usuario['id_admin'];
        $this->nome_admin = $usuario['nome_admin'];
        $this->email_admin = $usuario['email_admin'];
        $this->senha_admin= $usuario['senha_admin'];
       
       
    }

    public function criar($nome_admin, $email_admin, $senha_admin)
    {
        $query = "INSERT INTO admins (nome_admin, email_admin, senha_admin) VALUES (:nome_admin, :email_admin, :senha_admin)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome_admin', $nome_admin);
        $stmt->bindValue(':email_admin', $email_admin);
        $stmt->bindValue(':senha_admin', $senha_admin);
        $stmt->execute();
        $this->id_admin = $conexao->lastInsertid();
        return $this->id_admin;
    }

    public static function listar()
    {
        $query = "SELECT * FROM admins";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE admins SET nome_admin = :nome_admin, email_admin = :email_admin, senha_admin = :senha_admin,  = : WHERE id_admin = :id_admin";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":nome_admin", $this->nome_admin);
        $stmt->bindValue(":email_admin", $this->email_admin);
        $stmt->bindValue(":senha_admin", $this->senha_admin);
        $stmt->execute();
    }

    public function deletar()
    {
        $query = "DELETE FROM admins WHERE id_admin = :id_admin";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_admin', $this->id_admin);
        $stmt->execute();
    }

    public static function logar ($email_admin, $senha_admin) 
    {
        $query = "SELECT * FROM admins WHERE email_admin =:email_admin LIMIT 1";
        $conexao = Conexao::conectar();
        $stmt =$conexao->prepare($query);
        $stmt->bindValue(':email_admin',$email_admin);
        $stmt->execute();
        $registro = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(count($registro)>0 && password_verify($senha_admin, $registro['senha_admin'])){
        session_destroy();
        session_start();
        session_regenerate_id(true);
        $_SESSION['admin']['id'] = $registro ['id_admin'];
        $_SESSION['admin']['nome'] = $registro ['nome_admin'];
        $_SESSION['admin']['email'] = $registro ['email_admin'];
        $_SESSION['admin']['inicio'] = time ();
        $_SESSION['admin']['expira'] = 900;

        header('Location:/projeto_47/views/admin/painel.php');
        exit();
        }
} 
}
