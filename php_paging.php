<!doctype html>

<html>

<head>
<title></title>

</head>

<body bgcolor="#ffffff" text="#000000" link="#0000ff" vlink="#800080" alink="#ff0000">
<?
require "config.php";          

if (empty($_GET['start'])) {
$start=0;
$p_f=0;
}

$page_name="php_paging.php"; 

$start=$_GET['start'];							
if(!($start > 0)) {                         
$start = 0;
}

$eu = ($start -0);                
$limit = 2;                                 
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 



$query2=" SELECT * FROM libro";
$result2=mysql_query($query2);
echo mysql_error();
$nume=mysql_num_rows($result2);

$bgcolor="#f1f1f1";
echo "<TABLE width=50% align=center  cellpadding=0 cellspacing=0> <tr>";
echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>ID</font></td>";

echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Name</font></td>";
echo "<td  bgcolor='dfdfdf' >&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Class</font></td>";
echo "<td  bgcolor='dfdfdf'>&nbsp;<font face='arial,verdana,helvetica' color='#000000' size='4'>Mark</font></td></tr>";

$query=" SELECT * FROM libro limit $eu, $limit ";
$result=mysql_query($query);
echo mysql_error();

while($noticia = mysql_fetch_array($result))
{
if($bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}

echo "<tr >";
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$noticia[0]</font></td>"; 

echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$noticia[1]</font></td>"; 
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$noticia[2]</font></td>"; 
echo "<td align=left bgcolor=$bgcolor id='title'>&nbsp;<font face='Verdana' size='2'>$noticia[4]</font></td>"; 

echo "</tr>";
}
echo "</table>";



$p_limit=8; 


$p_f=$_GET['p_f'];								
if(!($p_f > 0)) {                        
$p_f = 0;
}




$p_fwd=$p_f+$p_limit;
$p_back=$p_f-$p_limit;

echo "<table align = 'center' width='50%'><tr><td  align='left' width='20%'>";
if($p_f<>0){print "<a href='$page_name?start=$p_back&p_f=$p_back'><font face='Verdana' size='2'>PREV $p_limit</font></a>"; }
echo "</td><td  align='left' width='10%'>";

if($back >=0 and ($back >=$p_f)) { 
print "<a href='$page_name?start=$back&p_f=$p_f'><font face='Verdana' size='2'>PREV</font></a>"; 
} 

echo "</td><td align=center width='30%'>";
for($i=$p_f;$i < $nume and $i<($p_f+$p_limit);$i=$i+$limit){
if($i <> $eu){
$i2=$i+$p_f;
echo " <a href='$page_name?start=$i&p_f=$p_f'><font face='Verdana' size='2'>$i</font></a> ";
}
else { echo "<font face='Verdana' size='4' color=red>$i</font>";}

}


echo "</td><td  align='right' width='10%'>";

if($this1 < $nume and $this1 <($p_f+$p_limit)) { 
print "<a href='$page_name?start=$next&p_f=$p_f'><font face='Verdana' size='2'>NEXT</font></a>";} 
echo "</td><td  align='right' width='20%'>";
if($p_fwd < $nume){
print "<a href='$page_name?start=$p_fwd&p_f=$p_fwd'><font face='Verdana' size='2'>NEXT $p_limit</font></a>"; 
}
echo "</td></tr></table>";


?>

</body>

</html>
