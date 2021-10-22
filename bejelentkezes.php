<?php
if(filter_input(INPUT_POST, "belepes", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    $loginname = filter_input(INPUT_POST, "loginname", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password");
    $sql = 'SELECT `password` FROM `user` WHERE `loginname`=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loginname );
    $stmt->execute();
    
    $result = $stmt->get_result();
    if(password_verify($password, $result->fetch_assoc()["password"])){
        echo 'Sikeres belépés';
        //-- felhasználói adatok beolvasása
        $result = $conn->query('SELECT * FROM `user` WHERE `loginname`= "'.$loginname.'";');
        $_SESSION['user'] = $result->fetch_assoc();
        $_SESSION['login'] = true;
        
    } else {
        echo 'Belépés sikertelen!';    
    }
}
?>
<h1>bejelentkezés</h1>
<form method="POST">
      <div class="form-group">
            <label for="loginname">Felhasználó név</label>
            <input type="text" class="form-control" id="loginname" name="loginname">
      </div>
      <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password">
      </div>
    <button type="submit" class="btn btn-primary" name="belepes" value="true">Belépés</button>
</form>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

