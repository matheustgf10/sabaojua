<?php
session_start(); // Inicia a sessao
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sabão Jua</title>
        <link rel="shortcut icon" href="img/favicon.png" type="image/ico" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/custom.css">


        <style>
        .form-group {
          margin-top: 30px;
        }
        .form-group .form-control {
          margin-bottom: 10px;
        }
        </style>

    </head>
    <body class="container-fluid">

      <?php if (!isset($_SESSION["user"])) { ?>

          <div class="row">
              <div class="col-md-offset-3 col-md-6">
                  <img src="../images/logo.png" class="center-block" style="margin-top: 80px" />

                  <h3 class="text-center">Painel de contribuinte</h3>
                  <h4>FORMULÁRIO TEMPORARIAMENTE INDISPONÍVEL.</h4>
                  <!-- FORM1 -->
                  <!-- fim FORM2 -->
                  

              </div>
          </div>

      <?php } else { ?>


          <div class="container">
              <div class="row">
                <br /><br />
                <div>

                    <h2>Sabão Jua - Painel de Contribuinte</h2>

                    <!-- FORM 2 -->

                    <!-- fim FORM2 -->
                    <table class="table table-striped table-bordered table-list">
                      <thead>
                        <tr>
                            <th class="text-center" style="width: 60px">Controle</th>
                            <th>CPF</th>
                            <th>NOME</th>
                            <th>Beneficiário</th>
                            <th>Vlr. Corres.</th>
                            <th>Vlr. Repas.</th>
                            <th class="text-center" style="width: 120px"><em class="fa fa-cog"></em></th>
                        </tr>
                      </thead>
                      <tbody id="listaProdutos">

                        <?php

                        require_once "../post/php/conect.php";
                        $bd = Conect::conect();

                        $query = $bd->prepare("SELECT * FROM `contribuinte` ORDER BY controle DESC");
                        $query->execute();

                        while ($item = $query->fetch(PDO::FETCH_OBJ)){
                          $id = $item->id;

                        ?>

                          <tr>
                            <td class="text-center"><?= $item->controle ?></td>
                            <td><?= $item->cpf ?></td>
                            <td><?= $item->nome ?></td>
                            <td><?= $item->beneficiario ?></td>
                            <td><?= "R$" . $item->valor_co ?></td>
                            <td><?= "R$" . $item->valor_re ?></td>
                            <td align="center">
                              <a href="?alterar=<?= $id ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                              <a href="control.php?a=delete&amp;id=<?= $id ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          </div>


      <?php  }  ?>



        <!-- footer starts here -->
        <footer class="footer text-center">
            <p></p>
        </footer>

        <!-- script tags
        ============================================================= -->
        <!--<script src="../post/js/jquery-2.1.1.js"></script>
        <script src="../post/js/smoothscroll.js"></script>
        <script src="../post/js/bootstrap.min.js"></script>-->

    </body>
</html>
