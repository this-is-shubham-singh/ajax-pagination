<?php

$conn = mysqli_connect("localhost", "root", "@Durant333", "ajax_pagination") or die("connection failed");

$page_no = 1;
if (isset($_POST['pageNo'])) {
    $page_no = $_POST['pageNo'];
}

$limit = 5;

$offset = ($page_no - 1) * $limit;

$sql = "select * from crud limit $offset, $limit";

$response = mysqli_query($conn, $sql) or die("query failed");

$output = "";
if (mysqli_num_rows($response) > 0) {

    while ($row = mysqli_fetch_assoc($response)) {

        $output .= "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["first_name"] . "</td>
                        <td>" . $row["last_name"] . "</td>
                    </tr>";
    }
} else {
    $output .= "<tr>
                    <td>NO data found</td>
                </tr>";
}

echo $output;

mysqli_close($conn);
