<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
    <title>Login</title>
</head>

<body>
    <div class="p-5 w-full max-w-2xl mx-auto">
        <?php
        if (isset($errors)) {
            foreach ($errors as $error) {
                echo "<div class='bg-red-500 text-white p-2 rounded mb-4'>$error</div>";
            }
        }
        ?>
    </div>
    <div class="container mx-auto mt-5 flex">
        <div class="w-full max-w-2xl mx-auto bg-white p-5 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Login</h1>
            <form method="POST">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
                <div class="mt-4 text-sm text-gray-600">
                    Don't have an account? <a href="./signup" class="text-blue-600 hover:underline">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>