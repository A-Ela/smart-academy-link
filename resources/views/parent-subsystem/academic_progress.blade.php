<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Progress - Year {{ $year }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Academic Progress - Year {{ $year }}</h1>
    <table>
        <tr><th>Subject</th><th>Grade</th></tr>
        <tr><td>BM</td><td>A</td></tr>
        <tr><td>BI</td><td>B+</td></tr>
        <tr><td>Sains</td><td>A-</td></tr>
        <tr><td>Matematik</td><td>B</td></tr>
        <tr><td>RBT</td><td>A</td></tr>
        <tr><td>PJK</td><td>B+</td></tr>
        <tr><td>PSV</td><td>A-</td></tr>
        <tr><td>Sejarah</td><td>B</td></tr>
    </table>
</body>
</html>
