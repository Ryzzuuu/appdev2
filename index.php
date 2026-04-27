<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Student Management System</h1>
                <p class="text-gray-600">Manage your students efficiently</p>
            </div>
            
            <div class="mb-6">
                <a href="create.php" class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 shadow-md hover:shadow-lg">+ Add New Student</a>
            </div>
            
            <?php if (empty($students)): ?>
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No students</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by adding your first student.</p>
                    <div class="mt-6">
                        <a href="create.php" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-600">Add Student</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Course</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($students as $s): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($s['id']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= htmlspecialchars($s['name']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($s['email']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?= htmlspecialchars($s['course']) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="edit.php?id=<?= $s['id'] ?>" class="inline-flex px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded transition duration-200">Edit</a>
                                    <a href="delete.php?id=<?= $s['id'] ?>" class="inline-flex px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition duration-200" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>