<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Calculator</title>
</head>
<body>
    <h1>Tax Calculator</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="income">Gross Income:</label>
        <input type="text" id="income" name="income" required><br><br>
        <label for="deductions">Total Deductions:</label>
        <input type="text" id="deductions" name="deductions" required><br><br>
        <input type="submit" name="submit" value="Calculate Taxes">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $gross_income = $_POST['income'];
        $total_deductions = $_POST['deductions'];

        if (!is_numeric($gross_income) || !is_numeric($total_deductions)) {
            echo "<p>Please enter numeric values for income and deductions.</p>";
            exit();
        }

        // Standard deduction
        $standard_deduction = 12950;
        if ($total_deductions < $standard_deduction) {
            $total_deductions = $standard_deduction;
        }

        // Adjusted gross income
        $adjusted_gross_income = $gross_income - $total_deductions;

        // Tax brackets
        $tax_brackets = [
            [10275, 0.10],
            [41775, 0.12],
            [89075, 0.22],
            [170050, 0.24],
            [215950, 0.32],
            [539900, 0.35],
            [PHP_INT_MAX, 0.37]
        ];

        $taxes_owed = 0;
        $remaining_income = $adjusted_gross_income;
        $previous_limit = 0;

        foreach ($tax_brackets as $bracket) {
            $limit = $bracket[0];
            $rate = $bracket[1];
            if ($remaining_income > 0) {
                $taxable_income = min($remaining_income, $limit - $previous_limit);
                $taxes_owed += $taxable_income * $rate;
                $remaining_income -= $taxable_income;
                $previous_limit = $limit;
            } else {
                break;
            }
        }

        // Calculate taxes owed at each bracket
        $taxes_at_brackets = [
            "10%" => min($adjusted_gross_income, 10275) * 0.10,
            "12%" => max(min($adjusted_gross_income - 10275, 41775 - 10275) * 0.12, 0),
            "22%" => max(min($adjusted_gross_income - 41775, 89075 - 41775) * 0.22, 0),
            "24%" => max(min($adjusted_gross_income - 89075, 170050 - 89075) * 0.24, 0),
            "32%" => max(min($adjusted_gross_income - 170050, 215950 - 170050) * 0.32, 0),
            "35%" => max(min($adjusted_gross_income - 215950, 539900 - 215950) * 0.35, 0),
            "37%" => max(($adjusted_gross_income - 539900) * 0.37, 0)
        ];

        echo "<h2>Tax Calculator Results for " . $name . "</h2>";
        echo "<p>Gross Income: $" . number_format($gross_income, 2) . "</p>";
        echo "<p>Total Deductions: $" . number_format($total_deductions, 2) . "</p>";
        echo "<p>Adjusted Gross Income: $" . number_format($adjusted_gross_income, 2) . "</p>";
        foreach ($taxes_at_brackets as $bracket => $tax) {
            echo "<p>Taxes Owed at $bracket bracket: $" . number_format($tax, 2) . "</p>";
        }
        echo "<p>Total Taxes Owed: $" . number_format($taxes_owed, 2) . "</p>";
        echo "<p>Taxes Owed as percentage of gross income: " . number_format(($taxes_owed / $gross_income) * 100, 2) . "%</p>";
        echo "<p>Taxes Owed as percentage of adjusted gross income: " . number_format(($taxes_owed / $adjusted_gross_income) * 100, 2) . "%</p>";
    }
    ?>
</body>
</html>
