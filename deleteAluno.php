<html>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</html>

<?php
  session_start();
  require_once("config.php");
  $id = $_GET['id'];
  $aluno = new Alunos();
  $aluno->delete($id);
  $_SESSION['msg'] = "<div class='alert alert-danger'>Aluno " . $id . " removido com sucesso</div>";
  header("Location: list.php");
?>