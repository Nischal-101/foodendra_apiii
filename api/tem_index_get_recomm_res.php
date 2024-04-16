<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recommended Restaurants</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Restaurant ID</th>
            <th>Restaurant Name</th>
            <th>Average Rating</th>
        </tr>
    </thead>
    <tbody>
        <?php include 'get_recomm_res.php'; ?>
    </tbody>
</table>

</body>
</html>
