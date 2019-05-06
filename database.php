<?php

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

if(isset($_COOKIE["user"])){
   $userid = querys("SELECT userid FROM `usertoken` WHERE token = '".$_COOKIE["user"]."'", "userid");
}


function logstatus(){
        if(isset($_COOKIE["user"])){
            return true;
            $userid = querys("SELECT userid FROM `usertoken` WHERE token = '".$_COOKIE["user"]."'", "userid");
        }else{

            return false;
        }
    }
$userid2 = logstatus();
	function querys($sql, $tar) {

$conn = new mysqli("localhost", "admin_flix", "Zaq1xsw2", "admin_flix");

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        return $row[$tar];
    }
} else {
    return "none";
}
$conn->close();


	}
function queryi($sql) {

$conn = new mysqli("localhost", "admin_flix", "Zaq1xsw2", "admin_flix");

$result = $conn->query($sql);


$conn->close();


	}

	function close() {

		mysqli_close($conn);
	}



  function dateDiff($date1, $date2)
  {
      $date_1 = new DateTime($date1);
      $date_2 = new DateTime($date2);
      $diff = $date_1->diff($date_2);

      if ($diff->days > 365) {
          return $date_1->format('Y-m-d');
      } elseif ($diff->days > 7) {
          return $date_1->format('M d');
      } elseif ($diff->days > 2) {
          return $date_1->format('L - H:i');
      } elseif ($diff->days == 2) {
          return "Yesterday ".$date_1->format('H:i');
      } elseif ($diff->days > 0 OR $diff->h > 1) {
          return $date_1->format('H:i');
      } elseif ($diff->i >= 1) {
          return $diff->i." min ago";
      } else {
          return "Just now";
      }
  }

	function goToLogin()
  {

    header("Location: /login.php");
  }

?>
