<br>
<div class="container">
  <h2>Inquiries</h2>
<div class="table-responsive">
        <table class="table table-bordered  text-center">
    <thead>
      <tr> 
        <th  style="background-color: #395e7d;">Name</th>
        <th  style="background-color: #395e7d;">Contact Number</th>
        <th style="background-color: #395e7d;">Email</th>
        <th style="background-color: #395e7d;">Address</th>
        <th style="background-color: #395e7d;">Message</th>
      </tr>
    </thead>
    <?php
      include_once "db.php";
      $sql="SELECT * from contact ";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td> 
      <td><?=$row["phonenumber"]?></td>   
      <td><?=$row["message"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>



  </table>
</div>    