<?php
$result = null;
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nilai1 = isset($_POST['nilai1']) ? trim($_POST['nilai1']) : '';
    $nilai2 = isset($_POST['nilai2']) ? trim($_POST['nilai2']) : '';
    $operator = isset($_POST['operator']) ? $_POST['operator'] : '+';

    if ($nilai1 === '' || $nilai2 === '') {
        $error = 'Silakan isi kedua nilai.';
    } elseif (!is_numeric($nilai1) || !is_numeric($nilai2)) {
        $error = 'Nilai harus berupa angka.';
    } else {
        $nilai1 = (float) $nilai1;
        $nilai2 = (float) $nilai2;

        switch ($operator) {
            case '+':
                $result = $nilai1 + $nilai2;
                break;
            case '-':
                $result = $nilai1 - $nilai2;
                break;
            case '*':
                $result = $nilai1 * $nilai2;
                break;
            case '/':
                if ($nilai2 == 0) {
                    $error = 'Tidak bisa membagi dengan nol.';
                } else {
                    $result = $nilai1 / $nilai2;
                }
                break;
            default:
                $error = 'Operator tidak valid.';
                break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Kalkulator PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f4f4f4;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 460px;
        }
        h1 {
            margin: 0 0 20px;
            color: #333;
        }
        .form-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        input[type="text"], select {
            padding: 8px 10px;
            font-size: 16px;
            width: 120px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 8px 18px;
            font-size: 16px;
            border: 1px solid #333;
            background: #333;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 6px;
            background: #fafafa;
            border: 1px solid #ddd;
            color: #222;
        }
        .error {
            color: #c00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Latihan Kalkulator PHP</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-row">
                <label for="nilai1">Nilai I</label>
                <input type="text" id="nilai1" name="nilai1" value="<?php echo isset($_POST['nilai1']) ? htmlspecialchars($_POST['nilai1']) : ''; ?>">
                <select name="operator" id="operator">
                    <option value="+"<?php echo (isset($_POST['operator']) && $_POST['operator'] === '+') ? ' selected' : ''; ?>>+</option>
                    <option value="-"<?php echo (isset($_POST['operator']) && $_POST['operator'] === '-') ? ' selected' : ''; ?>>-</option>
                    <option value="*"<?php echo (isset($_POST['operator']) && $_POST['operator'] === '*') ? ' selected' : ''; ?>>*</option>
                    <option value="/"<?php echo (isset($_POST['operator']) && $_POST['operator'] === '/') ? ' selected' : ''; ?>>/</option>
                </select>
                <label for="nilai2">Nilai II</label>
                <input type="text" id="nilai2" name="nilai2" value="<?php echo isset($_POST['nilai2']) ? htmlspecialchars($_POST['nilai2']) : ''; ?>">
                <input type="submit" value="submit">
            </div>
        </form>

        <?php if ($error !== null): ?>
            <div class="result error"><?php echo $error; ?></div>
        <?php elseif ($result !== null): ?>
            <div class="result">Hasil: <?php echo $result; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
