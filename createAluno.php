<?php
  session_start();
  require_once("config.php");
  if(isset($_POST['acao'])){
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $matricula = $_POST['matricula'];
    $aluno = new Alunos($nome, $nascimento, $matricula);
    $aluno->insert();
    $_SESSION['msg'] = "<div class='alert alert-danger'>Usuário " . $nome . " adicionado com sucesso</div>";    
  }
?>

<html>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  
  <body>

    <div class="w-25">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Cadastrar aluno</h2>
        <a href="list.php" class="btn btn-secondary">Voltar</a>
      </div>
      <?php
        if(isset($_POST['acao'])){
          if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
        }
      ?>
      <form action="createAluno.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input class="form-control border-secondary" type="text" required name="nome" maxlength="100">
        </div>

        <div class="form-group">
          <label for="nascimento">Data de Nascimento</label>
          <input class="form-control border-secondary" type="date" required name="nascimento">
        </div>

        <div class="form-group">
          <label for="matricula">Matrícula</label>
          <input class="form-control border-secondary" type="number" required onKeyPress="if(this.value.length==4) return false;" name="matricula">
        </div>
        
        <div class="d-flex justify-content-center"><button class="btn btn-primary" type="submit" name="acao">Cadastrar</button></div>
      </form>
    </div>

  </body>
</html>
