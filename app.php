<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job</title>
    <meta name="viewport" content="width = device-width, initial-scale = 1, shrink-to-fit = no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro" rel="stylesheet">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 
 
    <link rel="stylesheet" href="about.css">

    </head>
    
    <style>
        .verticalLine {
  border-right: thin solid rgb(0, 0, 0) ; 
  margin-left: 2rem;
}
    </style>
    <body> 
        
    <nav class="navbar">
        <div class="navbar-container container1">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">  
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>

            <ul class="menu-items">
                <li><a href="#" class="btn btn-outline-secondary" style="border: #1c3347 solid .5px">App</a></li>
                <li><a href="#" class="btn btn-outline-secondary" style="border: #1c3347 solid .5px;">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="row" style="height: auto; width: 80%">
    <div class="col-md-6 offset-md-3">
        <div class="content-2">
            <div class="feedbacks">
                <div class="title">
                    <h4 style="text-align: center">Recent applicant</h4> 
                </div> 
                <table>
                    <tr style="margin-right: 7rem;">  
                        <th style="margin-right: 5rem;">ID</th>
                        <th style="margin-right: 5rem;">Firstname</th>
                        <th style="margin-right: 5rem;">Lastname</th>
                        <th style="margin-right: 5rem;">Phonenumber</th>
                        <th style="margin-right: 5rem;">Email</th>
                        <th style="margin-right: 5rem;">File</th>
                    </tr>

                    <?php
                    include_once "db.php";
                    $today = date('Y-m-d');
                    $sql = "SELECT * FROM applicant";
                    $result =  $conn->query($sql);
                    $count = 1;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr> 
                                <td style="margin-right: 5rem;"><?=$row["firstname"]?></td> 
                                <td style="margin-right: 5rem;"><?=$row["lastname"]?></td>
                                <td style="margin-right: 5rem;"><?=$row["phonenumber"]?></td>
                                <td style="margin-right: 5rem;"><?=$row["email"]?></td>
                                <td style="margin-right: 5rem;"><?=$row["id"]?><a href="#test" class="btn btn-outline-secondary btn-sm">Open</a></td>
                            </tr>

                            <?php
                            $count++; 
                        }
                    } else {
                        echo "<tr>
                        <td colspan='5' style='text-align: center'>No applicant for day. </td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div> 

    <div class="col-md-6 col-sm-3" id="">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4 style="text-align: center;">App</h4>
                </div>
            </div>
        </div>
    </div>
 </div>

 <div>
    <div class="form-group" style="margin-left: 30px; height: auto; width: 20%"> 
        <label class="form-control text-dark" style="font-family: 'Poppins', Sans-serif;">Test
            <img src="https://i.pinimg.com/236x/05/c4/6c/05c46cd333b403b151601086f619438c.jpg" alt="" class="rounded-circle"
            style="height: auto; width: 5%; margin: 3rem; margin-left: 10px">
        </label>
    </div>
 </div>
    </body>
</html>