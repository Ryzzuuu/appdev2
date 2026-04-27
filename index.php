<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 30px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-bar {
            display: flex;
            gap: 8px;
        }
        .search-bar input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            width: 220px;
        }
        .search-bar button {
            padding: 8px 16px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-add {
            padding: 8px 16px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #4a90e2;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .btn-edit {
            padding: 5px 12px;
            background-color: #f39c12;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            margin-right: 5px;
        }
        .btn-delete {
            padding: 5px 12px;
            background-color: #e74c3c;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Student Records</h2>
    <div class="top-bar">
        <form class="search-bar" method="GET" action="">
            <input type="text" name="search" placeholder="Search records..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
        <a href="create.php" class="btn-add">+ Add Student</a>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>
            <td>
                <a href="edit.php?id=<?= $s['id'] ?>" class="btn-edit">Edit</a>
                <a href="delete.php?id=<?= $s['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
<!-- UI improved by Edenyaaa -->

    </table>
</div>
</body>
</html>