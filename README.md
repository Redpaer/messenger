# messenger
messenger test

```php
$db = mysqli_connect('localhost', '', '','');
```
$db - переменная для подключения к базе данных. В пустых полях нужно указать ваш логин, пароль и название базы.

```php
$result = $db->query("SELECT * FROM `catalog` WHERE 1 ");

if($result == FALSE){
db->query("CREATE TABLE IF NOT EXISTS messanger ( `id` INT(10) NOT NULL AUTO_INCREMENT , `author` VARCHAR(255) NOT NULL , `text` LONGTEXT NOT NULL , `time` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
}
```
Этот фрагмент кода - проверка на существование таблицы каталога. Если данной таблицы нет в базе, то код создаст ее.

