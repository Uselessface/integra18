<?php

require_once ('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// Получение данных из формы
$name = htmlspecialchars($_POST['user-name']); // Очистка данных
$phone = htmlspecialchars($_POST['user-phone']); // Очистка данных

// Настройки SMTP
$mail->isSMTP();
$mail->Host = 'smtp.timeweb.ru';
$mail->SMTPAuth = true;
$mail->Username = 'vezhnevec@integra18.ru'; // Замените на переменные окружения
$mail->Password = 'z580t0KU1'; // Замените на переменные окружения
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

// Настройка письма
$mail->setFrom('vezhnevec@integra18.ru', 'Integra18'); // Укажите имя отправителя
$mail->addAddress('vezhnevec@integra18.ru'); // Кому отправить

$mail->isHTML(true);
$mail->Subject = 'Заявка с Лендинга Integra18';
$mail->Body = '<h2>Заявка с лендинга</h2>';
$mail->Body .= '<hr><p><strong>Имя:</strong> ' . $name . '</p>';
$mail->Body .= '<p><strong>Телефон:</strong> ' . $phone . '</p>';
$mail->AltBody = 'Имя: ' . $name . ' Телефон: ' . $phone;

// Отправка письма

if ($mail->send()) {
header('Location: /after-form.html'); // Перенаправление после успешной отправки
} else {
echo 'Ошибка при отправке сообщения: ' . $mail->ErrorInfo; // Отображение ошибки
}

