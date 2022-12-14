<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
   
        <h2 class="text-primary">Data Siswa</h2>
        <br>
        <table class="table">
            <thead> 
                <tr class="text-light">
                    <th class="border border-dark bg-success">ID</th>
                    <th class="border border-dark bg-success">Name</th>
                    <th class="border border-dark bg-success">Email</th>
                    <th class="border border-dark bg-success">Phone</th>
                    <th class="border border-dark bg-success">Addres</th>
                    <th class="border border-dark bg-success">Created At</th>
                    <th class="border border-dark bg-success">Action</th>
                </tr>
            </thead>
            <tbody class="text-body">
                <?php
                $servername = "localhost:3307";
                $username = "root";
                $password = "";
                $database = "myshop";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // read all row from database table 
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row
                while($row = $result->fetch_assoc()) { 
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                ?>

                
            </tbody>
        </table>
        <a class="btn btn-warning col-md-1" href="/myshop/create.php" role="button">New Data</a>
    </div>
</body>
</html>