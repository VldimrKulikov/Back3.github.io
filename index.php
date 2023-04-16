<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');
  print_r($_POST);
// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
// В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
if (!empty($_GET['save'])) {
// Если есть параметр save, то выводим сообщение пользователю.
print('Спасибо, результаты сохранены.');
}
// Включаем содержимое файла form.php.
include('form.php');
// Завершаем работу скрипта.
exit();
}
//$s = array($_POST['abilities']);
//$sup = array('t','b','c', 'p');
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['fio']) || !preg_match('/^([a-zA-Z\'\-]+\s*|[а-яА-ЯёЁ\'\-]+\s*)$/u', $_POST['fio'])) {
print('Заполните имя.<br/>');
$errors = TRUE;
}

if (empty($_POST['email'])|| !preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $_POST['email'])) {
print('Заполните email.<br/>');
$errors = TRUE;
}

if (empty($_POST['checkbox']) || !($_POST['checkbox'] == 'on' || $_POST['checkbox'] == 1)) {
print('Подтвердите.<br/>');
$errors = TRUE;
}

if (empty($_POST['ability'])|| !is_array($_POST['ability'])) {
print('Выберите способности.<br/>');
$errors = TRUE;
}

if (empty($_POST['limbs']) || !is_numeric($_POST['limbs']) ||($_POST['limbs']<1)||($_POST['limbs']>4)) {
print('Все так плохо?<br/>');
$errors = TRUE;
}

if (empty($_POST['gender'])|| !($_POST['gender']=='M' || $_POST['gender']=='F')) {
print('Вы кто?<br/>');
$errors = TRUE;
}

if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
print('Заполните год.<br/>');
$errors = TRUE;
}

// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
// При наличии ошибок завершаем работу скрипта.
exit();
}
// Сохранение в базу данных.

$user = 'u52804';
$pass = '3418446';
$db = new PDO('mysql:host=localhost;dbname=u52804', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

// // Подготовленный запрос. Не именованные метки.
 try {
	var_dump($_POST['fio']);
	var_dump($_POST['year']);
	var_dump($_POST['biography']);
	var_dump($_POST['email']);
	var_dump($_POST['limbs']);
	var_dump($_POST['gender']);
 $stmt = $db->prepare("INSERT INTO users SET name = ?, year = ?, biography = ?, email = ?, limbs = ?, gender = ?, checkbox = ?");
 $stmt->execute([$_POST['fio'], $_POST['year'], $_POST['biography'], $_POST['email'], $_POST['limbs'], $_POST['gender'], 1]);
 } catch (PDOException $e) {
 print('Error : ' . $e->getMessage());
 exit();
 }

 $user_id = $db->lastInsertId();

 foreach ($_POST['ability'] as $ability) {
 try {
 $stmt = $db->prepare("INSERT INTO user_ab SET user_id = ?, ability_id = ?");
 $stmt->execute([$user_id, $ability]);
 } catch (PDOException $e) {
 print('Error : ' . $e->getMessage());
 exit();
 }
 }
// stmt - это "дескриптор состояния".

// Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(['label'=>'perfect', 'color'=>'green']);

//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
// header('Location: ?save=1');
?>
