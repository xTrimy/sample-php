<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>

<body>
    <div>
        Welcome to the Home Page, <?= htmlspecialchars($user['name']) ?>!
        <p>Your email is <?= htmlspecialchars($user['email']) ?>.</p>
        <!-- logout -->
        <form method="POST" action="./logout" class="mt-4">
            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700">Logout</button>
        </form>
    </div>
</body>

</html>