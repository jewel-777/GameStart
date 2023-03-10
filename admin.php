<?php
$pageName = "Admin";
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posted = true;
}

?>
            <h1><?php echo $pageName ?></h1>
            <section class="section" style="">
            <div class="container" style="">
             <h2>Recent Logins</h2>
             <?php
                    $sql = "SELECT * FROM logins  ORDER BY time DESC LIMIT 0,10";
                    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=\"item\">";
                        echo "<div class=\"\">Username: " .  $row["username"] . "</div>" ;
                        #echo "<img src=\"cover_image.jpg\">" ;
                        echo "<div >Pass: ". $row["password"] ."</div>" ;
                        echo "<div>". date("g:ia \n l jS F Y", strtotime($row["time"])) ." UTC</div>";
                        echo "</div>";
                    }
                    } else {
                    echo "0 results";
                    }
                    #$conn->close();
                ?> 


                <button onclick="location.href = 'clearLogins.php';">Clear Log</button>
            </div>
            </section>


            <section class="section" style="">
            <div class="container" style="">
            <h2>Change Game Price</h2>

            <?php if ($posted) {
        

            // collect value of input field
            $gameid = $_REQUEST['games'];
            $newPrice = $_REQUEST['newPrice'];


            if (!empty($newPrice)) {
                $sql = "UPDATE games SET price = '$newPrice' WHERE idgames=$gameid";
                if(mysqli_query($conn, $sql)){
                    echo "<h3>Price Updated</h3>";
                    }
                }else{
                    echo "<h3>Something Failed</h3>";
                }
            }else{
                
            }
         ?>

                <form name="updatePrice" action="admin.php" method="post">
                    <label>Game: </label>
                <select name="games" id="games">
                    <?php
                            $sql = "SELECT * FROM games ORDER BY name ASC";
                            
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["idgames"] .">" . $row["name"] . " - $" . $row["price"] . " - ". $row["console"] . "</option>";
                                }
                            }
                        ?> 
                    </select><br><br>
                    <label>New Price: </label>
                    <input type="text" name="newPrice">
                    <input type="submit" value="Submit">
                </form>
            </div>
            </section>



            <section class="section" style="">
            <div class="container" style="">
            <h2>Remove game</h2>

            <?php if ($posted) {
        

            // collect value of input field
            $gameiddelete = $_REQUEST['games2'];


            if (!empty($gameiddelete)) {
                $sql = "DELETE FROM games WHERE idgames = $gameiddelete;";
                if(mysqli_query($conn, $sql)){
                    echo "<h3>Game removed</h3>";
                    }
                }
            }else{
                
            }
         ?>

                <form name="deleteGame" action="admin.php" method="post">
                    <label>Game: </label>
                <select name="games2" id="games2">
                    <?php
                            $sql = "SELECT * FROM games ORDER BY name ASC";
                            
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["idgames"] .">" . $row["name"] . " - " . $row["console"] . "</option>";
                                }
                            }
                        ?> 
                    </select><br><br>
                    
                    <input type="submit" value="Delete">
                </form>
            </div>
            </section>


<?php
include 'footer.php';
?>