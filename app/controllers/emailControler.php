<?php 
//Carregar o autoload do composer
require __DIR__ . '/../../vendor/autoload.php';  


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//verificar se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Coletar os dados do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $message = $_POST['msg'];

    // Criar uma nova instância do PHPMailer
    $mail = new PHPMailer(true);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    

    try {
        // Configurações do servidor SMTP do Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Definir o servidor SMTP do Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'mazesuporte.negocios@gmail.com';  // Meu email Gmail
        $mail->Password = 'erzo xzin qoca lnsq';  // Minha senha (ou App Password, se 2FA estiver ativada)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Definir remetente e destinatário
        $mail->setFrom($email, $email);
        $mail->addAddress('mazesuporte.negocios@gmail.com', 'Seu Nome');  // Email de destino

        // Definir conteúdo do email
        $mail->isHTML(true);
        $mail->Subject = 'Mensagem de Suporte';
        $mail->Body    = "Nome: $name <br> Assunto: $assunto <br> Mensagem: <br> $message";

        // Enviar o email
        $mail->send();

    } catch (Exception $e) {
        echo "Não foi possível enviar a mensagem";
    }
 }
 ?>
