<?php
include_once 'db.php';

if (isset($_POST['prod_id'])) {
    $prod_id = intval($_POST['prod_id']);
    $sql = "SELECT * FROM product WHERE prod_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $prod_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h5 class="text-center"><?= htmlspecialchars($row['prod_name']) ?></h5>
            <p><strong>Description:</strong> <?= htmlspecialchars($row['prod_desc']) ?></p>
            <p><strong>Type:</strong> <?= htmlspecialchars($row['product_type']) ?></p>
            <p><strong>Price: </strong> <?= htmlspecialchars($row['product_type'])?></p>
            <?php
        } else {
            echo "<p>Product not found.</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Error preparing statement.</p>";
    }
} else {
    echo "<p>No product ID provided.</p>";
}
?>
