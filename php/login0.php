<?
    include('config/connect.php');

    // # проверям логин
    // if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    // {
    //     $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    // }
    //
    // if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    // {
    //     $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    // }

    # проверяем, не сущестует ли пользователя с таким именем
    // $query = mysqli_query($link, "SELECT COUNT(id_user) FROM users WHERE login='".$_POST['login']."'");
    // if(mysqli_num_rows($query) > 0)
    // {
    //     echo "Пользователь с таким логином уже существует в базе данных"; exit;
    // }

    # Если нет ошибок, то добавляем в БД нового пользователя
    // echo $_POST['login'].' - login,'.$_POST['password'].'-password';
    $login = $_POST['login'];

    # Убераем лишние пробелы и делаем двойное шифрование
    $password = trim($_POST['password']);

    mysqli_query($connection_link,"INSERT INTO users SET login='".$login."', passwd='".$password."'") or die(mysqli_error);
    header("Location: ../../index.html"); exit();
?>
