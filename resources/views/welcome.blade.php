<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Inventory System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for POS Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #fff;
        }

        .card {
            background: rgba(255,255,255,0.1);
            border: none;
            backdrop-filter: blur(10px);
        }

        .header, .footer {
            padding: 15px 50px;
            color: #fff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(0,0,0,0.3);
        }

        .header .logo {
            font-weight: bold;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }

        .header .logo i {
            margin-right: 10px;
            font-size: 28px;
        }

        .footer {
            text-align: center;
            margin-top: auto;
            background-color: rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <i class="fa-solid fa-cash-register"></i> POS System
        </div>

        <div>
            <!-- Login Dropdown -->
            <div class="btn-group">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}?role=admin">Admin</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}?role=cashier">Cashier</a>
                    </li>
                </ul>
            </div>

            <!-- Register Button -->
            <a href="{{ route('register') }}" class="btn btn-success btn-sm ms-2">Register</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container text-center my-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card p-5 rounded-4 shadow-lg">
                <h2 class="mb-3">Welcome to POS Inventory System</h2>
                <p>Manage your store efficiently with ease.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} POS Inventory System. All rights reserved.
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
