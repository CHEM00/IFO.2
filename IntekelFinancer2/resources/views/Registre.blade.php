<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Agregamos el enlace a la hoja de estilos-->
    <link rel="stylesheet" href=" {{ asset ('css/StyleRegistre.css')}}">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"   crossorigin="anonymous" />
    <!-- Icono de la aplicación -->
    <link rel="icon" href=" {{ asset ('imgs/LogoIntekel.png')}}">
    <!-- Enlace a la hoja de estilos de Flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Enlace a la hoja de estilos de Font Awesome -->
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    <title>Registro</title>
</head>
<body>
    <div class="container p-0" id="container">
        <!-- Div para el color en la parte superior -->
        <div class="w-full h-14 rounded-top d-block" id="Div_BarraColor">
            <div class="d-inline-block">
                <a href="{{route('Login')}}">
                    <span>Registro</span> <i id="Icon-x" class="fa-solid fa-xmark fa-2x"></i>    
                </a>
            </div>
        </div>
            <div class="Div_Form">
                <form class="p-3">
                    <div class="mt-2 mb-3">
                        <label for="email" class="form-label" id="Label_Correo">Correo Electrónico</label>
                        <input type="email" class="form-control rounded" id="email" name="email" required>
                    </div>
                    <div class="mt-6 mb-3">
                        <label for="password" class="form-label" id="Label_Contrasenia">Contraseña</label>
                        <input type="password" class="form-control rounded" id="password" name="password" required>
                    </div>
                    <div class="mt-6 mb-6">
                        <label for="password_confirmation" class="form-label" id="Label_Confirmar">Confirmar Contraseña</label>
                        <input type="password" class="form-control rounded" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="mb-6">
                        <input type="checkbox" name="" id="">
                        <label for="checkbox" id="Label_Checkbox">Acepto los términos y condiciones</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="Submit_Registrarse">Registrarse</button>
                </form>
            </div>
        </div>
    </div>                        
</body>
</html>