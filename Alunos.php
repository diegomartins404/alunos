<?php
  require_once("config.php");
  class Alunos {
    public function __construct($nome='', $nascimento='', $matricula=''){
      $this->setNome($nome);
      $this->setNascimento($nascimento);
      $this->setMatricula($matricula);
    }
  
    private $nome;
    private $nascimento;
    private $matricula;

    public function getNome(){
      return $this->nome;
    }
    public function setNome($value){
      $this->nome = $value;
    }

    public function getNascimento(){
      return $this->nascimento;
    }
    public function setNascimento($value){
      $this->nascimento = $value;
    }

    public function getMatricula(){
      return $this->matricula;
    }
    public function setMatricula($value){
      $this->matricula = $value;
    }

    public function research($id){

      $sql = new Sql();
      $results = $sql->select("SELECT * FROM alunos WHERE id = :ID", array(
        ':ID' => $id
      ));
      return $results;
    }

    public function researchMatricula($matricula){
      $sql = new Sql();
      $results = $sql->select("SELECT * FROM alunos WHERE matricula = :MATRICULA", array(
        ':MATRICULA' => $matricula
      ));
      return $results;
    }

    public function insert()
    {
      $sql = new Sql();
      $results = $sql->select("INSERT INTO alunos (nome, nascimento, matricula) VALUES (:NOME, :NASCIMENTO, :MATRICULA)", array(
        ':NOME' => $this->getNome(),
        ':NASCIMENTO' => $this->getNascimento(),
        ':MATRICULA' => $this->getMatricula()
      ));
      return $results;
    }

    public function update($id){
      $sql = new Sql();
      $results = $sql->select("UPDATE alunos SET nome = :NOME, nascimento = :NASCIMENTO, matricula = :MATRICULA WHERE id = :ID", array(
        ':NOME' => $this->getNome(),
        ':NASCIMENTO' => $this->getNascimento(),
        ':MATRICULA' => $this->getMatricula(),
        ':ID' => $id
      ));
      return $id;
    }

    public function delete($id){
      $sql = new Sql();
      $sql->select("DELETE FROM alunos WHERE id = :ID", array(
        ':ID' => $id
      ));
    }
  }
?>