<?php
$servername='localhost';     // Your MySql Server Name or IP address here
$dbusername='root';                // Login user id here
$dbpassword='mircosx';                // Login password here
$dbname='biblos_g2';     // Your database name here

connecttodb($servername,$dbname,$dbusername,$dbpassword);
function connecttodb($servername,$dbname,$dbuser,$dbpassword)
{
global $link;
$link=mysql_connect ("$servername","$dbuser","$dbpassword");
if(!$link){die("Could not connect to MySQL");}
mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}


?>