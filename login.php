<?php include 'header.php'; ?>
<section class="section" style="">
    <div class="container" style="">
        <h2>
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {
            
                // collect value of input field
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];

                //ensure username field is filled
                if (!empty($username)) 
                {
                    //sql statement adding to the table "logins", the user, pw, time
                    $sql = "INSERT INTO logins (username, password, time) VALUES ('$username','$password',now())";
                    
                    //ensure connection
                    if(mysqli_query($conn, $sql))
                    {
                        //if user is admin, currently sends to the admin temp page. Otherwise the customer
                        if($username == "admin")
                        {
                            echo "<script>location.href='admin.php';</script>";
                        }
                        else
                        {
                            echo "<script>location.href='customer.php';</script>";
                        }
                    }
                }
            } ?>
        </h2>
    </div>
</section>
            <section class="section" style="">
            <div class="container" style="">
            

            <form action="login.php" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Submit">
            </form>



            </div>
            </section>


<?php
include 'footer.php';
?>