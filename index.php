<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMI SCHEDULE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="navbar">
        <button onclick="toggleModal('loginModal')" class="right">LOGIN</button>
        <button onclick="toggleModal('registerModal')" class="right">REGISTER</button>
    </div>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content animate">
            <div class="imgcontainer">
                <span onclick="toggleModal('loginModal')" class="close" title="Close Modal">&times;</span>
                <img src="man.png" alt="Avatar" class="avatar">
            </div>
            <form action="login.php" method="post">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="toggleModal('loginModal')" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content animate">
            <div class="imgcontainer">
                <span onclick="toggleModal('registerModal')" class="close" title="Close Modal">&times;</span>
                <img src="man.png" alt="Avatar" class="avatar">
            </div>
            <form action="register.php" method="post">
                <div class="container">
                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Enter Name" name="name" required>

                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button type="submit">Register</button>
                </div>
                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="toggleModal('registerModal')" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = (modal.style.display === 'block') ? 'none' : 'block';
        }

        window.onclick = function(event) {
            var loginModal = document.getElementById('loginModal');
            var registerModal = document.getElementById('registerModal');
            if (event.target == loginModal) {
                loginModal.style.display = "none";
            } else if (event.target == registerModal) {
                registerModal.style.display = "none";
            }
        }
    </script>

    <?php include 'dbConfig.php'; ?>
    <?php
    $sql = "SELECT name, image FROM images ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageName = pathinfo($row['name'], PATHINFO_FILENAME);
        echo "<div class='image-container'>";
        echo "<h3>" . htmlspecialchars($imageName) . "</h3>";
        echo '  <style>
                    .center {
                        display: block;
                        width:1000px;
                        height:600px;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" class="center"/>';
        echo "</div>";
    } else {
        echo "No images found.";
    }

    $conn->close();
    ?>
</body>
</html>




