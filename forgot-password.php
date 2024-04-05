<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fun Olympic Paris 2024</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-blue-900 text-white">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
      <a class="text-2xl font-bold" href="#">Recover Account</a>
      <ul class="flex">
        <li class="mr-6">
          <a class="hover:text-gray-300" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Login Form -->
  <div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
      <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Forgot Your Password?</h2>
        <form action="" method="post">
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Your Email:</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="sample@mail.com" required autofocus>
          </div>

          <div class="flex justify-between">
            <button type="submit" name="submit" class="bg-blue-800 text-white py-2 px-4 rounded-md hover:bg-blue-900 focus:outline-none focus:bg-gray-700">Send Code</button>
            <button type="reset" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Cancel</button>
          </div>

          <p class="mt-4 text-sm text-center">Don't have an account? <a href="signup.php" class="text-blue-500">Create New Account</a></p>
        </form>

        <?php
        if (isset($_POST['submit'])) {
          include 'connection.php';
          $to = $_POST['email'];
          $subject = 'Password Reset Code';
          $x = rand(1, 9);
          $y = rand(2, 8);
          $z = rand(3, 7);
          $OTP = $x . $y . $z;
          // $headers = "From: info@hoteltreeland.com.np\r\n" .
          //   "Reply-To: info@hoteltreeland.com.np\r\n" .
          //   "X-Mailer: PHP/" . phpversion();
          $query = "INSERT INTO otp (otp) VALUES ('$OTP')";
          mysqli_query($conn, $query);
          // if (mail($to, $subject, $OTP, $headers)) {
          //   echo "<p class='mt-4 text-sm text-green-600 text-center'>Sent mail Successfully!</p>";
            header("location:verify-otp.php");
          // }
        }
        ?>
      </div>
    </div>
  </div>
  <!-- End Login Form -->

</body>


</html>