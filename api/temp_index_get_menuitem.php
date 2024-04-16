<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Items</title>
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

<table id="menuTable">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Restaurant ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <!-- Menu items will be dynamically added here -->
    </tbody>
</table>

<script>
// Fetch menu items from the PHP script
fetch('get_menuitem.php')
  .then(response => response.json())
  .then(data => {
    const menuItems = data;
    const menuTable = document.getElementById('menuTable');

    // Clear existing rows
    menuTable.getElementsByTagName('tbody')[0].innerHTML = '';

    // Add menu items to the table
    menuItems.forEach(item => {
      const row = menuTable.insertRow();
      row.innerHTML = `<td>${item.item_id}</td>
                       <td>${item.restaurant_id}</td>
                       <td>${item.name}</td>
                       <td>${item.description}</td>
                       <td>${item.price}</td>`;
    });
  })
  .catch(error => console.error('Error fetching menu items:', error));
</script>

</body>
</html>
