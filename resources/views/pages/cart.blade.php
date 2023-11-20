
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-8">
    <title>Document</title>
    <style>
        .cart-container {
            background-color: #fff; /* Warna latar belakang */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek shadow */
            padding: 20px;
            margin: 20px;
            width: 350px;
            height: 400px;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <p style="text-align: center; font-size: 20px; font-weight: bold">Payment</p>
        <ul id="cart-items">
            <!-- Item di sini akan ditampilkan oleh JavaScript -->
        </ul>
        <div id="cart-total">
            <hr>
            <strong>Total: <span id="total-amount">Rp. 0</span></strong>
        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
