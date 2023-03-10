
<?php
$pageName = "Games";
include 'header.php';
?>

            <section class="section" style="">
            <div class="container" style="">
            <h2> All Games <br></h2>
            <h4>Sort By:</h4>
            <a href="games.php?sort=priceup">Price &#8593; </a>&nbsp; - &nbsp;<a href="games.php?sort=pricedown">Price &#8595;</a><br><br>
            <a href="games.php?sort=nameup">Name &#8593;</a>&nbsp; - &nbsp;<a href="games.php?sort=namedown">Name &#8595;</a><br><br>
                <?php
                    $sort = $_GET['sort'];

                    if (empty($sort)) {
                        $sql = "SELECT idgames, name, price FROM games";
                    }elseif($sort == 'priceup'){
                        $sql = "SELECT idgames, name, price FROM games ORDER BY price DESC";
                    }elseif($sort == 'pricedown'){
                        $sql = "SELECT idgames, name, price FROM games ORDER BY price ASC";
                    }elseif($sort == 'nameup'){
                        $sql = "SELECT idgames, name, price FROM games ORDER BY name ASC";
                    }elseif($sort == 'namedown'){
                        $sql = "SELECT idgames, name, price FROM games ORDER BY name DESC";
                    }

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class=\"item\">";
                        echo "<div class=\"name\">" .  $row["name"] . "</div>" ;
                        echo "<div >Price: $". $row["price"] ."</div>" ;
                        echo "<button>Buy</button>";
                        echo "</div>";
                    }
                    } else {
                    echo "0 results";
                    }
                ?> 
            </div>
            </section>


<?php
include 'footer.php';
?>
            