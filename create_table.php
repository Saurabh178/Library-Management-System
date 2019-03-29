<?php

//create table biology to keep biology books
$biologytable = "CREATE TABLE  `lib_mgmt_sys`.`biology` (
    `bio_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebook` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `bio_id` )
    );
    ";

mysqli_query($link, $biologytable);


//create table booklist to keep booklist
$booklisttable = "CREATE TABLE  `lib_mgmt_sys`.`booklist` (
    `S No.` INT( 10 ) NOT NULL AUTO_INCREMENT ,
	`book_id` VARCHAR( 10 ) NOT NULL ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`category` VARCHAR( 50 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebooks` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `S No.` )
    );
    ";

mysqli_query($link, $booklisttable);


//create table chemistry to keep chemistry books
$chemistrytable = "CREATE TABLE  `lib_mgmt_sys`.`chemistry` (
    `chem_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebook` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `chem_id` )
    );
    ";

mysqli_query($link, $chemistrytable);


//create table maths to keep maths books
$mathstable = "CREATE TABLE  `lib_mgmt_sys`.`maths` (
    `maths_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebook` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `maths_id` )
    );
    ";

mysqli_query($link, $mathstable);


//create table novel to keep novel books
$noveltable = "CREATE TABLE  `lib_mgmt_sys`.`novel` (
    `novel_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebook` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `novel_id` )
    );
    ";

mysqli_query($link, $noveltable);


//create table physics to keep physics books
$physicstable = "CREATE TABLE  `lib_mgmt_sys`.`physics` (
    `phy_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
	`totalbooks` int( 10 ) NOT NULL ,
	`availablebook` int( 10 ) NOT NULL ,
    PRIMARY KEY (  `phy_id` )
    );
    ";

mysqli_query($link, $physicstable);


//create table forgotpassword to reset password
$resetpass = "CREATE TABLE  `lib_mgmt_sys`.`forgotpassword` (
    `id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
    `user_id` INT( 10 ) NOT NULL ,
    `resetkey` CHAR( 32 ) NOT NULL ,
	`time` int( 10 ) NOT NULL ,
	`status` VARCHAR( 10 ) NOT NULL ,
    PRIMARY KEY (  `id` )
    );
    ";

mysqli_query($link, $resetpass);


//create table record to keep record of books
$recordtable = "CREATE TABLE  `lib_mgmt_sys`.`record` (
    `record_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
	`user_id` INT( 10 ) NOT NULL ,
	`book_id` VARCHAR( 10 ) NOT NULL ,
    `bookname` VARCHAR( 100 ) NOT NULL ,
    `authorname` VARCHAR( 100 ) NOT NULL ,
    PRIMARY KEY (  `record_id` )
    );
    ";

mysqli_query($link, $recordtable);


//create table rememberme to keep user logged in
$session_login = "CREATE TABLE  `lib_mgmt_sys`.`rememberme` (
    `id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
	`user_id` INT( 10 ) NOT NULL ,
	`authentificator1` CHAR( 20 ) NOT NULL ,
    `f2authentificator2` CHAR( 64 ) NOT NULL ,
    `expires` DATETIME NOT NULL ,
    PRIMARY KEY (  `id` )
    );
    ";

mysqli_query($link, $session_login);


//create table staff to keep record of staff
$stafftable = "CREATE TABLE  `lib_mgmt_sys`.`staff` (
    `staff_id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
	`username` VARCHAR( 50 ) NOT NULL ,
    `password` VARCHAR( 50 ) NOT NULL ,
    PRIMARY KEY (  `staff_id` )
    );
    ";

mysqli_query($link, $stafftable);


//create table users to keep record of users
$usertable = "CREATE TABLE  `lib_mgmt_sys`.`users` (
	`user_id` INT( 10 ) NOT NULL ,
	`username` VARCHAR( 30 ) NOT NULL ,
	`email` VARCHAR( 50 ) NOT NULL ,
	`password` VARCHAR( 64 ) NOT NULL ,
	`mobile` VARCHAR( 10 ) NOT NULL ,
	`dob` VARCHAR( 15 ) NOT NULL ,
    `gender` CHAR( 10 ) NOT NULL ,
	`activation` CHAR( 32 ) NOT NULL ,
	`activation2` CHAR( 32 ) NOT NULL ,
    `profile_pic` VARCHAR( 500 ) NOT NULL ,
	`issued_book` INT( 5 ) NOT NULL ,
    PRIMARY KEY (  `user_id` )
    );
    ";

mysqli_query($link, $usertable);


//insert admin detail by default
$admin = "INSERT INTO staff (staff_id,username,password)
			VALUES ('1','Libranian','123456789As')";

			
mysqli_query($link, $admin);


//create table airport to keep airport data
/*
$airportTableSql = "CREATE TABLE  `start`.`airport` (
    `id` INT( 4 ) NOT NULL AUTO_INCREMENT ,
   `airport_code` VARCHAR( 6 ) NOT NULL ,
   `airport_name` VARCHAR( 255 ) NOT NULL ,
    PRIMARY KEY (  `airport_code` ) ,
    UNIQUE (
    `id`
   )
   );
   ";

mysqli_query($link, $airportTableSql);
*/

//checking table is created or not 
// if (mysqli_query($conn, $airportTableSql)) {
//     echo "Table airport created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }



?>