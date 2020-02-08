create database congreso default character set utf8 collate utf8_unicode_ci;
create user ucongreso@localhost identified with mysql_native_password by 'Qwerty1.';
grant all on congreso* to ucongreso@localhost;
flush privileges;