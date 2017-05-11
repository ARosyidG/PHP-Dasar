<?php
/**
 * login1.php
 *
 * Sandhika Galih
 * sandhikagalih@unpas.ac.id
 *
 * implementasi user login sederhana.
 * data dikirim ke halaman ini sendiri menggunakan $_SERVER["PHP_SELF"]
 * jika user berhasil login, redirect ke halaman admin0.php
 * implementasi session
 * tambahkan fungsi session_start(); di awal halaman (sebelum elemen html apapun)
 * akses data dengan superglobals $_SESSION
 *
 */

session_start();

// data user ini hanya untuk demo, pada kenyataannya nanti menggunakan database
define("USERNAME", "admin");
define("PASSWORD", "motekar");

// cek apabila tombol submit sudah di-klik / form telah di-submit
if (isset($_POST["submit"])) {
    // simpan data $_POST ke dalam variabel
    $username = $_POST["username"];
    $password = $_POST["password"];

    // validasi login user
    if ($username == USERNAME && $password == PASSWORD) {
      // login berhasil

      // set session user, variabel yang dapat digunakan di semua halaman
      $_SESSION["username"] = $username;

      // redirect user ke halaman admin
      header("Location: admin1.php");
      exit;
  
    } else {
      // login gagal
      // apabila username & password kosong atau tidak sesuai
      $error = true;
    }
}
?>

<!doctype html>
<html>
<head>
  <title>Log In</title>
</head>
<body style="text-align: center;">
<?php if (isset($error)): ?>
  <div style="color: red; font-style: italic;">Login Gagal!</div>
<?php endif ?>

<h1>Form Login</h1>

<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
  <table align="center">
    <tr>
      <td>Username:</td>
      <td><input name="username" type="text" value="<?php if(isset($_POST["username"])) echo htmlspecialchars($_POST["username"]); ?>"></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input name="password" type="password"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="submit" value="Log In"></td>
    </tr>
  </table>      
</form>
</body>
</html>