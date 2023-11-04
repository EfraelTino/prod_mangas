
<div class="contenedor_ver_cap" id="contenedor_modal">
    <div class="ocupa_ver_cap"  id="modal-content">
    <div class="flex overflow-hidden">
        <!-- BEGIN: Head -->
        <?php
        // $title = 'Todos los capítulos';
        // include("page-master/head.php");
        // if (isset($_GET['id'])) {
        //     echo "el id es" . $_GET['id'];
        //     $id_cap = $_GET['id'];
        // } else {
        //     header("location: capitulos.php");
        // }
        ?>
        <!-- END: Head -->
        <div class="contenido_modal">
            <div class="intro-y flex items-center">
                <h2 class="text-lg font-medium mr-auto">
                    Detalles del capítulo
                </h2>
                <p class="modal-body" ></p>
                <button onclick="verCap();">Cerrar</button>
            </div>
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Profile Menu -->
                <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
                    <div class="intro-y box mt-5">
                        <div class="relative flex items-center ">
                            <div class="mt-3 mb-3" style="width: 100%;">
                                <div class="p-5">
                                    <div class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                                    <img alt="Midone - HTML Admin Template" class="rounded-md" src="serie_image/<?php echo $foto?>">
                                        <!-- <span class="absolute top-0 bg-pending/80 text-white text-xs m-5 px-2 py-1 rounded z-10">Previsualización</span> -->
                                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href="" class="block font-medium text-base" style="text-transform: uppercase;"><?php echo $name_cap ?></a>
                                            <!-- <span class="text-white/90 text-xs mt-3">Electronic</span> -->
                                        </div>
                                    </div>
                                    <div class="text-slate-600 dark:text-slate-500 mt-5">
                                        <div class="flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="link" data-lucide="link" class="lucide lucide-link w-4 h-4 mr-2">
                                                <path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"></path>
                                                <path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"></path>
                                            </svg>Presupuesto: $21 </div>
                                        <div class="flex items-center mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="calendar" data-lucide="calendar" class="lucide lucide-calendar lucide-link w-4 h-4 mr-2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            Fecha de salida: 31 Oct, 2023
                                        </div>
                                        <!-- <div class="flex items-center mt-2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                            </svg> Status: Active
                                        </div>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="p-5 border-t border-slate-200/60 dark:border-darkmode-400 flex">
                            <button type="button" class="btn btn-primary py-1 px-2">New Group</button>
                            <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto">New Quick Link</button>
                        </div> -->
                    </div>
                </div>
                <!-- END: Profile Menu -->
                <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                    <!-- BEGIN: Change Password -->
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Personas designadas
                            </h2>
                        </div>
                        <div class="p-5">
                            <div>
                                <label for="change-password-form-1" class="form-label"><strong>Editores</strong></label>
                                <div class="grid grid-cols-12 gap-2">
                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `editores` ON `usuarios_roles`.`usuario_id` = `editores`.`editor_id`
                                        INNER JOIN `capitulo` ON `editores`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido, ";
                                            }
                                        } else {
                                            echo "No hay Editores";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Editor</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-1" class="form-label"><strong>Traductores</strong></label>

                                <div class="grid grid-cols-12 gap-2">

                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `traductores` ON `usuarios_roles`.`usuario_id` = `traductores`.`traductor_id`
                                        INNER JOIN `capitulo` ON `traductores`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido, ";
                                            }
                                        } else {
                                            echo "No hay Traductores";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Traductor</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-1" class="form-label"><strong>Limpiadores</strong></label>

                                <div class="grid grid-cols-12 gap-2">
                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `limpieza` ON `usuarios_roles`.`usuario_id` = `limpieza`.`limpieza_id`
                                        INNER JOIN `capitulo` ON `limpieza`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido, ";
                                            }
                                        } else {
                                            echo "No hay Limpiadores";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Limpiador</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-1" class="form-label"><strong> Hunter's</strong> </label>

                                <div class="grid grid-cols-12 gap-2">
                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `rh` ON `usuarios_roles`.`usuario_id` = `rh`.`rh_id`
                                        INNER JOIN `capitulo` ON `rh`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido, ";
                                            }
                                        } else {
                                            echo "No hay Raw Hunters";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Raw Hunter</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-1" class="form-label"><strong> Raw Correctores </strong></label>
                                <div class="grid grid-cols-12 gap-2">
                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `corrector` ON `usuarios_roles`.`usuario_id` = `corrector`.`corrector_id`
                                        INNER JOIN `capitulo` ON `corrector`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido, ";
                                            }
                                        } else {
                                            echo "No hay Correctotres";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Corrector</button>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="change-password-form-1" class="form-label"><strong> Desensuradores</strong></label>

                                <div class="grid grid-cols-12 gap-2">
                                    <p class="col-span-6">
                                        <?php
                                        $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
                                        FROM `usuarios_roles`
                                        INNER JOIN `desensurador` ON `usuarios_roles`.`usuario_id` = `desensurador`.`desensurador_id`
                                        INNER JOIN `capitulo` ON `desensurador`.`cap_id` = `capitulo`.`id_cap`
                                        INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
                                        WHERE `capitulo`.`id_cap` = $id_cap";
                                        $result = $inigami->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nombre = $row['name'];
                                                $apellido = $row['lastname'];
                                                echo "$nombre $apellido";
                                            }
                                        } else {
                                            echo "No hay editores";
                                        }
                                        ?>
                                    </p>
                                    <button class="btn btn-primary col-span-6">Unirme como Desensurador </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Change Password -->
                </div>
            </div>
        </div>
    </div>
    </div>
</div>