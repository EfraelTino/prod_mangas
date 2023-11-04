<!-- BEGIN: Head -->
<?php
$title = 'Registrar nuevo capítulo';
include("page-master/head.php");
?>
<!-- END: Head -->

<body class="py-5 md:py-0">

    <!-- BEGIN: Top Bar -->
    <?php
    $nombre_ruta = 'Registro de capítulos nuevos';
    include("page-master/header.php");
    ?>
    <!-- END: Top Bar -->

    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <?php
        include("page-master/side-navbar.php");
        ?>
        <div class="alert alert-danger alert-dismissible hidden  items-center mb-2 propio_notificacion" role="alert" id="myAlert"> <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> <span id="noticia"></span><button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button> </div>
        <div class="content">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Registrar un nueva serie
                </h2>

            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box mt-5" style="margin-bottom: 10rem;">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                            <h2 class="font-medium text-base mr-auto">
                                Formulario de registro
                            </h2>
                            <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                <a href="capitulos" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Portada principal</label>
                                        <div data-single="true" action="#" class="dropzone dropzone_1" style="width: 100%;">
                                            <div class="fallback">
                                                <input name="archivo_crudo" id="archivo_crudo" type="file" accept=".pdf, .doc, .docx, .zip, .rar" />
                                            </div>
                                            <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">Suelte los archivos aquí o haga clic para cargarlos para visualizar la foto de portada.</div>
                                                <div class="text-slate-500"> Los archivos admitidos son: <span class="font-medium">PNG - </span> JPG - JPEG - WEBP </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-12 gap-2 mt-5">
                                        <!-- <label for="nombre_manga" class="form-label sm:w-20">Nombre</label> -->
                                        <input id="nombre_manga" type="text" class="form-control col-span-4" aria-label="default input inline 1" placeholder="Ingresa el nombre">
                                        <input id="link_referencial" type="text" class="form-control col-span-4" aria-label="default input inline 1" placeholder="Ingresa el Link referencial">
                                        <input id="informacion_serie" type="text" class="form-control col-span-4" ria-label="default input inline 1" placeholder="Ingresa la información de la serie ">
                                    </div>
                                    <!-- <div class="form-inline mt-5">
                                        <label for="link_referencial" class="form-label sm:w-20">Link referencial</label>
                                        <input id="link_referencial" type="text" class="form-control" placeholder="Ingresa el Link referencial">
                                    </div> -->
                                    <!-- <div class="form-inline mt-5">
                                        <label for="informacion_serie" class="form-label sm:w-20">Información de la serie</label>
                                        <input id="informacion_serie" type="text" class="form-control" placeholder="Ingresa la información de la serie ">
                                    </div> -->
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto editor (USD)</label>
                                        <input id="presupuesto_editor" type="number" class="form-control" placeholder="Ingresa un presupuesto para Editores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Editores (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="editores">
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 1";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Editor'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto traductor (USD)</label>
                                        <input id="presupuesto_traductor" type="number" class="form-control" placeholder="Ingresa un presupuesto para los Traductores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Traductores (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" id="traductores" multiple>
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 2";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Traductor'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto limpieza (USD)</label>
                                        <input id="presupuesto_limpieza" type="number" class="form-control" placeholder="Ingresa un presupuesto para los Limpiadores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Limpieza (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" id="limpiadores" multiple>
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 3";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Limpieza'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto RH (USD)</label>
                                        <input id="presupuesto_rh" type="number" class="form-control" placeholder="Ingresa un presupuesto para los Raw Hunter's">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Raw Hunter (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" id="raw_hunters" multiple>
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 4";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Raw Hunter'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto corrector (USD)</label>
                                        <input id="presupuesto_corrector" type="number" class="form-control" placeholder="Ingresa un presupuesto para los Correctores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Corrector (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" id="correctores" multiple>
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 5";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Corrector'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="presupuesto" class="form-label sm:w-20">Presupuesto Desensurador (USD)</label>
                                        <input id="presupuesto_desensurador" type="number" class="form-control" placeholder="Ingresa un presupuesto para los Desensuradores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Desensurador (5)</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" id="desensurador" multiple>
                                            <?php
                                            $sql_users = "SELECT u.userid, u.name, u.lastname
                                        FROM users u
                                        INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                        INNER JOIN roles r ON ur.rol_id = r.id
                                        WHERE r.id = 6";
                                            $result = $inigami->query($sql_users);
                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    echo '<option value="' . $userid . '">' . $fullName . ' - Desensurador'  . '</option>';
                                                }
                                                $result->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>  
                                        </select>

                                    </div>
                                    <div class="form-inline mt-5">
                                    <label for="horizontal-form-2" class="form-label sm:w-20">Fecha de salida (5)</label>

                                        <div class="relative w-56 mx-auto">
                                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400"> <i data-lucide="calendar" class="w-4 h-4"></i> </div>
                                            <input type="text" class="datepicker form-control pl-12" data-single-mode="true" id="fecha_salida">
                                        </div>
                                    </div>
                                    <div class="sm:ml-20 sm:pl-5 mt-5">
                                        <button type="button" onclick="nuevaSerie();" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- END: Horizontal Form -->
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- BEGIN: JS Assets-->
        <?php
        include('page-master/js.php');
        ?>
</body>

</html>