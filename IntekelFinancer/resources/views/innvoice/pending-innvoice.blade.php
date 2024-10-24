<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset ('imgs/LogoIntekel.png')}}">
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <link rel="stylesheet" href="{{asset ('css/StyleTable.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Facturas pendientes</title>
</head>
<body style="background-color: #EAF6F7 !important">
    <header>
        <x-barra-superior/>
        <x-nav-bar/>
    </header>
    <main>
        <div class="mt-4">
            <span
                style="font-family: sans-serif;
                font-size:1.5em;
                font-weight:600;
                margin-left:0.5vw;">
                Lista de facturas</span
            >
        </div>
        <div class="d-flex 
                d-inline-block 
                p-2 
                overflow-x-auto
                rounded-top"
            style="background:linear-gradient(to right, #D5FFB8 33%, #fff 33%);
            width:18vw;
            margin-left: 0.5vw;
            margin-top: 1vh;
            gap:10px;">
            <a href="">
                <p>
                    Pendientes
                </p>
            </a>
            <a href="">
                <p>
                    Timbradas
                </p>
            </a>
            <a href="">
                <p>
                    Canceladas
                </p>
            </a>
        </div>
        
        <div class="overflow-x-auto p-2 pt-0 ">
            <table class="w-full" id="export-table">
                <thead class="bg-gray-200" {{--style="background-color: #D5FFB8;"--}}>
                    <tr>
                        <th class="text-center align-middle">
                            <span class="flex justify-center items-center">
                                Folio
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-4 py-2 text-center align-middle">
                            <span class="flex justify-center items-center">
                                Cliente
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-4 py-2 text-center align-middle">
                            <span class="flex justify-center items-center">
                                Fecha de emisión
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-4 py-2 text-center align-middle">
                            <span class="flex justify-center items-center">
                                Monto
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                            </span>
                        </th>
                        <th class="px-4 py-2 text-center align-middle">
                                
                        </th>   
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí vienen las filas de la tabla -->
                </tbody>
            </table>
        </div>        
    </main>
    <footer>
    </footer>
</body>
</html>