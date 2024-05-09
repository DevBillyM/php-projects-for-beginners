<!DOCTYPE html>
<html>
<head>
  <title>Modern PHP Register</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> 
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="container mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-md max-w-sm">
      <h2 class="text-2xl font-bold mb-4">Register</h2>

      <?php
      require_once 'functions.php';

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];

          if (registerUser($username, $email, $password)) {
              echo "<div class='text-green-500 mb-4'>Registration successful! You can now <a href='index.php' class='text-blue-500'>Login</a></div>";
          } else {
              echo "<div class='text-red-500 mb-4'>Registration failed. Please try again.</div>";
          }
      }
      ?>

      <form method="POST"> 
        <div class="mb-4">
          <label for="username" class="block text-gray-700">Username</label>
          <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Register</button>
      </form>
    </div>
  </div>
</body>
</html>
