<?php
require 'db.php';
$id = $_GET['id'];

// Fetch current data
$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['name'], $_POST['email'], $_POST['course'], $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Student</h2>
            <form method="POST" class="space-y-4">
                <div>
                    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>
                <div>
                    <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>
                <div>
                    <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">Update</button>
            </form>
            <a href="index.php" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium transition">Back to Student List</a>
        </div>
    </div>
</body>
</html>