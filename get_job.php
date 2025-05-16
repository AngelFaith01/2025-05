<?php
include_once 'db.php';

if (isset($_POST['job_id'])) {
    $job_id = intval($_POST['job_id']);
    $sql = "SELECT * FROM jobOffer WHERE job_id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            ?>
            <h5 style="text-align: center;"><?= htmlspecialchars($row['job_title']) ?></h5>
            <form action="Job.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="job_id" value="<?= $row['job_id'] ?>">
                <div class="row g-2"> 
                    <div class="col-sm-6"><input type="text" name="firstname" class="form-control" placeholder="Firstname" required></div>
                    <div class="col-sm-6"><input type="text" name="lastname" class="form-control" placeholder="Lastname" required></div>
                    <div class="col-sm-6"><input type="number" name="age" class="form-control" placeholder="Age" required></div>
                    <div class="col-sm-6"><input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" required></div>
                    <div class="col-12"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
                    <div class="col-12"><input type="file" name="file" class="form-control" required></div>
                    <div class="col-12"><textarea name="self_desc" id="" rows="4" placeholder="Description" class="form-control"></textarea></div>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" name="ok" class="btn btn-outline-secondary btn-sm text-dark" style="border-radius: 15px; border: #1c3347 .5px solid; background-color: white;">Submit</button>
                </div>
            </form>
            <?php
        } else {
            echo "<p>Application not found.</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error preparing statement.</p>";
    }
} else {
    echo "<p>No job ID provided.</p>";
}
?>
