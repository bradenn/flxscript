<?php ini_set('display_errors', 1);
include "header.php";

?>

<?php 
if(isset($_POST["usernameflx"])){
    $username = $_POST["usernameflx"];
    $pass = md5($_POST["passwordflx"]);
    if(querys("SELECT COUNT(id) FROM users WHERE username='$username'&&password='$pass'", "COUNT(id)") > 0){
        
        $tokenid = md5(RandomString());
        $date = date("Y-m-d", time());
        
        $uid = querys("SELECT id FROM users WHERE username='$username'&&password='$pass'", "id");
        
        queryi("INSERT INTO `usertoken` (`token`, `userid`, `date`, `id`) VALUES ('$tokenid', '$uid', '$date', NULL)");
    
        
        setcookie("user", $tokenid, time() + (86400 * 30), "/");
        
        header("Location: index.php");
    }else{
         header("Location: login.php?error=1");
    }
}
?>
    <!-- Page Content -->
    <div class="container">
      <div class="row" style="padding-top: 6%;">
          <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <?php if(isset($_GET["error"])){
    echo '
            <div class="card text-white bg-danger" style="">
  <div class="card-body">
    <h4 class="card-title">Login Failed</h4>
    <p class="card-text">Incorrect username or password.</p>
  </div>
</div><br>';
}
            ?>
            <div class="card text-white bg-primary">
  <div class="card-header">Login</div>
  <div class="card-body">
      <form action="login.php" method="post">
   <div class="form-group">
 
  <input type="text" class="form-control" placeholder="Username" id="usernameflx" name="usernameflx">
<br>
  <input type="password" class="form-control" placeholder="Password" id="passwordflx" name="passwordflx">
       <br>
       <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="width:100%;" value="Login"></input>
</div>
          </form>
  </div>
</div>
         

        </div>
          <div class="col-lg-4"></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
