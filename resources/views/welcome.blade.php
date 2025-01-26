<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
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

    .welcome-container {
      text-align: center;
      background: #EEEEEE;
      padding: 40px 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 400px;
    }

    .welcome-container h1 {
      font-size: 2.5rem;
      color: #333333;
      margin-bottom: 20px;
    }

    .welcome-container p {
      font-size: 1rem;
      color: #666666;
      margin-bottom: 30px;
    }

    .button-container a {
      display: inline-block;
      text-decoration: none;
      background: #4facfe;
      color: white;
      padding: 12px 30px;
      margin: 10px 5px;
      border-radius: 25px;
      font-size: 1rem;
      transition: background 0.3s;
    }

    .button-container a:hover {
      background: #00c6ff;
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <h1>Welcome!</h1>
    <h3>LMS - ANJV 2.0 </h3> <br>
    <p> Please log in or register to continue.</p>
    <div class="button-container">
      <a href="/login">Login</a>
      <a href="/register">Register</a>
    </div>
  </div>
</body>
</html>
