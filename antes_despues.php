<?php
include "conexion.php";

$mipagina=$_SERVER['PHP_SELF'];

		$sql = "SELECT * FROM libro ORDER BY cod_titulo";
		$query = mysql_query($sql);
		$total_results = mysql_num_rows($query);
		$limit = "3"; //limit of archived results per page.
		$total_pages = ceil($total_results / $limit); //total number of pages
                
                echo "hay $total_results campos<br>";
if (empty($page))
	{
		$page = "1"; //default page if none is selected
	}
$offset = ($page - 1) * $limit; //starting number for displaying results out of DB

	$query = "SELECT * FROM libro ORDER BY cod_titulo LIMIT $offset, $limit";
	$result = mysql_query($query);
//This is the start of the normal results...

	while ($row = mysql_fetch_array($result))
		{
			echo $row[0]."-".$row[1]."-".$row[2]."<br>";
		}
		mysql_close();


// This is the Previous/Next Navigation
echo "<font face=Verdana size=1>";
echo "Pages:($total_pages)&nbsp;&nbsp;"; // total pages
if ($page != 1)
{
echo "<a href=$mipagina?page=1><< First</a>&nbsp;&nbsp;&nbsp;"; // First Page Link
$prevpage = $page - 1;
echo "&nbsp;<a href=$mipagina?page=$prevpage><<</a>&nbsp;"; // Previous Page Link
}
    	if ($page == $total_pages) 
			{
      			$to = $total_pages;
    		} 
		elseif ($page == $total_pages-1) 
			{
      			$to = $page+1;
    		} 
		elseif ($page == $total_pages-2) 
			{
     		 	$to = $page+2;
    		} 
		else 
			{
      			$to = $page+3;
    		}
    	if ($page == 1 || $page == 2 || $page == 3) 
			{
      			$from = 1;
    		} 
		else 
			{
      			$from = $page-3;
    		}
			
for ($i = $from; $i <= $to; $i++)

	{
	if ($i == $total_results) $to=$total_results;
	if ($i != $page)
		{
		echo "<a href=$mipagina?showold=yes&page=$i>$i</a>";
		}
	else
		{
		echo "<b><font face=Verdana size=2>[$i]</font></b>";
		}
	if ($i != $total_pages)
		echo "&nbsp;";
	}
if ($page != $total_pages)
{
$nextpage = $page + 1;
echo "&nbsp;<a href=$mipagina?page=$nextpage>>></a>&nbsp;"; // Next Page Link
echo "&nbsp;&nbsp;&nbsp;<a href=$mipagina?page=$total_pages>Last >></a>"; // Last Page Link
}
echo "</font>";

// This is the end of the Previous/Next Navigation

?>