<!DOCTYPE html>
<!--
Template Name: Enigma - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="es" class="dark">
<!-- BEGIN: Head -->
<?php
$title = 'Crear cuenta';

include('page-master/head.php');
?>
<!-- END: Head -->

<body class="login">
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="images/logo.svg">
                    <span class="text-white text-lg ml-3"> Enigma </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="images/illustration.svg">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                        Unos cuantos clics más para
                        <br>
                        crear una cuenta.
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Administre todas sus cuentas de comercio electrónico en un solo lugar</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        Crear cuenta
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">Unos cuantos clics más para crear una cuenta.</div>
                    <form method="post">
                    <p id="response_value" class="text_response"></p>
                        <div class="intro-x mt-8">
                            <input type="text" id="nombre" class="intro-x login__input form-control py-3 px-4 block" placeholder="Nombres" required>
                            <input type="text" id="apellido" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Apellidos" required>
                            <input type="text" id="email_adress" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email" required>
                            <div id="basic-select">
                                <div class="preview">
                                    <!-- BEGIN: Basic Select -->
                                    <div>
                                        <label>Rol de usuario</label>
                                        <div class="mt-2">
                                            <select id="rol_usuario" data-placeholder="Select your favorite actors" class="tom-select w-full">
                                                <option value="1">Traducción</option>
                                                <option value="2">Limpieza</option>
                                                <option value="3">Raw Hunter</option>
                                                <option value="4">Corrector</option>
                                                <option value="5">Desensurador</option>
                                                <!-- <option value="5">Morgan Freeman</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <!-- END: Basic Select -->
                                    <!-- BEGIN: Nested Select -->
                                    <!-- END: Nested Select -->
                                </div>
                            </div>
                            <input type="text" id="password_normal" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Contraseña" required>
                            <!-- <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-success"></div>
                                <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                            </div> -->
                            <!-- <a href="" class="intro-x text-slate-500 block mt-2 text-xs sm:text-sm">What is a secure password?</a>  -->
                            <input type="text" id="password_sec" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password Confirmation">
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="button" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top" onclick="crearCuenta();">Crear cuenta</button>
                            <button onclick="cambiarLugar(1);" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Inicia sesión</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- BEGIN: JS Assets-->
    <?php
    include('page-master/js.php');
    ?>
    <!-- END: JS Assets-->
</body>

</html>