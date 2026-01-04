<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>
  <style>
    :root {
      --bg: #f3f6fb;
      --card: #fff;
      --accent: #2563eb;
      --muted: #6b7280;
      --radius: 12px;
      font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    html,body{height:100%}
    body{
      margin:0;
      display:grid;
      place-items:center;
      background:linear-gradient(180deg,var(--bg),#eef2ff);
      padding:24px;
    }
    .card{
      width:100%;
      max-width:420px;
      background:var(--card);
      border-radius:var(--radius);
      box-shadow:0 8px 30px rgba(32,41,54,0.08);
      padding:28px;
    }
    h1{margin:0 0 8px;font-size:1.25rem}
    p.lead{margin:0 0 20px;color:var(--muted);font-size:0.95rem}
    .field{display:flex;flex-direction:column;margin-bottom:14px}
    .field label{font-size:0.85rem;color:var(--muted);margin-bottom:6px}
    .field input{
      padding:10px 12px;border:1px solid #e6e9ef;border-radius:8px;font-size:0.95rem;
      outline:none;transition:box-shadow .12s, border-color .12s;
    }
    .field input:focus{box-shadow:0 0 0 4px rgba(37,99,235,0.08);border-color:var(--accent)}
    .row{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
    .remember{display:flex;align-items:center;font-size:0.9rem;color:var(--muted)}
    .btn{
      width:100%;background:var(--accent);color:#fff;padding:11px;border-radius:10px;
      border:none;font-weight:600;font-size:1rem;cursor:pointer;
    }
    .alt{margin-top:12px;text-align:center;color:var(--muted);font-size:0.9rem}
    .link{color:var(--accent);text-decoration:none}
    @media (max-width:420px){
      .card{padding:20px}
    }
  </style>
</head>
<body>
<?php
$users=array("username"=>"ahmed2","password"=>"1234");

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(isset($users['username']) && isset($users['password'])){
    if($username == $users['username'] && $password == $users['password']){
      $_SESSION["username"] = $username;
      header("location: dashboard2.php");
    }else{
      $_SESSION["error"] = "<script>alert('Invalid username or password');</script>";
    }
  }

}
 ?>
  <main class="card" role="main" aria-label="Login form">
    <h1>Welcome back</h1>
    <p class="lead">Sign in to your account</p>

    <form id="loginForm" action="login2.php" method="POST">
      <div class="field">
        <label for="name">name</label>
        <input id="name" name="username" type="text" placeholder="username"  />
      </div>

      <div class="field">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Your password"  />
      </div>

   
      <button class="btn" type="submit" name="login">login</button>

    </form>
  </main>
  
  <script>
   
  </script>
</body>
</html>