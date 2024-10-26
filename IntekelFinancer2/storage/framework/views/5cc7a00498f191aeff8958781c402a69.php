<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/StyleHome.css')); ?>">
    <link rel="icon" href="<?php echo e(asset ('imgs/LogoIntekel.png')); ?>">
    <script src="https://kit.fontawesome.com/8519bc483d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <title>Inicio</title>
</head>
<body>
    <!-- Color y menú de la barra superior -->
    <?php if (isset($component)) { $__componentOriginal581d4ae5a3c652166fc11f3b6494e3a0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal581d4ae5a3c652166fc11f3b6494e3a0 = $attributes; } ?>
<?php $component = App\View\Components\BarraSuperior::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('barra-superior'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BarraSuperior::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal581d4ae5a3c652166fc11f3b6494e3a0)): ?>
<?php $attributes = $__attributesOriginal581d4ae5a3c652166fc11f3b6494e3a0; ?>
<?php unset($__attributesOriginal581d4ae5a3c652166fc11f3b6494e3a0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal581d4ae5a3c652166fc11f3b6494e3a0)): ?>
<?php $component = $__componentOriginal581d4ae5a3c652166fc11f3b6494e3a0; ?>
<?php unset($__componentOriginal581d4ae5a3c652166fc11f3b6494e3a0); ?>
<?php endif; ?>
    <!-- Nav tabs -->
    <?php if (isset($component)) { $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a = $attributes; } ?>
<?php $component = App\View\Components\NavBar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\NavBar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a)): ?>
<?php $attributes = $__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a; ?>
<?php unset($__attributesOriginalf59c6f96767458fe6aff06a16aa4d53a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a)): ?>
<?php $component = $__componentOriginalf59c6f96767458fe6aff06a16aa4d53a; ?>
<?php unset($__componentOriginalf59c6f96767458fe6aff06a16aa4d53a); ?>
<?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\18Z99LA\Desktop\Intekel_Financer2.0\IFO.2\IntekelFinancer\resources\views/Inicio.blade.php ENDPATH**/ ?>