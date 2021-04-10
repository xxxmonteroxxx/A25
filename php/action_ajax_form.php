<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') //проверка на асинхронность
{
if (isset($_POST["name"])&& isset($_POST["phonenumber"]) && isset($_POST["email"]) ) 
{ 
if ($_POST['name'] == '') 
{
    echo 'Не заполнено поле Имя';
    return; //проверяем наличие обязательных полей
}
if ($_POST['phonenumber'] == '') 
{
    echo 'Не заполнено поле телефон';
    return;
} 
if ($_POST['email'] == '') 
{
    echo 'Не заполнено поле E-mail';
    return;
} 
    $name = $_POST['name'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $file=fopen('../data/save.txt','a+');
    fputs($file, "Имя: ".$name." Телефон: ".$phonenumber." Email: ".$email."\n"."\n");        //  записываем текстовое значение поля в файл
    fclose($file);
    mail("Gooseipad3@gmail.com", "Заявка с сайта", "Имя:".$name."Телефон:".$phonenumber.". E-mail: ".$email ,"From: email2@yandex.ru \r\n"); //здесь делаем отправку заявки на почту.
        echo '<div class="text-center">Заявка отправлена!<div>';
    	return; //возвращаем сообщение пользователю
    }
       
}
?>