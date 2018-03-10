<?php

$conn = mysqli_connect('localhost','root','','signin');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$buyer=$_POST['bs1'];
$seller=$_POST['bs2'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$emailid=$_POST['Email'];
$address=$_POST['addr'];
$mobile=$_POST['Numbers'];
$bookid=$_POST['Bookid'];
$qty=$_POST['qty'];
$sql="INSERT INTO `buy`(`Buyer`, `Seller`, `First Name`, `Last Name`, `Email`, `Address`, `Phone`, `Book id`,`Quantity`) VALUES ('$buyer','$seller','$firstname','$lastname','$emailid','$address','$mobile','$bookid','$qty')";


$totalqty="select SUM(Quantity) from buy where bookid='$bookid'";
$sql1="INSERT INTO `bookdb`(`Book id`, `Quantity`) VALUES ('$bookid','$qty')";

if (mysqli_query($conn, $sql)) {
    header('location:homepage.html');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}



mysqli_close($conn);
?>