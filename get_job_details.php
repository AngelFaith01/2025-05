<?php
include_once 'db.php';

if (isset($_POST['job_id'])) {
    $job_id = intval($_POST['job_id']);
    $sql = "SELECT * FROM jobOffer WHERE job_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $job_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h5 style="text-align: center;"><?= htmlspecialchars($row['job_title']) ?></h5>
            <p><strong>Description:</strong> <?= htmlspecialchars($row['job_desc']) ?></p>
            <p><strong>Type:</strong> <?= htmlspecialchars($row['job_type']) ?></p>
            <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
            <p><strong>Experience:</strong> <?= htmlspecialchars($row['experience']) ?></p>
            <p><strong>Benefits:</strong> <?= htmlspecialchars($row['benefits']) ?></p>

            
            <form action="LP.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="job_id" value="<?= $row['job_id'] ?>">

                <div class="row g-2">
                    <div class="col-sm-6">
                        <input type="text" class="form-control border rounded" placeholder="Firstname" name="firstname" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border rounded" placeholder="Lastname" name="lastname" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control border rounded" placeholder="Age" name="age" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border rounded" placeholder="Phone Number" name="phonenumber" required>
                    </div>
                    <div class="col-md-12">
                        <input type="email" class="form-control border rounded" placeholder="Email" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <input type="file" class="form-control border rounded" placeholder="Attach here your resume" name="file" required>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" name="ok" class="btn btn-outline-light"
                        style="width: 150px; height: 45px; border: #1c3347 solid .5px; border-radius: 50px;
                        background-color: var(--button); color: var(--white); box-shadow: 0px 12px 12px 0px rgba(0,0,0,.15);">
                        Submit
                    </button>
                </div>
            </form>
            <?php
        } else {
            echo "<p>Job not found.</p>";
        }
        $stmt->close();  
    } else {
        echo "<p>Error preparing statement.</p>";
    }
} else {
    echo "<p>No job ID provided.</p>";
}
?>
