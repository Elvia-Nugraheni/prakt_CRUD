<?php
include 'config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($mysqli, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Email atau password salah. Silakan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pemrograman Web</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #E2B1AA 0%, #F2C3C3 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: salmon;
        }

        /* Container */
        .login-container {
            width: 100%;
            max-width: 400px;
            background: beige;
            border-radius: 12px;
            padding: 30px 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        /* Title */
        .login-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: salmon;
        }

        /* Input Group */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            font-size: 14px;
            color: salmon;
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: pink;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 12px;
            background: #F7FAB3;
            color: salmon;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #E2DFAA;
        }

        /* Register Link */
        .register-link {
            margin-top: 15px;
            font-size: 14px;
            color: black;
        }

        .register-link a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Responsiveness */
        @media (max-width: 480px) {
            .login-container {
                padding: 20px;
            }

            .login-title {
                font-size: 20px;
            }

            .btn {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="" method="POST">
            <h2 class="login-title">Login</h2>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <p class="register-link">
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </p>
        </form>
    </div>
</body>
</html>
