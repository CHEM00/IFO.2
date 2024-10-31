<ul
    class="nav nav-tabs 
        display-flex 
        justify-content-between" 
    role="tablist"
    style="background-color: #fff;
        text-align: center;
        text-transform: uppercase;
        font-size: 0.9em;
        font-weight: 600;"
>
    <li 
        class="nav-item 
            flex-fill">
        <a
            href="{{ route ('Inicio')}}"
            class="nav-link 
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
        >Inicio
        </a>
    </li>
    <li 
        class="nav-item flex-fill">
        <a
            href="{{route ('innvoice')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
            >Factura
        </a>
    </li>
    <li class="nav-item 
        flex-fill">
        <a
            href="{{route ('ProgramInvoice')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
            >Facturas programadas
        </a>
    </li>
    <li class="nav-item 
            flex-fill">
        <a
            href="{{route ('CreditNote')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
            >Notas de crédito
        </a>
    </li>
    <li class="nav-item 
            flex-fill">
        <a
            href="{{route ('Client')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
        >Clientes
        </a>
    </li>
    <li class="nav-item 
            flex-fill">
        <a
            href="{{route ('Item')}}"
            class="nav-link 
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
            >Productos
        </a>
    </li>
    <li class="nav-item 
            flex-fill">
        <a
            href="{{route ('Payment')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;
            "
            >Pagos
        </a>
    </li>
    <li class="nav-item 
            flex-fill">
        <a
            href="{{route ('User')}}"
            class="nav-link
                hover:bg-gray-100"
            aria-current="page"
            style="color: #000000;"
            >Usuarios
        </a>
    </li> 
</ul>