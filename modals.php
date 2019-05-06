<!-- new project -->
<div class="modal fade" id="newproject" tabindex="-1" role="dialog" aria-labelledby="newprojectlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newproject">New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newproject.php" autocomplete="false" method="post">
   <div class="form-group">

  <input type="text" class="form-control" autocomplete="false" placeholder="Project Name" id="name" name="name">

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Create Project"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new shot -->
<div class="modal fade" id="newshot" tabindex="-1" role="dialog" aria-labelledby="newshotlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newshot">New Shot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newshot.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Scene</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="INT. LIVINGROOM - DAY"  id="scene" name="scene">

</div>
             <div class="form-group">
            <label for="exampleSelect1">Angle</label>
      <select class="form-control" id="angle" name="angle">
        <option>Close Up (CU)</option>
        <option>Medium Shot (MS)</option>
        <option>Long Shot (LS)</option>
        <option>Establishing Shot (ES)</option>
        <option>Over Shoulder (OSS)</option>
      </select>
            </div>
             <div class="form-group">
            <label for="exampleSelect1">Motion</label>
      <select class="form-control" id="motion" name="motion">
        <option>Static</option>
        <option>Pan</option>
        <option>Tilt</option>
        <option>Dolly</option>
        <option>Truck</option>
        <option>Pedestal</option>
        <option>Rack</option>
      </select>
            </div>
             <div class="form-group">
 <label for="scene">Location</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Description"  id="location" name="location"><br>


</div>
            <div class="form-group">
            <label for="exampleSelect1">Description</label>
      <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Shot"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new character -->
<div class="modal fade" id="newcharacter" tabindex="-1" role="dialog" aria-labelledby="newcharacterlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newcharacter">New Character</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newcharacter.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Name</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Firstname"  id="first" name="first"><br>
  <input type="text" class="form-control" autocomplete="false" placeholder="Lastname"  id="last" name="last">

</div>
            <div class="form-group">
 <label for="scene">Actor</label><?php if(querys("SELECT COUNT(id) FROM actors WHERE userid=".$_COOKIE["user"], "COUNT(id)") == 0) echo '&nbsp;&nbsp;<a href="#" class="float-right" data-toggle="modal" data-target="#newactor">Add Actors</a>'; ?>
  <select class="form-control" id="actor" name="actor">

        <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM actors where userid=".$_COOKIE["user"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

       echo '<option value="'.$row["id"].'">'.$row["firstname"].' '.$row["lastname"].'</option>';
    }
} else {
    echo '<option value="none">Unassigned</option>';
}
$conn->close();

      ?>
      </select>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Character"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new share -->
<div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="share" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="share">Share Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="scripts/share.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Username</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Username"  id="user" name="user"><br>

</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Share"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new actor -->
<div class="modal fade" id="newactor" tabindex="-1" role="dialog" aria-labelledby="newactorlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newactor">New Character</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newactor.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Name</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Firstname"  id="first" name="first"><br>
  <input type="text" class="form-control" autocomplete="false" placeholder="Lastname"  id="last" name="last">

</div>
             <div class="form-group">
 <label for="scene">Contact</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Phone Number"  id="contact" name="contact"><br>


</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Actor"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new location -->
<div class="modal fade" id="newlocation" tabindex="-1" role="dialog" aria-labelledby="newlocationlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newlocation">New Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newlocation.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Location</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Description"  id="location" name="location"><br>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Location"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new prop -->
<div class="modal fade" id="newprop" tabindex="-1" role="dialog" aria-labelledby="newproplabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newprop">New Prop</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newprop.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Prop</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Description"  id="prop" name="prop"><br>


</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Prop"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new pitch -->
<div class="modal fade" id="newpitch" tabindex="-1" role="dialog" aria-labelledby="newpitchlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newpitch">New Pitch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newpitch.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">


  <div class="form-group">
            <label for="exampleSelect1">Description</label>
      <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Pitch"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new crew -->
<div class="modal fade" id="newcrew" tabindex="-1" role="dialog" aria-labelledby="newcrewlabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newcrew">New Crew</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newcrew.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
   <div class="form-group">
 <label for="scene">Name</label>
  <input type="text" class="form-control" autocomplete="false" placeholder="Firstname" id="first" name="first"><br>
  <input type="text" class="form-control" autocomplete="false" placeholder="Lastname"  id="last" name="last">

</div>
            <div class="form-group">
 <label for="scene">Position</label>
  <select class="form-control" id="pos" name="pos">

      <option>Director</option>
      <option>Producer</option>
      <option>Actor</option>
      <option>Screenwriter</option>
      <option>Cinematographer</option>
      <option>Editor</option>
      <option>Constume</option>
      </select>
</div>
             <div class="form-group">
 <label for="scene">Email</label>
  <input type="email" class="form-control" placeholder="Email" id="phone" name="phone">

</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Crew"></input>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- new date -->
<div class="modal fade" id="newdate" tabindex="-1" role="dialog" aria-labelledby="newdatelabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newdate">New Date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="newdate.php?id=<?php echo $_GET["id"]; ?>" autocomplete="false" method="post">
            <div class="form-group">
 <label for="scene">Production Type</label>
  <select class="form-control" id="type" name="type">

      <option>Filming</option>
      <option>Sound</option>
      <option>Editing</option>
      <option>Screenwriter</option>
      <option>Storyboarding</option>
      <option>Constume Design</option>
      </select>
</div>
             <div class="form-group">
 <label for="scene">Required Crew</label>

      <div class="form-check">
        <label class="form-check-label">
             <?php
        $conn = new mysqli("localhost", "admin_flxscript", "Zaq1xsw2", "admin_flxscript");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM crew where projectid=".$_GET["id"];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $crew = json_decode($row["crew"]);
      $crewdec = array();
        foreach ($crew as &$v){
            array_push($crewdec, querys("select firstname from users where id=".$v, "firstname").' '.querys("select lastname from users where id=".$v, "lastname"));
        }
       echo ' <input class="form-check-input" type="checkbox" name="Actors[]" id="Actors" value="'.$row["id"].'" >
          '.$row["firstname"].' '.$row["lastname"].'<br>';

    }
} else {
    echo "<td>It appears you don't have a dates..</td><td></td><td></td><td></td>";
}
$conn->close();


 ?>


        </label>
           </div>
          <br>
          <label for="scene">Date</label>
  <input type="date" class="form-control" autocomplete="false" placeholder="Date" id="date" name="date">

</div>


</div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" id="submit" class="submit btn btn-info" style="" value="Add Date"></input>
          </form>
      </div>
    </div>
  </div>
</div>
