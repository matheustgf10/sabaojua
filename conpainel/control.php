<?php
session_start(); // Inicia a sessão

require_once "../post/php/conect.php";
$bd = Conect::conect();

if (!isset($_GET["a"])) {
  header("location: ../");
}

if ($_GET["a"] == "logar") {
  $sql = $bd->prepare("SELECT * FROM login WHERE user = ? AND senha = ? LIMIT 1");
  $sql->bindValue(1, $_POST['login']);
  $sql->bindValue(2, $_POST['senha']);
  if ($sql->execute()){
    $_SESSION['user'] = $_POST['login'];
    header('location: ./');

  }
}

if ($_GET["a"] == "salvar") {

  $sql = $bd->prepare("INSERT INTO contribuinte (controle, cpf, nome, beneficiario, data, qtd, valor_co, valor_re) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $sql->bindValue(1, $_POST['controle']);
  $sql->bindValue(2, $_POST['cpf']);
  $sql->bindValue(3, $_POST['nome']);
  $sql->bindValue(4, $_POST['beneficiario']);
  $sql->bindValue(5, $_POST['data']);
  $sql->bindValue(6, $_POST['qtd']);
  $sql->bindValue(7, $_POST['valor_co']);
  $sql->bindValue(8, $_POST['valor_re']);

  if ($sql->execute()){
    header('location: ./');
  }
}

if ($_GET["a"] == "alterar") {

  $sql = $bd->prepare("UPDATE contribuinte SET controle = ?, cpf =  ?, nome = ?, beneficiario = ?,data = ?, qtd = ?, valor_co = ?, valor_re = ? WHERE id = ?");
  $sql->bindValue(1, $_POST['controle']);
  $sql->bindValue(2, $_POST['cpf']);
  $sql->bindValue(3, $_POST['nome']);
  $sql->bindValue(4, $_POST['beneficiario']);
  $sql->bindValue(5, $_POST['data']);
  $sql->bindValue(6, $_POST['qtd']);
  $sql->bindValue(7, $_POST['valor_co']);
  $sql->bindValue(8, $_POST['valor_re']);
  $sql->bindValue(9, $_POST['id']);


  if ($sql->execute()){
    header('location: ./');
  }
  
}

if ($_GET["a"] == "delete"){
  $sql = $bd->prepare("DELETE FROM contribuinte WHERE id = ?");
  $sql->bindValue(1, $_GET['id']);

  if ($sql->execute()){
    header("location: ./");
  }
}

if ($_GET["a"] == "bc") {
  $sql = $bd->prepare("SELECT *, DATE_FORMAT(data, '%d/%m/%Y') AS data_format FROM contribuinte WHERE controle = ?");
  $sql->bindValue(1, $_POST['controle']);
  if ($sql->execute()){
    while ($contr = $sql->fetch(PDO::FETCH_OBJ)){;
      print ("
      <tr>
        <td>$contr->controle</td>
        <td style='text-align: left'>$contr->nome</td>
        <td>$contr->beneficiario</td>
        <td>$contr->data_format</td>
        <td>$contr->qtd</td>
        <td>R$ $contr->valor_co</td>
        <td>R$ $contr->valor_re</td>
      </tr>
      ");
    }
  }else{
    print 'erro';
  }
}
?>
