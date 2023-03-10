<?php
$pageName = "Search";
include 'header.php';
?>

            <section class="section">
            <div class="container">

                <div style="padding-bottom: 20px;background-color:lightgrey;">
                    <!--Form Validation-->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" id="search">
                    <h2>Game: <input name="search"></h2>
                    </form>
                    <button type="submit" form="search" value="Submit">Search</button>
                </div>

                <?php
                    $search = $_GET['search'];
                    $sql = "SELECT idgames, name, price FROM games  WHERE name LIKE '%{$search}%'";
                    $result = $conn->query($sql);
                    echo "<p>$result->num_rows Results for <strong>$search</strong> </p><br>";
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