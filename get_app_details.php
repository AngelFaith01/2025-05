<?php
include_once 'db.php';

if (isset($_POST['job_id'], $_POST['id'])) {
    $job_id = intval($_POST['job_id']);
    $id = intval($_POST['id']); 

    $sql = "SELECT * FROM jobOffer AS A INNER JOIN applicant AS B ON A.job_id = B.job_id WHERE A.job_id = ? AND B.id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $job_id, $id);  
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h5 style="text-align: center;"><?= htmlspecialchars($row['job_title']) ?></h5>
            <p><strong>Firstname:</strong> <?= htmlspecialchars($row['firstname']) ?></p>
            <p><strong>Lastname:</strong> <?= htmlspecialchars($row['lastname']) ?></p>
            <p><strong>Age:</strong> <?= htmlspecialchars($row['age']) ?></p>
            <p><strong>Phonenumber:</strong> <?= htmlspecialchars($row['phonenumber']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>

            <!-- Status Update Form -->
            <form method="post" action="admn.php">
                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                <div style="display: flex; justify-content: right;">
                    <button type="submit" name="submit" class="btn btn-outline-secondary btn-sm"
                        style="margin-right: .5rem; border-radius: 15px; border: #1c3347 .5px solid; color: #1c3347; background-color: white;">
                        next level
                    </button>
                    <button type="submit" name="failed" class="btn btn-outline-secondary btn-sm"
                        style="border-radius: 15px; border:rgb(87, 34, 34) .5px solid; background-color: white; color:rgb(82, 27, 27)">
                        Failed
                    </button>
                </div>
            </form>
            <?php
        } else {
            echo "<p>No application found.</p>";
        }

        $stmt->close(); 
    } else {
        echo "<p>Error preparing statement.</p>";
    }
} else {
    echo "<p>Missing job ID or applicant ID.</p>";
}
?>
