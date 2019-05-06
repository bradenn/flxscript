<?php ini_set('display_errors', 1);
include "header.php";

?>

<?php
if(isset($_POST["passwordflx"])){
    $user = $_POST["usernameflx"];
    $pass = md5($_POST["passwordflx"]);
    $email = $_POST["email"];
    $first = $_POST["first"];
    $last = $_POST["last"];
    $promo = $_POST["promo"];
    $acc = 0;
    if($promo == "aqva"){
        $acc = 1;
    }
        if(querys("SELECT COUNT(id) FROM users WHERE username='".$user."'", "COUNT(id)") == 0){


             $tokenid = md5(RandomString());
        $date = date("Y-m-d", time());


        queryi("INSERT INTO users (`username`, `password`, `email`, `firstname`, `lastname`, `account`, `id`) VALUES ('$user', '$pass', '$email', '$first', '$last', $acc, NULL);");
              $uid = querys("SELECT id FROM users WHERE username='$user'&&password='$pass'", "id");
        queryi("INSERT INTO `usertoken` (`token`, `userid`, `date`, `id`) VALUES ('$tokenid', '$uid', '$date', NULL)");


        setcookie("user", $tokenid, time() + (86400 * 30), "/");

        header("Location: index.php");
    }else{
        // header("Location: signup.php?error=1");
    }
}
?>
    <!-- Page Content -->
    <div class="container">
      <div class="row" style="padding-top: 6%;">
          <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card text-white bg-primary">
  <div class="card-header">Sign Up</div>
  <div class="card-body">
      <form action="signup.php" method="post">
   <div class="form-group">

  <input type="text" class="form-control" placeholder="Username" id="usernameflx" name="usernameflx">
<br>
       <input type="text" class="form-control" placeholder="Email" id="email" name="email">
       <br>
       <input type="text" class="form-control" placeholder="Firstname" id="first" name="first">
       <br>
       <input type="text" class="form-control" placeholder="Lastname" id="last" name="last">
       <br>
       <input type="password" class="form-control" placeholder="Password" id="passwordflx" name="passwordflx">
       <br>
       </div>
          <div class="form-group has-success">
        <input type="text" class="form-control is-valid" placeholder="Access Code" id="promo" name="promo">
              <span class="text-muted">Leave blank if none.</span>
              </div>
       <br>
       <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="width:100%;" value="Sign Up"></input>

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
