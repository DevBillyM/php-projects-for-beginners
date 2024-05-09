<!DOCTYPE html>
<html>
<head>
  <title>Modern PHP Login</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
</head>
<body class="bg-gray-100">
  <div class="container flex items-center justify-center h-screen mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-lg">
      <h2 class="text-2xl font-bold mb-4">Login</h2>

      <?php
        require_once 'functions.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $emailOrUsername = $_POST['email']; // Can be email or username
            $password = $_POST['password'];

            $userId = loginUser($emailOrUsername, $password); 

            if ($userId) {
                session_start();
                $_SESSION['user_id'] = $userId;
                header("Location: dashboard.php"); 
                exit; 
            } else {
                echo "<div class='text-red-500 mb-4'>Invalid email/username or password</div>";
            }
        }
        ?>

      <form method="POST"> 
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="text" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Login</button>
      </form>
      <p class="text-center mt-2">Don't have an account? <a href="register.php" class="text-blue-500">Register</a></p>
    </div>
  </div>
</body>
</html>
