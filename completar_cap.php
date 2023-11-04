<!-- BEGIN: Head -->
<?php
$title = 'Registrar nuevo capítulo';
include("page-master/head.php");
if (isset($_GET['serie']) && isset($_GET['nombre'])) {
    $serieid = $_GET['serie'];
    $nombre_cap = $_GET['nombre'];
    $link_ref = $_GET['link_ref'];
    $info_cap = $_GET['info_cap'];
} else {
    header("location: nuevo_capitulo.php");
}
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
                                <?php
                                echo $serieid . "<br>";
                                echo $nombre_cap . "<br>";
                                echo $link_ref . "<br>";
                                echo $info_cap . "<br>";
                                ?>
                            1-> EDITOR <br>
                            2-> TRADUCTOR <br>
                            3-> LIMPIEZA <br>
                            4-> RAW HUNTER <br>
                            5-> CORRECTOR <br>
                            6-> DESENSURADOR <br>
                            7-> ADMINISTRADOR <br>

                            AL  CREAR EL CAP. SE ELIMINAN LOS QUE YA ESTABAN Y SE VUELVEN A INSERTAR NUEVOS --- PARA NO GENERAR CONFLICTOS
                            </h2>
                            <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0">
                                <a href="capitulos" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>
                        <div id="horizontal-form" class="p-5">
                            <div class="preview">
                                <form action="" method="post">
                                    <div class="form-inline mt-5">
                                        <input type="number" value="<?php echo $serieid; ?>" id="numero_serie" hidden>
                                        <input type="text" value="<?php echo $nombre_cap; ?>" id="nombre_cap" hidden>
                                        <input type="text" value="<?php echo $link_ref; ?>" id="link_ref" hidden>
                                        <input type="text" value="<?php echo $info_cap; ?>" id="info_cap" hidden>
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
                                    </div>
                                    <div class="form-inline mt-5">
                                        <label for="cantidad_editores" class="form-label sm:w-20">Cantidad Editores (5*)</label>
                                        <input id="cantidad_editores" type="number" class="form-control" placeholder="Ingrese la cantidad de Editores">
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
                                        <label for="horizontal-form-2" class="form-label sm:w-20">Editores</label>
                                        <select data-placeholder="Select your favorite actors" data-header="Lista de usuarios" class="tom-select w-full" multiple id="editores">
                                            <?php
                                            $sql_e ="SELECT e.editor_id, us.userid FROM editores AS e INNER JOIN series s ON e.serie_id = s.id INNER JOIN usuarios_roles AS ur ON e.editor_id = ur.usuario_id INNER JOIN users as us ON ur.usuario_id = us.userid WHERE s.id= $serieid";
                                            $res_e = $inigami->query($sql_e);
                                            $select_E = array();
                                            if($res_e){
                                                while($row=$res_e->fetch_assoc()){
                                                    $userid = $row['userid'];
                                                    $select_E[]= $userid;
                                                }
                                                $res_e->free();
                                            }
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
                                                    $select_ED= in_array($userid,$select_E);

                                                    echo '<option value="' . $userid . '"' . ($select_ED ? 'selected'  : '') .'>'.$fullName . ' - Editor'  . '</option>';
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
                                            $sql_t ="SELECT t.traductor_id, us.userid FROM traductores AS t INNER JOIN series s ON t.serie_id = s.id INNER JOIN usuarios_roles AS ur ON t.traductor_id = ur.usuario_id INNER JOIN users as us ON ur.usuario_id = us.userid WHERE s.id= $serieid";
                                            $res_t= $inigami->query($sql_t);
                                            $select_t= array();
                                            if($res_t){
                                                while($row= $res_t->fetch_assoc()){
                                                    $userid= $row['userid'];
                                                    $select_t[]=$userid;
                                                }
                                                $res_t->free();
                                            }
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
                                                    $select_Ts=in_array($userid, $select_t);

                                                    echo '<option value="' . $userid . '"' . ($select_Ts ? 'selected' : '').'>'.$fullName . ' - Traductor'  . '</option>';
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
                                            $sql_l ="SELECT l.limpieza_id, us.userid FROM limpieza AS l INNER JOIN series s ON l.serie_id = s.id INNER JOIN usuarios_roles AS ur ON l.limpieza_id = ur.usuario_id INNER JOIN users as us ON ur.usuario_id = us.userid WHERE s.id= $serieid";
                                            $resu = $inigami->query($sql_l);
                                            $sel_l = array();
                                            if($resu){
                                                while($row = $resu->fetch_assoc()){
                                                    $userid= $row['userid'];
                                                    $sel_l[]=$userid;
                                                }
                                                $resu->free();
                                            }
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
                                                    $select_l= in_array($userid, $sel_l);

                                                    echo '<option value="' . $userid . '"' . ($select_l ? 'selected': '').'>'.$fullName . ' - Limpieza'  . '</option>';
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
                                            $sql_rh = "SELECT rh.rh_id, us.userid FROM rh AS rh INNER JOIN series AS s ON rh.serie_id = s.id INNER JOIN usuarios_roles AS ur ON rh.rh_id = ur.usuario_id INNER JOIN users AS us on ur.usuario_id = us.userid WHERE s.id= $serieid";
                                            $res= $inigami->query($sql_rh);
                                            $sels = array();

                                            if($res){
                                                while($row = $res->fetch_assoc()){
                                                    $userid= $row['userid'];
                                                    $sels[]=$userid;
                                                }
                                                $res->free();
                                            }
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
                                                    $selss=in_array($userid, $sels);

                                                    echo '<option value="' . $userid . '"' . ($selss ? 'selected':'').'>'.$fullName . ' - Raw Hunter'  . '</option>';
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
                                            $sql_u_c ="SELECT c.corrector_id, us.userid FROM corrector AS c INNER JOIN series s ON c.serie_id = s.id INNER JOIN usuarios_roles AS ur ON c.corrector_id = ur.usuario_id INNER JOIN users as us ON ur.usuario_id = us.userid WHERE s.id= $serieid";
                                            $results = $inigami->query($sql_u_c);
                                            $selectedUserss = array();
                                            if($results){
                                                while($row = $results->fetch_assoc()){
                                                    $userid = $row['userid'];
                                                    $selectedUserss[]= $userid;
                                                }
                                                $results->free();
                                            }
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
                                                    $selectC= in_array($userid, $selectedUserss);

                                                    echo '<option value="' . $userid . '"' . 
                                                    ($selectC ? 'selected' : '').'>'.
                                                    $fullName . ' - Corrector'  . '</option>';
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
                                            // Realiza la consulta para obtener todos los desensuradores
                                            $sql_users = "SELECT d.desensurador_id, us.userid 
                  FROM desensurador AS d
                  INNER JOIN series AS s ON d.serie_id = s.id
                  INNER JOIN usuarios_roles AS ur ON d.desensurador_id = ur.usuario_id
                  INNER JOIN users AS us ON ur.usuario_id = us.userid
                  WHERE s.id = $serieid";

                                            $result = $inigami->query($sql_users);
                                            $selectedUsers = array(); // Almacena los IDs de los usuarios seleccionados

                                            if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $userid = $row['userid'];
                                                    $selectedUsers[] = $userid; // Agrega el ID del usuario a la lista de seleccionados
                                                }
                                                $result->free();
                                            }

                                            // Realiza una segunda consulta para obtener todos los desensuradores (sin filtro)
                                            $sql_all_users = "SELECT u.userid, u.name, u.lastname
                                            FROM users u
                                            INNER JOIN usuarios_roles ur ON u.userid = ur.usuario_id
                                            INNER JOIN roles r ON ur.rol_id = r.id
                                            WHERE r.id = 6
                                            ";
                                            $result_all_users = $inigami->query($sql_all_users);

                                            if ($result_all_users) {
                                                while ($row = $result_all_users->fetch_assoc()) {
                                                    $name = $row['name'];
                                                    $lastname = $row['lastname'];
                                                    $fullName = $name . ' ' . $lastname;
                                                    $userid = $row['userid'];

                                                    // Verifica si el usuario está en la lista de seleccionados
                                                    $isSelected = in_array($userid, $selectedUsers);

                                                    // Agrega el atributo "selected" si el usuario está en la lista de seleccionados
                                                    echo '<option value="' . $userid . '" ' . ($isSelected ? 'selected' : '') . '>' . $fullName . ' - Desensurador' . '</option>';
                                                }
                                                $result_all_users->free();
                                            } else {
                                                echo "No se encontraron usuarios con rol 1";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                    <div class="sm:ml-20 sm:pl-5 mt-5">
                                        <button type="button" onclick="guardarCap();" class="btn btn-primary">Guardar</button>
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