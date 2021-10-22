<h1>pizzák</h1>
<?php
$sql = "SELECT `tazon`,`nev`,`ar`,`kep` FROM `termek`  WHERE `kazon`= 1";
if($result = $conn->query($sql)){
    //-- sikeres lekérdezés feldolgozása
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo '<div class="card" style="width: 18rem; float:left; margin: 1rem">';
            if($row["kep"] != null){
                echo '<img src="images\\'.$row["kep"].'" class="card-img-top" alt="images\\'.$row["kep"].'">';
            }
            echo '<div class="card-body">
                    <h5 class="card-title">'.$row["nev"].'</h5>
                <p class="card-text">'.$row["ar"].'</p>
                <button type="submit" class="btn btn-primary" value="'.$row["tazon"].'">Megrendelem</button>
              </div>
            </div>';
        }
    }
} else {
    echo 'Sikertelen lekérdezés';
}

