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
                    Registrar un nuevo capítulo
                </h2>

            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y col-span-12 lg:col-span-12">
                    <!-- BEGIN: Horizontal Form -->
                    <div class="intro-y box mt-5">
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
                                <form action="" method="post">
                                    <!-- <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Selecciona el archivo</label>
                                        <div data-single="true" action="#" class="dropzone dropzone_2" style="width: 100%;">
                                            <div class="fallback">
                                                <input name="file" type="file" accept=".png, .jpg, .webp, .jpeg" />
                                            </div>
                                            <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">Suelte los archivos aquí o haga clic para cargarlos.</div>
                                                <div class="text-slate-500"> Los archivos admitidos son: <span class="font-medium">PDF - </span> WORD - ZIP - RAR </div>

                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="grid grid-cols-12 gap-2 mt-5">
                                        <!-- <label for="nombre_manga" class="form-label sm:w-20">Nombre</label> -->



                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="serie_seleccionado" class="form-label sm:w-20">Nombre del capítulo</label>
                                        <input id="nombre_capitulo" type="text" class="form-control col-span-4" placeholder="Ingresa el nombre del capítulo">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="link_referencial" class="form-label sm:w-20">Link Referencial</label>
                                        <input id="link_referencial" type="text" class="form-control col-span-4" placeholder="Ingresa el Link referencial del capítulo">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="info_capitulo" class="form-label sm:w-20">Información de capítulo</label>
                                        <input id="info_capitulo" type="text" class="form-control col-span-4" placeholder="Ingresa la información del capítulo">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="serie_seleccionado" class="form-label sm:w-20">Selecciona la serie</label>
                                        <!-- <input id="serie_seleccionado" type="number" class="form-control" placeholder="Ingrese la cantidad de Editores"> -->
                                        <select class="form-select mt-2 sm:mr-2" aria-label="Default select example" id="serie_seleccionado">
                                            <?php
                                            $sql_series = "SELECT * FROM series";
                                            $res = $inigami->query($sql_series);
                                            if ($res) {
                                                while ($row = $res->fetch_assoc()) {
                                                    $nombre_serie = $row['nombre_de_la_serie'];
                                                    $id_serie = $row['id'];
                                                    echo '<option value="' . $id_serie . '">' . $nombre_serie . '</option>';
                                                }
                                                $res->free();
                                            } else {
                                                echo "Aún no se encontró ninguna serie ";
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <!-- <div class="form-inline mt-5">
                                        <label for="cantidad_editores" class="form-label sm:w-20">Cantidad Editores (5*)</label>
                                        <input id="cantidad_editores" type="number" class="form-control" placeholder="Ingrese la cantidad de Editores">
                                    </div> -->

                                    <!-- <div class="form-inline mt-5">
                                        <label for="link_referencial" class="form-label sm:w-20">Link referencial</label>
                                        <input id="link_referencial" type="text" class="form-control" placeholder="Ingresa el Link referencial">
                                    </div> -->
                                    <!-- <div class="form-inline mt-5">
                                        <label for="informacion_serie" class="form-label sm:w-20">Información de la serie</label>
                                        <input id="informacion_serie" type="text" class="form-control" placeholder="Ingresa la información de la serie ">
                                    </div> -->
                                    <!-- <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Editores</label>
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
                                        <label for="traductores" class="form-label sm:w-20">Cantidad Traductores (5*)</label>
                                        <input id="cantidad_traductores" type="number" class="form-control" placeholder="Ingrese la cantidad de Traductores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Traductores</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="traductores">
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
                                        <label for="cantidad_limpieza" class="form-label sm:w-20">Cantidad Limpieza (5*)</label>
                                        <input id="cantidad_limpieza" type="number" class="form-control" placeholder="Ingrese la cantidad de Limpiadores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Limpieza</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="limpieza">
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
                                        <label for="cantidad_rh" class="form-label sm:w-20">Cantidad Raw Hunter (5*)</label>
                                        <input id="cantidad_rh" type="number" class="form-control" placeholder="Ingrese la cantidad de Raw Hunter">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Raw Hunter </label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="rawhunters">
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
                                        <label for="cantidad_correctores" class="form-label sm:w-20">Cantidad Correctores(5*)</label>
                                        <input id="cantidad_correctores" type="number" class="form-control" placeholder="Ingrese la cantidad de Correctores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Correctores</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="correctores">
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
                                        <label for="cantidad_desensurador" class="form-label sm:w-20">Cantidad Desensurador (5*)</label>
                                        <input id="cantidad_desensurador" type="number" class="form-control" placeholder="Ingrese la cantidad de Desensuradores">
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Desensurador</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="desensurador">
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
                                    </div> -->
                                    <div class="sm:ml-20 sm:pl-5 mt-5">
                                        <button type="button" onclick="nuevocapitulo();" class="btn btn-primary">Guardar</button>
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