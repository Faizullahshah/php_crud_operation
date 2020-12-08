<!--Php include-->

<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>

    <?php

    //connection line
    $conn = mysqli_connect("localhost","root","","crud")or die("Connection Failed");
    //sql select query to join 
    $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";
    //db result
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessfull.");
    // if else to check the result
    if(mysqli_num_rows($result) > 0) {

    ?>

    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Class</th>
        <th>Phone</th>
        <th>Action</th>
        </thead>
        <tbody>
        <!--while condition to fetch data from db-->
        <?php  

        while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row['sid'];?></td>
                <td><?php echo $row['sname'];?></td>
                <td><?php echo $row['saddress'];?></td>
                <td><?php echo $row['cname'];?></td>
                <td><?php echo $row['sphone'];?></td>
                <td>
                    <a href='edit.php'>Edit</a>
                    <a href='delete-inline.php'>Delete</a>
                </td>
            </tr>
        <?php  } ?> 
          
        </tbody>
    </table>
<?php }else{
    echo"<h2> No Record Found </h2>";
}
mysql_close($conn); // sqli connection close

?>
</div>
</div>
</body>
</html>
