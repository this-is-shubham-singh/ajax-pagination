<?php

$conn = mysqli_connect("localhost", "root", "@Durant333", "ajax_pagination") or die("connection failed");

$sql = "select * from crud";

$response = mysqli_query($conn, $sql) or die("query failed");

$limit = 5;
$users = mysqli_num_rows($response);
$page_no = $users / $limit;

$output = "";

for ($i = 1; $i <= $page_no; $i++) {
    $output .= "<a href='#' class='page_no' id='$i'>$i</a>";
}

echo $output;

mysqli_close($conn);
