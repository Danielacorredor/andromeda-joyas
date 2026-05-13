<?php
session_start();
include 'conexion.php';

$error = '';

if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['usuario_email'] = $usuario['email'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Email o contraseña incorrectos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión — Andromeda Joyas</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --rose:       #c9706a;
            --rose-light: #e8a09b;
            --rose-pale:  #f5e6e4;
            --rose-bg:    #fdf5f4;
            --rose-dark:  #8b4a46;
            --text-main:  #2d1f1e;
            --text-muted: #8a6f6d;
            --border:     #ead8d6;
            --white:      #ffffff;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: 
                radial-gradient(circle at 30% 30%, rgba(201, 112, 106, 0.4) 0%, transparent 40%),
                radial-gradient(circle at 70% 60%, rgba(232, 160, 155, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(139, 74, 70, 0.3) 0%, transparent 50%),
                linear-gradient(135deg, #1a0f0e 0%, #1a0f0e 100%);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            margin: 1rem;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-icon {
            width: 64px;
            height: 64px;
            background: var(--rose-pale);
            border: 2px solid var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .login-icon img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 50%;
        }

        .login-header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 0.4rem;
        }

        .login-header h1 span { color: var(--rose); }

        .login-header p {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--text-muted);
        }

        .input-wrapper input {
            width: 100%;
            padding: 10px 12px 10px 38px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            color: var(--text-main);
            background: var(--white);
            outline: none;
            transition: border-color 0.15s;
        }

        .input-wrapper input:focus {
            border-color: var(--rose-light);
            box-shadow: 0 0 0 3px rgba(201, 112, 106, 0.1);
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            display: flex;
            align-items: center;
        }

        .toggle-password svg { width: 16px; height: 16px; }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 1.5rem;
        }

        .remember-row input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: var(--rose);
            cursor: pointer;
        }

        .remember-row label {
            font-size: 0.83rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .error-message {
            display: none;
            background: #fdecea;
            border: 1px solid #f5c6c4;
            color: #c0392b;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.83rem;
            margin-bottom: 1rem;
        }

        .error-message.show { display: block; }

        .btn-login {
            width: 100%;
            padding: 11px;
            background: var(--rose);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-login:hover { background: var(--rose-dark); }
        .btn-login:disabled { opacity: 0.7; cursor: not-allowed; }

        .spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .login-footer {
            margin-top: 1.5rem;
            text-align: center;
        }

        .login-footer p {
            font-size: 0.78rem;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        .login-footer code {
            background: var(--rose-pale);
            color: var(--rose-dark);
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>


<div class="login-card">
    <div class="login-header">
        <div class="login-icon">
            <img src="images/logo.png" alt="Logo Andromeda Joyas">
        </div>
        <h1>Andromeda <span>Joyas</span></h1>
        <p>Ingresa tus credenciales para continuar</p>
    </div>

    <?php if ($error): ?>
    <div class="error-message show"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php" id="loginForm">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <div class="input-wrapper">
                <svg fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <input type="email" id="email" name="email" placeholder="admin@andromedarjoyas.com" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <div class="input-wrapper">
                <svg fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
                <button type="button" class="toggle-password" onclick="togglePassword()">
                    <svg id="eyeOpen" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                    <svg id="eyeClosed" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                </button>
            </div>
        </div>

        <div class="remember-row">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Recordarme</label>
        </div>

        <button type="submit" class="btn-login" id="loginBtn">
            <span id="loginText">Iniciar sesión</span>
            <div class="spinner" id="spinner"></div>
        </button>
    </form>


</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        if (input.type === 'password') {
            input.type = 'text';
            eyeOpen.style.display = 'none';
            eyeClosed.style.display = 'block';
        } else {
            input.type = 'password';
            eyeOpen.style.display = 'block';
            eyeClosed.style.display = 'none';
        }
    }

    document.getElementById('loginForm').addEventListener('submit', function() {
        const btn = document.getElementById('loginBtn');
        const text = document.getElementById('loginText');
        const spinner = document.getElementById('spinner');
        btn.disabled = true;
        text.textContent = 'Iniciando sesión...';
        spinner.style.display = 'block';
    });
</script>

</body>
</html>