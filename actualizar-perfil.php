<?php
$title = 'Perfil del usuario';
include("page-master/head.php");
if (isset($_GET['id']) && !$_GET['id']) {
    header('location: dashboard');
}
?>
<!-- END: Head -->


<body class="py-5 md:py-0">
    <!-- BEGIN: Top Bar -->
    <?php
    include("page-master/header.php");
    ?>
    <!-- END: Top Bar -->
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <?php include("page-master/side-navbar.php"); ?>

        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Actualizar datos personales
                </h2>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 lg:col-span-12 2xl:col-span-12  ">
                    <!-- BEGIN: Display Information -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Información personal
                            </h2>
                        </div>
                        <div class="p-5">
                            <form method="post">
                            <p id="response_value" class="text_response"></p>
                                <div class="flex flex-col-reverse xl:flex-row flex-col">
                                    <div class="flex-1 mt-6 xl:mt-0">
                                        <div class="grid grid-cols-12 gap-x-5">
                                            <div class="col-span-12 2xl:col-span-6">
                                                <div class="mt-3">
                                                    <label for="update-profile-form-1" class="form-label">Nombres*</label>
                                                    <input id="nombre_usuario" type="text" class="form-control" placeholder="Nombre del usuario" value="<?php echo $name; ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-1" class="form-label">Email*</label>
                                                    <input id="email_usuario" type="email" class="form-control" placeholder="Input text" value="<?php echo $email; ?>">
                                                </div>
                                                <!-- <div class="mt-3">
                                                <label for="update-profile-form-2" class="form-label">Nearest MRT Station</label>
                                                <select id="update-profile-form-2" data-search="true" class="tom-select w-full">
                                                    <option value="1">Admiralty</option>
                                                    <option value="2">Aljunied</option>
                                                    <option value="3">Ang Mo Kio</option>
                                                    <option value="4">Bartley</option>
                                                    <option value="5">Beauty World</option>
                                                </select>
                                            </div> -->
                                            </div>

                                            <div class="col-span-12 2xl:col-span-6">
                                                <div class="mt-3">
                                                    <label for="update-profile-form-1" class="form-label">Apellidos*</label>
                                                    <input id="apellido_usuario" type="text" class="form-control" placeholder="Input text" value="<?php echo $apellido; ?>">
                                                </div>

                                                <div class="mt-3">
                                                    <label for="update-profile-form-4" class="form-label">Teléfono*</label>
                                                    <input id="telef_usuario" type="number" class="form-control" placeholder="<?php if (!$telefono) {
                                                                                                                                            echo 'No especificado';
                                                                                                                                        } else {
                                                                                                                                            echo $telefono;
                                                                                                                                        } ?>" value="<?php if (!$telefono) {
                                                                                                                                                            echo '';
                                                                                                                                                        } else {
                                                                                                                                                            echo $telefono;
                                                                                                                                                        } ?>">
                                                </div>
                                            </div>
                                            <div class="col-span-12 2xl:col-span-6">
                                                <div class="mt-3">
                                                    <label for="update-profile-form-3" class="form-label">Método de pago*</label>
                                                    <select id="meoto_pago" data-search="true" class="tom-select w-full">
                                                        <option value="0" <?php echo ($metodo == 0) ? 'selected' : ''; ?>>No seleccionado</option>
                                                        <option value="1" <?php echo ($metodo == 1) ? 'selected' : ''; ?>>Paypal</option>
                                                        <option value="2" <?php echo ($metodo == 2) ? 'selected' : ''; ?>>Airtmr</option>
                                                        <option value="3" <?php echo ($metodo == 3) ? 'selected' : ''; ?>>Wester Union</option>
                                                        <option value="4" <?php echo ($metodo == 4) ? 'selected' : ''; ?>>018925 - 21 PARK STREET MARINA...</option>
                                                        <option value="5" <?php echo ($metodo == 5) ? 'selected' : ''; ?>>018926 - 23 PARK STREET MARINA...</option>
                                                    </select>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-4" class="form-label">Enlace de telegram*</label>
                                                    <input id="enlace_telegram" type="text" class="form-control" placeholder="<?php if ($enlace_pago == '') {
                                                                                                                                            echo 'No especificado';
                                                                                                                                        } else {
                                                                                                                                            echo $enlace_pago;
                                                                                                                                        } ?>" value="<?php if ($enlace_pago == '') {
                                                                                                                                                            echo '';
                                                                                                                                                        } else {
                                                                                                                                                            echo $enlace_pago;
                                                                                                                                                        } ?>">
                                                </div>
                                            </div>
                                            <div class="col-span-12 2xl:col-span-6">
                                                <div class="mt-3">
                                                    <label for="update-profile-form-4" class="form-label">Enlace de pago*</label>
                                                    <input id="enlace_pago" type="text" class="form-control" placeholder="<?php if ($enlace_pago == '') {
                                                                                                                                        echo 'No especificado';
                                                                                                                                    } else {
                                                                                                                                        echo $enlace_pago;
                                                                                                                                    } ?>" value="<?php if ($enlace_pago == '') {
                                                                                                                                                        echo '';
                                                                                                                                                    } else {
                                                                                                                                                        echo $enlace_pago;
                                                                                                                                                    } ?>">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="update-profile-form-3" class="form-label">Género*</label>
                                                    <select id="genero_usuario" data-search="true" class="tom-select w-full">
                                                        <option value="0" <?php echo ($genero == 0) ? 'selected' : ''; ?>>No seleccionado</option>
                                                        <option value="1" <?php echo ($genero == 1) ? 'selected' : ''; ?>>Masucilo</option>
                                                        <option value="2" <?php echo ($genero == 2) ? 'selected' : ''; ?>>Femenino</option>
                                                        <option value="3" <?php echo ($genero == 3) ? 'selected' : ''; ?>>Prefiero no especificar</option>
                                                        <!-- <option value="4">018925 - 21 PARK STREET MARINA...</option>
                                                    <option value="5">018926 - 23 PARK STREET MARINA...</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-span-12">
                                            <div class="mt-3">
                                                <label for="update-profile-form-5" class="form-label">Address</label>
                                                <textarea id="update-profile-form-5" class="form-control" placeholder="Adress">10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore</textarea>
                                            </div>
                                        </div> -->
                                        </div>
                                        <button onclick="actualizarDatos();" type="button" class="btn btn-primary w-20 mt-3">Guardar</button>
                                    </div>
                                    <div class="w-52 mx-auto xl:mr-0 xl:ml-6">
                                        <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                            <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                <img class="rounded-md" alt="Midone - HTML Admin Template" src="images/profile-11.jpg">
                                                <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                            </div>
                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                <button type="button" class="btn btn-primary w-full">Cambiar foto</button>
                                                <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END: Display Information -->
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <?php
    include('page-master/js.php');
    ?>