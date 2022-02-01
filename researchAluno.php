<?php
  session_start();
  require_once("config.php");
  $matricula = $_POST['matricula'];
  $aluno = new Alunos();
  $alunos = $aluno->researchMatricula($matricula);

?>


<html>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/5a2d867f6e.js" crossorigin="anonymous"></script>
  <body>
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h1>Resultado da pesquisa</h1>
        <a href="list.php" class="btn btn-primary">Página inicial</a>
      </div>
      <form action="researchAluno.php" method="POST">
        <input type="text" name="matricula">
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</td>
          <th>Nome</td>
          <th>Nascimento</td>
          <th>Matrícula</td>
        </tr>
      </thead>

      <tbody>
        <?php
          foreach($alunos as $aluno)
          {
            $dadosAlunos = '';
            echo $dadosAlunos = "
              <tr>
                <td>$aluno[id]</td>
                <td>$aluno[nome]</td>
                <td>$aluno[nascimento]</td>
                <td>$aluno[matricula]</td>
                <td>
                  <div class='d-flex justify-content-end m-0'>
                    <a class='btn btn-warning' href='updateAluno.php?id=$aluno[id]'><i class='fas fa-edit'></i></a>
                  </div>
                </td>  
                <td>
                  <div class='d-flex justify-content-start m-0'>
                    <a class='btn btn-danger' href='deleteAluno.php?id=$aluno[id]'><i class='fas fa-trash-alt'></i></a>
                  </div>
                </td>  

              </tr>
            ";
          }
        ?>
      </tbody>
    </table>
  </body>
  <script src="script.js"></script>
</html>

