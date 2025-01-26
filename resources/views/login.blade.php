<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
  /*background: url('images/login.jpg') no-repeat center center fixed;
  background-size: cover;*/
  background: linear-gradient(to right, #8E1616, #1D1616);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}


    .login-container {
    /* margin-top:115px;*/
      text-align: center;
      background: #ffffff;
      padding: 40px 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 400px;
    }

    .login-container h1 {
      font-size: 2.5rem;
     /* color: #ffffff;*/
     color: #333333;
      margin-bottom: 20px;
    }

    .login-container form {
      display: flex;
      flex-direction: column;
    }

    .login-container input {
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
      
    }

    .login-container button {
      background: #4facfe;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-container button:hover {
      background: #00c6ff;
    }

    .login-container a {
      margin-top: 20px;
      display: block;
      color: #4facfe;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .login-container a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>


  <div class="login-container">
    <h1>Login</h1>
    <form action="{{route('auth')}}" method="POST">
    @if ($errors->has('loginError'))
    <div style="color: red; margin-bottom: 10px;">
        {{ $errors->first('loginError') }}
    </div>
@endif
        @csrf
      <input type="email" name="Email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required style="margin-bottom:30px;">
      <button type="submit">Login</button>
    </form>
    <a href="/">Back to Welcome</a>
  </div>
</body>
</html>
