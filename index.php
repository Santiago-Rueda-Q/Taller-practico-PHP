<?php 
include("connection.php"); 
$con = connection();  
$sql = "SELECT * FROM users"; 
$query = mysqli_query($con, $sql); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="css/style.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body class="font-sans text-center">
    <div class="py-8">
        <div class="max-w-md mx-auto px-4">
            <h1 class="text-4xl font-bold text-amber-900 mb-8">Crear Usuario</h1>
            
            <form action="insert_user.php" method="POST" 
                class="bg-white/80 backdrop-blur-sm p-6 rounded-3xl shadow-xl border border-purple-300/30 space-y-4">
                
                <input type="text" name="name" placeholder="Nombre" required
                    class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                            focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                            outline-none transition-all duration-300 text-amber-900">
                
                <input type="text" name="lastname" placeholder="Apellidos"
                    class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                            focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                            outline-none transition-all duration-300 text-amber-900">
                
                <input type="text" name="username" placeholder="Username"
                    class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                            focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                            outline-none transition-all duration-300 text-amber-900">

                <input type="email" name="email" placeholder="Email"
                    class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                            focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                            outline-none transition-all duration-300 text-amber-900">

                <input type="password" name="password" placeholder="Password"
                    class="w-full p-3 border-2 border-purple-300 rounded-xl bg-white/90 
                            focus:border-purple-600 focus:ring-4 focus:ring-purple-300/30 
                            outline-none transition-all duration-300 text-amber-900">
                
                <input type="submit" value="Agregar"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold 
                            py-3 px-6 rounded-xl transition-all duration-300 shadow-lg 
                            hover:shadow-xl hover:-translate-y-1 cursor-pointer">
            </form>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-0 pb-8">
        <h2 class="text-3xl font-bold text-amber-900 mb-6">Usuarios registrados</h2>
        
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-purple-300/30 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-600 to-purple-700">
                        <tr>
                            <th class="py-4 px-6 text-left font-bold text-white text-sm uppercase tracking-wide">ID</th>
                            <th class="py-4 px-6 text-left font-bold text-white text-sm uppercase tracking-wide">Nombre</th>
                            <th class="py-4 px-12 text-left font-bold text-white text-sm uppercase tracking-wide">Apellidos</th>
                            <th class="py-4 px-12 text-left font-bold text-white text-sm uppercase tracking-wide">Username</th>
                            <th class="py-4 px-24 text-left font-bold text-white text-sm uppercase tracking-wide">Email</th>
                            <th class="py-4 px-6 text-left font-bold text-white text-sm uppercase tracking-wide">Password</th>
                            <th class="py-4 px-6 text-center font-bold text-white text-sm uppercase tracking-wide"></th>
                            <th class="py-4 px-6 text-center font-bold text-white text-sm uppercase tracking-wide"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-200">
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                            <tr class="hover:bg-purple-50 transition-colors duration-200">
                                <th class="py-3 px-6 text-purple-700 font-semibold">
                                    <?= $row['id'] ?>
                                </th>
                                <th class="py-3 px-6 text-amber-900">
                                    <?= $row['name'] ?>
                                </th>
                                <th class="py-3 px-6 text-amber-900">
                                    <?= $row['lastname'] ?>
                                </th>
                                <th class="py-3 px-6 text-amber-900">
                                    <?= $row['username'] ?>
                                </th>
                                <th class="py-3 px-6 text-blue-600">
                                    <?= $row['email'] ?>
                                </th>
                                <th class="py-3 px-6">
                                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded font-mono text-xs">
                                        <?= $row['password'] ?>
                                    </span>
                                </th>
                                <th class="py-3 px-3">
                                    <a href="update.php?id=<?= $row['id'] ?>" 
                                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 
                                                rounded-lg text-xs font-semibold uppercase tracking-wide
                                                transition-all duration-300 hover:-translate-y-0.5 
                                                hover:shadow-lg inline-block">
                                        Editar
                                    </a>
                                </th>
                                <th class="py-3 px-3">
                                    <a href="delete.php?id=<?= $row['id'] ?>" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 
                                                rounded-lg text-xs font-semibold uppercase tracking-wide
                                                transition-all duration-300 hover:-translate-y-0.5 
                                                hover:shadow-lg inline-block">
                                        Eliminar
                                    </a>
                                </th>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>