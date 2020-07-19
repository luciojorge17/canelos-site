<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('d/m/Y H:i:s');
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$msg = $_POST['mensagem'];
include 'conf.php';
$mensagem = '
  <html>
    <div style="font-family: Arial;">
      <p style="font-size: 12px;">
        Contato feito através do site em ' . $hoje . '
      </p>
      <p style="font-size: 12px;">
        Nome: ' . $nome . ' <br>
        E-mail: ' . $email . ' <br>
        Telefone: ' . $telefone . '<br>
        Mensagem: ' . $msg . '
      </p>
    </div>
  </html>';
if (enviaEmail($mensagem)) {
  echo json_encode(['status' => 1]);
} else {
  echo json_encode(['status' => 0]);
}
