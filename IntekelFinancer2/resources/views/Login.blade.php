<!doctype html>
<html lang="en">
    <head>
        <title>Inicio de sesión</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <!-- Icono de la aplicación -->
        <link rel="icon" href=" {{ asset ('imgs/LogoIntekel.png')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="stylesheet" href=" {{ asset ( 'css/StyleLogin.css' )}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <form action="{{route('Inicio')}}" method="GET">
                <div class="Container_img">
                    <img src=" {{ asset ('imgs/LogoIntekel.png')}}" alt="">
                </div>
                <div class="mb-3" id="Div_Correo">
                    <label for="exampleInputEmail1" class="form-label">Correo eléctronico</label>
                    <input type="email" class="form-control" id="Input_Email" aria-describedby="emailHelp" placeholder="Ejemplo@correo.com" id="Input_Correo">
                <div class="mb-3" id="Div_LabelPassword">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="Input_Password" placeholder="********">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="CheckBox">
                    <label class="form-check-label" for="CheckBox" id="Label_Check">Recuerdame</label> <p>|</p> <a href="#" id="Link">¿Olvidaste tu contraseña?</a>
                </div>
                    <button type="submit" class="btn btn-primary" id="Button_IniciarSesion" >Iniciar sesión</button>
                <div class="Div_LabelRegistro">
                    <p id="P_NoCuenta">¿No tienes cuenta? </p> <a href="{{route ('Registre')}}" id="A_Registro">Regístrate</a></p>
            </form>
        </main>
    </body>
</html>
