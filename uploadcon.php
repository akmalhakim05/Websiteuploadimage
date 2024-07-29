<?php
include_once 'dbConfig.php';

if (isset($_POST['upload'])) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];

        if (substr($imageType, 0, 5) == "image") {
            $imageData = file_get_contents($imageTmpName);

            $stmt = $conn->prepare("INSERT INTO images (name, image) VALUES (?, ?)");
            if ($stmt) {
                $stmt->bind_param("sb", $imageName, $null);
                $stmt->send_long_data(1, $imageData);

                if ($stmt->execute()) {
                    echo "Image uploaded successfully.";
                } else {
                    echo "Failed to upload image: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Failed to prepare the SQL statement: " . $conn->error;
            }
        } else {
            echo "Please upload a valid image file.";
        }
    } else {
        echo "Error in file upload: " . $_FILES['image']['error'];
    }
}

$conn->close();
?>

<button><a href="index.php">Home</a></button>
