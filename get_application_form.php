<?php
include_once 'db.php';

if (isset($_POST['job_id'])) {
    $job_id = intval($_POST['job_id']);
    $stmt = $conn->prepare("SELECT job_title FROM jobOffer WHERE job_id = ?");
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
?>
<h5 style="display: flex; justify-content: center; font-style: 'Poppins', Sans serif;"><?= htmlspecialchars($row['job_title']) ?></h5>
<form action="LP.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="job_id" value="<?= $job_id ?>" >

    <div class="row g-2" style="font-style: 'Poppins', Sans serif;">
        <div class="col-sm-6">
            <input type="text" class="form-control" style="border: #93AFBC .5px solid;" name="firstname" placeholder="Firstname" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" style="border: #93AFBC .5px solid;" name="lastname" placeholder="Lastname" required>
        </div>
        <div class="col-sm-6">
            <input type="number" class="form-control" style="border: #93AFBC .5px solid;" name="age" placeholder="Age" required>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" style="border: #93AFBC .5px solid;" name="phonenumber" placeholder="Phone Number" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" style="border: #93AFBC .5px solid;" name="email" placeholder="Email" required>
        </div>
        <div class="col-sm-12">
            <input type="file" class="form-control" style="border: #93AFBC .5px solid;" name="file" required>
        </div>
        <div class="col-sm-12">
            <textarea name="self_desc" id="self_desc" style="border: #93AFBC .5px solid;" class="form-control" rows="4" placeholder="Desc" required></textarea>
        </div>
    </div>

    <div class="text-center mt-3">
        <button type="submit" name="ok" class="btn btn-outline-secondary btn-sm text-dark" style="border-radius: 15px; border: #1c3347 .5px solid; background-color: white;">Submit</button>
    </div>
</form>

<?php
    } else {
        echo "<p>Job not found for this application.</p>";
    }
} else {
    echo "<p>No job id provided.</p>";
}
?>
