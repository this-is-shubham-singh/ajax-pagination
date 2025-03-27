<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Theme Table</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            background-color: #1e1e1e;
            text-align: left;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #333;
        }

        th {
            background-color: #333;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
        }

        .pagination a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody id="user_data">
        </tbody>
    </table>

    <div class="pagination" id="pagination">
        <!-- <a href=""></a>
        <a href=""></a>
        <a href=""></a> -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function load_table(page) {
                $.ajax({
                    url: "get_userdata.php",
                    method: "POST",
                    data: {
                        pageNo: page
                    },
                    success: function(data) {
                        $("#user_data").html(data);
                    }
                })
            }

            load_table();


            function load_pagination() {
                $.ajax({
                    url: "get_pagination.php",
                    method: "POST",
                    success: function(data) {
                        $("#pagination").html(data);
                    }
                })
            }

            load_pagination();

            $(document).on("click", ".page_no", function() {
                $id = $(this).attr("id");

                load_table($id);
            })
        });
    </script>
</body>

</html>