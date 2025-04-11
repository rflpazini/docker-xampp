<?php
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hello Docker XAMPP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #f8f9fa;
            }
            .docker-header {
                background-color: #0db7ed;
                color: white;
                padding: 20px;
                border-radius: 10px;
            }
            .phpinfo-wrapper {
                display: none;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="docker-header text-center">
                <h1>🐳 Hello Docker XAMPP!</h1>
                <p class="mb-0">PHP Version: ' . phpversion() . '</p>
            </div>';

    // Banco de dados
    $host = 'database';
    $user = 'user';
    $password = 'password';
    $db = 'mydatabase';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        echo '<div class="alert alert-danger mt-3">❌ Connection failed: ' . $conn->connect_error . '</div>';
    } else {
        echo '<div class="alert alert-success mt-3">✅ Connected to MySQL successfully!</div>';
    }

    echo '
            <button class="btn btn-outline-info mt-3" onclick="togglePhpInfo()">Show PHP Info</button>
            <div class="phpinfo-wrapper" id="phpinfo">';

    ob_start();
    phpinfo();
    $phpinfo = ob_get_clean();
    echo $phpinfo;

    echo '
            </div>
        </div>
        <script>
            function togglePhpInfo() {
                const info = document.getElementById("phpinfo");
                info.style.display = info.style.display === "none" ? "block" : "none";
            }
        </script>
    </body>
    </html>';
?>
