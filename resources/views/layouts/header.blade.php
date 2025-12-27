<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vending Machine</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: skyblue;
        }

        .snack-title {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #ff9900;
            text-shadow:
                2px 2px 5px rgba(0, 0, 0, 0.3),
                0 0 10px rgba(255, 153, 0, 0.5);
            font-weight: bold;
            letter-spacing: 2px;
            padding: 10px 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            display: inline-block;
        }

        .btn-login {
            background-color: #ff9900;
            border: none;
        }

        .btn-login:hover {
            background-color: #ffb733;
        }
    </style>
</head>

<body>

    <!-- MAIN NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: skyblue;">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <!-- LEFT: empty for spacing (or add logo here) -->
            <div class="d-flex align-items-center">
                <!-- Logo can go here -->
            </div>

            <!-- CENTER: Snack Corner -->
            <h1 class="h3 m-0 snack-title text-center flex-grow-1">Snack Corner</h1>

            <!-- RIGHT: Login Button -->
           

    </nav>

    <!-- OPTIONAL SECOND NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: #87CEFA;">
        <div class="container-fluid">
            <ul class="navbar-nav justify-content-center w-100 mb-2 mb-lg-0">
                <!-- Add links here if needed -->
            </ul>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
