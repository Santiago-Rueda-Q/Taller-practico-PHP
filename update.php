<?php 
include("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="css/style.css" rel="stylesheet">
    <title>Editar usuarios</title>
</head>

<body class="font-sans py-8">
    <div class="max-w-md mx-auto px-4">
        
        <a href="index.php" 
            class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 
                    rounded-lg font-medium transition-all duration-300 mb-6
                    hover:-translate-y-0.5 hover:shadow-lg">
                ← Volver
        </a>
        
        <h1 class="text-4xl font-bold text-amber-900 text-center mb-6">Editar usuario</h1>
        
        <div class="bg-purple-100/80 border border-purple-300 rounded-xl p-4 mb-6 
                    text-purple-700 font-semibold text-center backdrop-blur-sm">
            Editando usuario ID: <?= $row['id'] ?>
        </div>

        <form action="edit_user.php" method="POST" 
            class="bg-white/80 backdrop-blur-sm p-6 rounded-3xl shadow-xl 
                    border border-purple-300/30 space-y-4">
            
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            
            <input type="text" name="name" placeholder="Nombre" 
                value="<?= $row['name'] ?>"
                class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                        focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                        outline-none transition-all duration-300 text-amber-900">
            
            <input type="text" name="lastname" placeholder="Apellidos" 
                value="<?= $row['lastname'] ?>"
                class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                        focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                        outline-none transition-all duration-300 text-amber-900">
            
            <input type="text" name="username" placeholder="Username" 
                value="<?= $row['username'] ?>"
                class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                        focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                        outline-none transition-all duration-300 text-amber-900">
            
            <input type="text" name="email" placeholder="Email" 
                value="<?= $row['email'] ?>"
                class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                        focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                        outline-none transition-all duration-300 text-amber-900">
            
            <input type="text" name="password" placeholder="Password" 
                value="<?= $row['password'] ?>"
                class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                        focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                        outline-none transition-all duration-300 text-amber-900">

            <input type="submit" value="Actualizar"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold 
                        py-3 px-6 rounded-xl transition-all duration-300 shadow-lg 
                        hover:shadow-xl hover:-translate-y-1 cursor-pointer">
        </form>
    </div>
</body>
</html>