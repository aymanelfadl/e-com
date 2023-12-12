<?php 
require_once 'config.php';
$conn = db();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 0;
}

$userQuery = "SELECT id  FROM users WHERE USERNAME = '$username'";
$userResult = mysqli_query($conn, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userRow = mysqli_fetch_assoc($userResult);
    $userId = $userRow['id'];
}

$sql = "SELECT * FROM orders WHERE id_user = '$userId' AND STATUS != 'Cancelled'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="container mt-3">';
    echo '<h3 Style="margin-bottom:16px;"><b>Your Orders<b></h3>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col"><b>Order ID</b></th>';
    echo '<th scope="col"><b>Status</b></th>';
    echo '<th scope="col"><b>Order Date</b></th>';
    echo '<th scope="col"><b>Delivery Date</b></th>';

    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $rowColorClass = 'even';

    while ($row = $result->fetch_assoc()) {
        $rowColorClass = ($rowColorClass === 'even') ? 'odd' : 'even';
    
        $deliveryDate = strtotime($row["dilivredate"]);
        $currentDate = strtotime(date("Y-m-d"));
    
        $action = '';
        if ($deliveryDate > $currentDate) {
            $confirmationMessage = "Are you sure you want to cancel this order?";
            $action = '<button class="btn btn-danger" onclick="showConfirmationDialog(\'Are you sure you want to cancel this order?\', ' . $row["id"] . ');">Cancel Order</button>';
        } else {
            $action = '<button class="btn btn-warning" onclick="showFeedbackModal()">Your Feedback</button>';
            $orderId = $row['id'];
            $updateOrder = "UPDATE orders SET STATUS ='Completed' WHERE id= '$orderId'";
            $r = $conn->query($updateOrder);
        }
        
        echo '<tr class="' . $rowColorClass . '">';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["STATUS"] . '</td>';
        echo '<td>' . $row["ordate"] . '</td>';
        echo '<td>' . $row["dilivredate"] . '</td>';
        echo '<td>' . $action . '</td>';
        echo '</tr>';
    }
    

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '<div class="container mt-3">';
    echo '<p>Thank you for your patience and understanding!</p>';
    echo '</div>';
} else {
    echo "No orders found for this user.";
}



$conn->close();
?>
