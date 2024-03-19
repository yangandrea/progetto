<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
<div id="#paginaDiRegistrazione">
    <form action="register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" placeholder="inserisci un nome utente"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="inserisci una password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="inserisci una mail"><br>
        <label for="birthdate">Birthdate:</label><br>
        <input type="date" id="birthdate" name="birthdate" placeholder="inserisci la data"><br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>