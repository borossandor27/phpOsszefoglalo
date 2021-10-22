<?php
if(filter_input(INPUT_POST, "regisztral", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    //-- értékek feldolgozása
    $loginname = filter_input(INPUT_POST, "loginname", FILTER_SANITIZE_STRING);
    $vnev = filter_input(INPUT_POST, "vnev", FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $password = password_hash(filter_input(INPUT_POST, "password"), PASSWORD_BCRYPT);
    $cim = filter_input(INPUT_POST, "cim");
    $sql = "INSERT INTO `user` (`uazon`, `loginname`, `vnev`, `phone`, `email`, `password`, `cim`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $loginname, $vnev, $phone, $email, $password , $cim);
    if($stmt->execute()){
        echo 'Sikeres regisztráció!';
        header("Location: index.php?menu=home");
    } else {
        echo 'Rögzítés sikertelen';
    }
        
    
    
} else {
    

?>
<h1>regisztráció</h1>
<form method="POST">
      <div class="form-group">
            <label for="loginname">Felhasználó név</label>
            <input type="text" class="form-control" id="loginname" name="loginname">
      </div>
      <div class="form-group">
            <label for="vnev">Teljes név</label>
            <input type="text" class="form-control" id="vnev" name="vnev">
      </div>
      <div class="form-group">
            <label for="email">Email cím</label>
            <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
            <label for="phone">Telefonszám</label>
            <input type="text" class="form-control" id="phone" name="phone">
      </div>
      <div class="form-group">
            <label for="password">Jelszó</label>
            <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="form-group">
            <label for="cim">Szállítási cím</label>
            <input type="text" class="form-control" id="cim" name="cim">
      </div>

    <button type="submit" class="btn btn-primary" name="regisztral" value="true">Regisztráció</button>
</form>
<?php
}
