<?php
$pageName = "Customer";
include 'header.php';
?>

            <h1><?php echo $pageName ?></h1>
            <section class="section" style="">
            <div class="container" style="">
                <h2>Purchases</h2>
            <?php
                    //Our really long sql statement put up here for ease of reading
                    $sql = "SELECT  purchases.gameid, purchases.customerid, purchases.time,
                                    games.idgames, games.price, games.name,
                                    users.fname, users.lname, users.idusers
                            FROM purchases
                            JOIN games
                            ON purchases.gameid = games.idgames
                            JOIN users
                            ON purchases.customerid = users.idusers";
                    
                    //Get the resulting table when running our above query
                    $result = $conn->query($sql);

                    //we use the table above to check if there are any results, if so we print
                    if ($result->num_rows > 0) 
                    {
                        //output data of each row from the combined tables
                        //specifically Customer name from user table, game name and price from games table, and the time of purchase from purchases table
                        while($row = $result->fetch_assoc()) 
                        {
                            echo "<div class=\"item\">";
                            echo "<div class=\"text\"><strong>Customer name:</strong> " .  $row["fname"] . " " . $row["lname"] ."</div>" ;
                            echo "<div class=\"text\"><strong>Game:</strong> ". $row["name"] . " $" . $row["price"] ."</div>" ;
                            echo "<div class=\"text\"> <strong>Date of Purchase:</strong> ". date("g:ia \n l jS F Y", strtotime($row["time"])) ." UTC</div>";
                            echo "</div>";
                        }
                    } 
                    //if no purchases we slap them witha 0 results
                    else 
                    {
                        echo "0 results";
                    }
                ?>

            </div>
            </section>


<?php
include 'footer.php';
?>