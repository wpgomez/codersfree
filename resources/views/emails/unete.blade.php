<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cátalogo DLirio</title>
</head>
<body>
    <h1>Cátalogo DLirio</h1>
    <p>Estos son los datos del usuario que desea unirse:</p>

    <p><strong>Nombres:</strong> {{$contacto['nombres']}}</p>
    <p><strong>Apellidos:</strong> {{$contacto['apellidos']}}</p>
    <p><strong>Teléfono:</strong> {{$contacto['telefono']}}</p>
    <p><strong>Correo:</strong> {{$contacto['correo']}}</p>
    <p><strong>País:</strong> {{$contacto['country']}}</p>
    <p><strong>Departamento:</strong> {{$contacto['department']}}</p>
    <p><strong>Provincia:</strong> {{$contacto['province']}}</p>
    <p><strong>Distrito:</strong> {{$contacto['district']}}</p>
    <p><strong>Dirección:</strong> {{$contacto['direccion']}}</p>
    <p><strong>¿En qué momento podemos llamarlo?:</strong> {{$contacto['momentcontact']}}</p>
</body>
</html>