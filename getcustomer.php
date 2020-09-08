<?php
$mysqli = new mysqli("localhost","root","", "duan1");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT id_subcategory, name_subcategory
FROM subcategory WHERE id_category = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>ID sub</th>";
echo "<td>" . $cid . "</td>";
echo "<th>Name sub</th>";
echo "<td>" . $cname . "</td>";

echo "</table>";


?>