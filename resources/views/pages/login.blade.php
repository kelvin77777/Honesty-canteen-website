<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            width: 250px;
            height: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-form .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }
        .login-form input {
            width: 75%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;

            
        }
        .login-form button {
            background-color: #1DC6AB;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 120px;
        }

        
    </style>
</head>
<body>
    
    <img src="{{ asset('assets/image/bg4.jpeg') }}" alt="Image" style="position: absolute; top: 70px;  width: 200px; height: auto;">
    <div class="login-form">
        <form method="POST" action="/login" style="margin-top: 50px;">
            <p style="font-size: 20px; font-weight: bold">Login</p>
            @csrf
            <div class="input-container">
                <label for="username" style="display: none;">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="input-container">
                <label for="password" style="display: none;">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit">Login</button>
        </form>
        
    </div>
    <img src="{{ asset('assets/image/bg1.jpeg') }}" alt="Image" style="position: absolute; bottom: -100px; right: -60px; width: 300px; height: auto;">
    <img src="{{ asset('assets/image/bg2.jpeg') }}" alt="Image" style="position: absolute; bottom: -100px; left: -60px; width: 300px; height: auto;">
    <img src="{{ asset('assets/image/bg3.jpeg') }}" alt="Image" style="position: absolute; top: -110px; left: -50px; width: 300px; height: auto;">
    <button style="position: absolute; top: 10px; right: 10px;background-color: #1DC6AB; border: none; border-radius: 20px;width: 150px;height: 40px;color: white;cursor: pointer;" onclick="window.location.href = '{{ route('dashboard') }}'">Dashboard Utama</button>
    
    
</body>
</html>
