<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "drugstore");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM Medicines WHERE prescription = 'N' ";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>title</th>";
                echo "<th>Purpose</th>";
                echo "<th>Purchase price</th>";
                echo "<th>Sell price</th>";
                echo "<th>Prescription</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['purpose'] . "</td>";
                echo "<td>" . $row['buy_price'] . "</td>";
                echo "<td>" . $row['sell_price'] . "</td>";
                echo "<td>" . $row['prescription'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>