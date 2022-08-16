<?php
session_start();
include('./databaze.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="chyba">Username or passwors are wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">You are logged in!</p>';
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
        }
    }
}
?>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Jmeno(email)</label>
        <input type="email" name="username" required />
    </div>
    <div class="form-element">
        <label>Heslo</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Prihlasit</button>
</form>