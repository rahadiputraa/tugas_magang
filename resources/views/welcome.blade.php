<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .breadcrumb {
            font-size: 14px;
            color: #999;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stat-item {
            background-color: #f1f3f4;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            text-align: center;
        }

        .stat-number {
            color: #007bff;
            font-size: 2.5em;
            margin-bottom: 5px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card span {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container">

        <div class="stats">
            <div class="stat-item">
                <h2>Total Surat</h2>
                <p class="stat-number">24</p>
                <p>in fulfilling orders</p>
            </div>
            <div class="stat-item">
                <h2>Total User</h2>
                <p class="stat-number">2,000+</p>
                <p>partner with Preline</p>
            </div>
            <div class="stat-item">
                <h2>Total Tipe Surat</h2>
                <p class="stat-number">5</p>
                <p>this year alone</p>
            </div>
        </div>

        <div class="cards">
            <div class="card">Surat Keputusan <span>7</span></div>
            <div class="card">Surat Memorandum <span>3</span></div>
            <div class="card">Surat Peraturan <span>1</span></div>
            <div class="card">Surat Rekomendasi Compliance <span>1</span></div>
            <div class="card">Surat SOP <span>12</span></div>
            <div class="card">Surat Edaran <span>12</span></div>
        </div>
    </div>
</body>
</html>