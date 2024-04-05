<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fun Olympic Paris 2024</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-gradient-to-r from-blue-400 to-red-400">

    <?php
    include "sidebar.php"
    ?>

    <div class="p-2 sm:ml-64">
        <div clas="p-3 bg-gradient-to-r from-blue-800 to-red-600 border-2 border-gray-300 rounded-lg shadow-md">
            <h1 class="text-3xl text-white font-bold mb-4">Reservation Information</h1>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gradient-to-r from-blue-900 to-red-900 text-white">
                        <tr>
                            <th class="px-4 py-2">UserID</th>
                            <th class="px-4 py-2">First Name</th>
                            <th class="px-4 py-2">Last Name</th>
                            <th class="px-4 py-2">Address</th>
                            <th class="px-4 py-2">City</th>
                            <th class="px-4 py-2">Country</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Olympic Games</th>
                            <th class="px-4 py-2">Edit</th>
                            <th class="px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <?php
                        include "../connection.php";
                        $query = "SELECT * FROM reservation";
                        $run = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($run)) {
                            $a = $row['id'];
                            $b = $row['first_name'];
                            $c = $row['last_name'];
                            $d = $row['address'];
                            $e = $row['city'];
                            $f = $row['country'];
                            $g = $row['phone'];
                            $h = $row['email'];
                            $i = $row['olympicGames'];
                        ?>
                            <tr class="bg-gradient-to-r from-blue-300 to-red-300">
                                <td class="border px-4 py-2"><?php echo $a; ?></td>
                                <td class="border px-4 py-2"><?php echo $b; ?></td>
                                <td class="border px-4 py-2"><?php echo $c; ?></td>
                                <td class="border px-4 py-2"><?php echo $d; ?></td>
                                <td class="border px-4 py-2"><?php echo $e; ?></td>
                                <td class="border px-4 py-2"><?php echo $f; ?></td>
                                <td class="border px-4 py-2"><?php echo $g; ?></td>
                                <td class="border px-4 py-2"><?php echo $h; ?></td>
                                <td class="border px-4 py-2"><?php echo $i; ?></td>
                                <td class="border px-4 py-2">
                                    <a href="edit_reservation.php?id=<?php echo $a; ?>&fname=<?php echo $b; ?>&lname=<?php echo $c; ?>&address=<?php echo $d; ?>&city=<?php echo $e; ?>&country=<?php echo $f; ?>&phone=<?php echo $g; ?>&email=<?php echo $h; ?>&booking=<?php echo $i; ?>" class="btn h-10 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</a>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="delete-reservation.php?id=<?php echo $a; ?>" class="btn h-10 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>