<?php
  session_start();
  require_once("config.php");
  $id = $_GET['id'];
  $aluno = new Alunos();
  $dadosAluno = $aluno->research($id);
  $dadosAluno = $dadosAluno[0];

  if(isset($_POST['acao'])){
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $matricula = $_POST['matricula'];
    $id = $_POST['id'];

    $aluno = new Alunos($nome, $nascimento, $matricula);
    $aluno->update($id);

    $_SESSION['msg'] = "<div class='alert alert-success'>Cadatro " . $id . " atualizado com sucesso</div>";
    header("Location: list.php");

  }
?>


<html>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  
  <body>
    <div class="w-25">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Editar dados do aluno</h2>
        <a href="list.php" class="btn btn-secondary">Voltar</a>
      </div>
      <?php
        if(isset($_POST['acao'])){
          echo "Aluno " . $nome . " atualizado com sucesso";
        }
      ?>
      <form action="updateAluno.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input class="form-control border-secondary" type="text" value="<?php echo $dadosAluno['nome']?>" placeholder="<?php echo $dadosAluno['nome']?>" required name="nome" maxlength="100">
        </div>

        <div class="form-group">
          <label for="nascimento">Data de Nascimento</label>
          <input class="form-control border-secondary" type="date" value="<?php echo $dadosAluno['nascimento']?>" required name="nascimento">
        </div>

        <div class="form-group">
          <label for="matricula">Matrícula</label>
          <input class="form-control border-secondary" type="number" value="<?php echo $dadosAluno['matricula']?>" placeholder="<?php echo $dadosAluno['matricula']?>" required onKeyPress="if(this.value.length==4) return false;" name="matricula">
        </div>
        <input type="text" name="id" hidden value="<?php echo $dadosAluno['id']?>">
        
        <div class="d-flex justify-content-center"><button class="btn btn-primary" type="submit" name="acao">Atualizar</button></div>
      </form>
    </div>

  </body>
</html>