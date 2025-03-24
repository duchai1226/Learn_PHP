<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Ngày Tháng</title>
    <style>
        .container {
            display: flex;
            gap: 10px;
            font-family: Arial, sans-serif;
        }

        .dropdown {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
        }

        select {
            width: 60px;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
        }

        select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="dropdown">
            <label for="day">Ngày Sinh</label>
            <select id="day" name="day">
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>

        <div class="dropdown">
            <label for="month">Tháng</label>
            <select id="month" name="month">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>
    </div>
</body>

</html>