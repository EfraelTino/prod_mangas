<?php

// Función para mostrar roless
function mostrarRoles($roleName, $roleTable, $roleName_id, $id_cap, $db) {
    $sql = "SELECT DISTINCT `users`.`name`, `users`.`lastname`
            FROM `usuarios_roles`
            INNER JOIN `$roleTable` ON `usuarios_roles`.`usuario_id` = `$roleTable`.`$roleName_id`
            INNER JOIN `capitulo` ON `$roleTable`.`cap_id` = `capitulo`.`id_cap`
            INNER JOIN `users` ON `usuarios_roles`.`usuario_id` = `users`.`userid`
            WHERE `capitulo`.`id_cap` = $id_cap";
            

    $result = $db->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row['name'];
            $apellido = $row['lastname'];
            echo "$nombre $apellido, ";
        }
    } else {
        echo "No hay $roleName";
    }

}

function obtenerRolesUsuario($userid, $db)
{
    $usuarioRoles = array();

    $sql = "SELECT `roles`.`roles` FROM `usuarios_roles`
            INNER JOIN `roles` ON `usuarios_roles`.`rol_id` = `roles`.`id`
            WHERE `usuarios_roles`.`usuario_id` = $userid";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $usuarioRoles[] = $row['roles'];
        }
    }

    return $usuarioRoles;
}

?>
