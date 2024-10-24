<!-- Div de toda la barra -->
<div 
    class="w-100 
        d-flex align-items-center 
        justify-content-between" 
    style="background-color: #4E9E19;
        height: 60px;">
    <!-- Div del logo y el nombre de la empresa -->
    <div 
        class="d-flex align-items-center" 
        style=" display: flex;
        align-items: center;
        gap: 10px;">
        <!-- Div del logo -->
        <div 
            class="d-inline-block"
            style="width: 60px;
                height: 60px;
                margin-right: 1vw;">
                <!-- Logo de la empresa -->
            <img 
                src="<?php echo e(asset('imgs/LogoIntekel.png')); ?>" 
                alt="LogoIntekel" 
                id="LogoIntekel"
                style="object-fit: contain;
                    width: 100%;
                    height: 100%;">
        </div>
        <!-- Div del nombre de la empresa -->
        <div 
            class="d-inline">
            <span 
                style="font-size: 1.5em; 
                    font-family: sans-serif; 
                    color:#fff">Intekel Financer
            </span>
        </div>
    </div>
    <!-- Div de los iconos -->
    <div 
        class="d-flex"
        style="display: flex;
            gap: 1vw;
            align-items: center;">
        <!-- Div del icono de timbrado -->
        <div 
            class="d-flex 
                justify-content-center 
                align-items-center" 
            style="display: flex;
                gap: 1vw;
                align-items: center;"">
            <a href="">
                <i 
                    class="fa-regular fa-bell fa-2x" 
                    style="color: #ffffff;">
                </i>
            </a>
        </div>
        <!-- Div del icono de configuración -->
        <div class="d-flex justify-content-center align-items-center" 
            style="width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;">
            <a href="">
                <i 
                    class="fa-solid fa-gear fa-2x" 
                    style="color: white;">
                </i>
            </a>
        </div>
    </div>
</div><?php /**PATH C:\Users\18Z99LA\Desktop\Intekel_Financer2.0\IFO.2\IntekelFinancer\resources\views/components/barra-superior.blade.php ENDPATH**/ ?>