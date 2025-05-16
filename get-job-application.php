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
            <h5 style="text-align: center;"><?= htmlspecialchars($row['job_title'])?></h5>
            <form action="LP.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="job_id" value="<?= $row['job_id']?>">
                <div class="row g-2">
                    <div class="col-sm-6">
                        <input type="text" name="firstname" class="form-control border-rounded" placeholder="Firstname" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="lastname" class="form-control border-rounded" placeholder="Lastname" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="age" class="form-control border-rounded" placeholder="Age" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="phonenumber" class="form-control border-rounded" placeholder="Phonenumber" required>
                    </div>
                    <div class="col-12">
                        <input type="email" name="email" class="form-control border-rounded" placeholder="Email" required>
                    </div>
                    <div class="col-12">
                        <input type="file" name="file" class="form-control border-rounded" placeholder="File" required>
                    </div>
                    <div class="col-12">
                        <textarea name="self_desc" id="" class="form-control border-rounded" placeholder="Description" required></textarea>
                    </div>
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