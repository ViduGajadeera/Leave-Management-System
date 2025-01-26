<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(to right, #8E1616, #1D1616);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .registration-container {
      text-align: center;
      background: #ffffff;
      padding: 40px 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 400px;
    }

    .registration-container h1 {
      font-size: 2.5rem;
      color: #333333;
      margin-bottom: 20px;
    }

    .registration-container form {
      display: flex;
      flex-direction: column;
    }

    .registration-container input,
    .registration-container select {
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
    }

    .registration-container button {
      background: #4facfe;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    .registration-container button:hover {
      background: #00c6ff;
    }

    .registration-container a {
      margin-top: 20px;
      display: block;
      color: #4facfe;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .registration-container a:hover {
      text-decoration: underline;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
  <div class="registration-container">
    <h1>Register</h1>
    <form action="{{ route('registration') }}" method="POST">
      @csrf
      <input type="text" name="EMPID" placeholder="Employee ID" required>
      <input type="text" name="EMPNAME" placeholder="Employee Name" required>
      <input type="tel" name="contact" placeholder="Contact Number" required>
      <input type="text" name="designation" placeholder="Designation" required>
      <select name="user_type" required>
        <option value="" disabled selected>User Type</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
      </select>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <a href="/">Back</a>
  </div>
</body>
</html>
