<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<h1>此页面专供工作人员使用/FOR OFFICAL USE ONLY</h1>


<p>报名个人信息：<br/>
<?php
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$remote_addr = $_SERVER['REMOTE_ADDR'];
$dci = $_GET['dci'];
$dci_a = $_GET['dci_a'];
$dci_b = $_GET['dci_b'];
$dci_c = $_GET['dci_c'];
$player_email = $_GET['player_email'];
$con = mysql_connect("localhost","c6h6","computer");
if (!$con)
{
	die("Could not connect.");
}

mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

mysql_select_db("pandaevents", $con);

$result = mysql_query("SELECT Contact_Name, Contact_Email, Product_Language, CONCAT(PlayerA_Last,', ', PlayerA_First) AS PlayerA_Name, PlayerA_DCI, PlayerA_Country, CONCAT(PlayerB_Last,', ', PlayerB_First) AS PlayerB_Name, PlayerB_DCI, PlayerB_Country, CONCAT(PlayerC_Last,', ', PlayerC_First) AS PlayerC_Name, PlayerC_DCI, PlayerC_Country,
CASE WHEN HasPlaymat = 1 THEN '是/Y' ELSE '否/N' END AS HasPlaymat,
CASE WHEN IsCheckedIn = 1 THEN '是/Y' ELSE '否/N' END AS isCheckedIn,
Checksum
FROM `RegistrationData`
WHERE PlayerA_DCI=".$dci_a." AND PlayerB_DCI=".$dci_b." AND PlayerC_DCI=".$dci_c);

while($row=mysql_fetch_array($result))
{
	echo "联系人姓名/Contact Name: ".$row['Contact_Name']."<br/>";
	echo "联系人电子邮件/Contact_Email: ".$row['Contact_Email']."<br/>";
	echo "产品语言/Product Language: ".$row['Product_Language']."<br/>";
	echo "牌手A姓名/Player A Name: ".$row['PlayerA_Name']."<br/>";
	echo "牌手A DCI/Player A DCI: ".$row['PlayerA_DCI']."<br/>";
	echo "牌手A国家/Player A Country: ".$row['PlayerA_Country']."<br/>";
	echo "牌手B姓名/Player A Name: ".$row['PlayerB_Name']."<br/>";
	echo "牌手B DCI/Player A DCI: ".$row['PlayerB_DCI']."<br/>";
	echo "牌手B国家/Player A Country: ".$row['PlayerB_Country']."<br/>";
	echo "牌手C姓名/Player A Name: ".$row['PlayerC_Name']."<br/>";
	echo "牌手C DCI/Player A DCI: ".$row['PlayerC_DCI']."<br/>";
	echo "牌手C国家/Player A Country: ".$row['PlayerC_Country']."<br/>";
	echo "<h2>"."是否有牌垫？".$row['HasPlaymat']."<br/></h2>";
	echo "<h2>"."是否已签到？".$row['isCheckedIn']."<br/></h2>";
	$dci_sha = $row['Checksum'];
}

$process_link = '<h2><a href="http://www.pandaevents.cn/check_in.php?dci_sha='.$dci_sha.'">签到</a></h2>';

echo "<h1>此页面专供工作人员使用，非工作人员请勿点按</h1>";

//if (strpos($user_agent, "iPad"))
	echo $process_link;
?></p>
</body>
</html>