<?php
require '../../../PHP/Functions.php';



$conn = connect(); 
$name = mysqli_real_escape_string($conn, $_POST['name']); 
$sql = "SELECT u.*, COUNT(o.id) AS num_orders
FROM users u
LEFT JOIN orders o ON u.id = o.id_user
WHERE 
    (u.FN LIKE '%$name%' OR u.FN LIKE '%$name' OR u.FN LIKE '$name%') OR 
    (u.LN LIKE '%$name%' OR u.LN LIKE '%$name' OR u.LN LIKE '$name%') OR
    (u.USERNAME LIKE '%$name%' OR u.USERNAME LIKE '%$name' OR u.USERNAME LIKE '$name%')
GROUP BY u.id
ORDER BY u.FN;
";

$query = mysqli_query($conn, $sql);

$data = " <table>
 <thead>
<tr>
    <td>First Name </td>
    
    <td>Last Name</td>
    <td>Username </td>
    <td>Email</td>
    <td>Orders</td>
</tr>
</thead>";

while ($row = mysqli_fetch_assoc($query)) {
   

  
    
    $data .= "<tr>
    <td>{$row['FN']}</td>
    <td>{$row['LN']}</td>
    <td>{$row['USERNAME']}</td>
    <td>{$row['EMAIL']}</td>
    <td>{$row['num_orders']}</td>
</tr>";


}

$data .= "</table>";
echo $data;

?>
