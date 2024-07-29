<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="file"] {
            display: block;
            margin: 0 auto 20px;
        }

        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }

        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="uploadcon.php" method="post" enctype="multipart/form-data">
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image" required>
        <input type="submit" name="upload" value="Upload Image">
        <button><a href="index.php">Home</a></button>
    </form>
</body>
</html>
