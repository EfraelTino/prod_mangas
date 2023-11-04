<?php
session_start();
$title = "Conectado";
include('page-master/head.php');
if (isset($_SESSION["userid"]) &&  $_SESSION["userid"]) {
    $userid =  $_SESSION["userid"];
} else {
    header("Location: ./");
}
//echo $userid;

include('page-master/js.php');
?>

<body>

    <div class="container-conectado-logo">
        <img src="textures/conectado_logo.webp" alt="">
    </div>
    <div class="container-skins" id="contColores">
        <!-- <span class="icon-chevron-right" id="mostrarA" ></span> -->
        <button class="btn_show" id="btnShow" onclick="mostrarA();">Avatar</button>
        <div class="wrap_skins" id="skins_cont" hidden>
            <h2>Select your Avatar</h2>
            <button class="skin_one" data-skin-number="1" onclick="seleccionarA(255);"><img src="images/King.png" class="skins" alt="primer skin" id="mujer"></button>
            <button class="skin_two" data-skin-number="2" onclick="seleccionarA(1500);"><img src="images/Queen.png" class="skins" alt="segundo skin" id="hombre">></button>

        </div>

    </div>
    <div class="container-skins2" id="contColores">
        <!-- <span class="icon-chevron-left" id="mostrarC" onclick="mostrarC();"></span> -->
        <button class="btn_show show_2" id="btnShow2" onclick="mostrarC();">Skin</button>
        <div class="wrap_skins2" id="skins_cont2" hidden>
            <h2>Select your skins</h2>
            <button class="skin_one" data-skin-number="1" onclick="seleccionarC();"><img src="images/yellow.png" class="skins" alt="primer skin" id="color1"></button>
            <button class="skin_two" data-skin-number="2" onclick="seleccionarC();"><img src="images/gray.png" class="skins" alt="segundo skin" id="color2">></button>

        </div>

    </div>
    <div class="container-emojis">
        <button id="Saludo" class="emoji-button">
            <img src="images/han.webp" alt="greeting icon" class="icon-hand">
        </button>
        <button id="Dance" class="emoji-button">
            <img src="images/dancing.webp" alt="greeting icon" class="icon-greting">
        </button>
        <button id="suggestion_button" class="emoji-button" onclick="showSuggestion();">
            <img src="images/suggestion.webp" alt="greeting icon" class="icon-suggestion">
        </button>
        <button class="btn_sms" onclick="showSms();">
            <span class="icon-message-circle"></span>
        </button>
        <button class="btn_camera">
            <span class="icon-camera"></span>
        </button>

        <button class="btn_logout">
            <span class="icon-log-out"></span>
        </button>
    </div>

    <div class="sms-container">
        <div class="conte-suggestion" id="sms_container">
            <div class="close_container">
                <button class="btn_x" onclick="showSms();"> <span class="icon-x"></span></button>
            </div>
            <div class="container_mess">
                <h3 class="suggestion_text group    ">GROUP CHAT</h3>
                <?php if (isset($_SESSION['userid']) && $_SESSION['userid']) { ?>
                    <div id="canvasZone"><canvas id="renderCanvas"></canvas></div>
                    <div class="chat">
                        <div id="frame" class="frame-chat">
                            <div id="sidepanel">
                                <div id="profile">

                                    <?php
                                    include('Chat.php');
                                    $chat = new Chat();
                                    $loggedUser = $chat->getUserDetails($_SESSION['userid']);
                                    echo '<div class="wrap">';
                                    $currentSession = '';
                                    foreach ($loggedUser as $user) {
                                        $currentSession = $user['current_session'];
                                        $avatar = $user['avatar'];
                                        //colocarAvatar($avatar);

                                        echo '<div class="profile-container">
							<div class="picture-profile">
							<img id="profile-img" src="' . 'userpics/' . $user['img_profile'] . '" class="online" alt="user-profile" />';
                                        echo  '<p>' . $user['fname'] . ' ' . $user['lastname'] . '</p> </div>';
                                        // echo '<div><i class="icon-chevron-down" aria-hidden="true" onclick="salir()"></i> <i class="icon-x" onclick="cerrarChat();"></i></div> ';
                                        echo '<div id="status-options">';
                                        echo '<ul>';
                                        echo '<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>';
                                        echo '<li id="status-away"><span class="status-circle"></span> <p>Ausente</p></li>';
                                        echo '<li id="status-busy"><span class="status-circle"></span> <p>Ocupado</p></li>';
                                        echo '<li id="status-offline"><span class="status-circle"></span> <p>Desconectado</p></li>';
                                        echo '</ul>';
                                        echo '</div>';
                                        echo '<div id="expanded" class="container-salir">';
                                        echo '<a href="logout.php" class="op-salir"> Sign off <span class="icon-log-out"></span> </a>';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                    ?>
                                </div>
                                <!-- <div id="search">
							<label for=""><i class="icon-search" aria-hidden="true"></i></label>
							<input type="text" placeholder="Buscar Contactos..." />
						</div> -->
                                <style>
                                    .btn-go {
                                        margin-top: 10px;
                                        display: flex;
                                        justify-content: space-between;
                                        align-items: center;
                                    }

                                    .btn-go button {
                                        background-color: var(--color-secundario);
                                        border: 1px solid var(--color-primario);
                                        margin-right: 2px;
                                        font-size: 14px;
                                        cursor: pointer;
                                        font-weight: 700;
                                        border-radius: 4px;
                                    }

                                    .btn-go button span {
                                        font-weight: 800;
                                    }
                                </style>
                                <div id="contacts" hidden>

                                    <?php
                                    echo '<div class="btn-go">';
                                    echo '<h4 style="margin: 0;">Members chat</h4>';
                                    echo '</div>';

                                    echo '<ul style="position:relative;">';

                                    $chatUsers = $chat->chatUsers($_SESSION['userid']);
                                    $chatButtonDisplayed = false;
                                    $enlinea = 0;
                                    foreach ($chatUsers as $user) {
                                        if ($user['online'] == 0) {
                                            continue;
                                        }
                                        $status = 'offline';
                                        if ($user['online'] == 1) {
                                            $status = 'online';
                                        }
                                        $activeUser = '';
                                        if ($user['userid'] == $currentSession) {
                                            $activeUser = "active";
                                        }
                                        if (!$chatButtonDisplayed) {
                                            echo '<li id="' . $user['userid'] . '" class="contact ' . $activeUser . '" data-touserid="' . $user['userid'] . '" data-tousername="' . $user['username'] . '" onclick="verMensaje();" style="background:var(--color-en-linea); font-size: 20px; font-weight: 700; text-align: center;
        							border-radius: 6px; margin: 0px 2px 2px 0px; cursor:pointer;  position:sticky; top: 0; z-index: 3;"> Enter the group chat <span class="icon-send" style="font-weight:900;"></span>';
                                            echo ' </li>';
                                            $chatButtonDisplayed = true;
                                        }
                                        echo '<li id="' . $user['userid'] . '" class="contact ' . $activeUser . '" data-touserid="' . $user['userid'] . '" data-tousername="' . $user['username'] . '">';
                                        echo '<div class="wrap">';
                                        echo '<div class="contact-profile-contact">';
                                        echo '<span id="status_' . $user['userid'] . '" class="contact-status ' . $status . '"></span>';
                                        echo '<img src="userpics/' . $user['img_profile'] . '" alt="" /> ';
                                        echo '<div class="meta">';
                                        echo '<p class="name">' . $user['fname'] . ' ' . $user['lastname'] . '</p>';
                                        echo '<p class="preview"><span id="isTyping_' . $user['userid'] . '" class="isTyping"></span></p>';
                                        echo '</div></div><div class="icon-cant-sms"><span id="unread_' . $user['userid'] . '" class="">' . $chat->getUnreadMessageCount($user['userid'], $_SESSION['userid']) . '</span></div>';
                                        echo '</div>';
                                        echo '</li>';
                                        $enlinea++;
                                    }
                                    if ($enlinea === 0) {
                                        echo '<div>No hay usuarios en línea</div>';
                                    }
                                    echo '</ul>';
                                    ?>

                                </div>


                                <div id="bottom-bar" style="display: none;">
                                    <button id="addcontact"><i class="icon-user" aria-hidden="true"></i> <span>Agregar Contactos</span></button>
                                    <button id="settings"><i class="icon-settings" aria-hidden="true"></i> <span>Configuracion</span></button>
                                </div>
                            </div>
                            <div class="content" id="content">
                                <div class="contact-profile" id="userSection" style="display: none;">
                                    <?php
                                    $userDetails = $chat->getUserDetails($currentSession);
                                    foreach ($userDetails as $user) {
                                        echo '<div  class="img_profile">' . '<span class="icon-arrow-left ico-back" onclick="abrirchat();"></span> ' . '<img src="userpics/conectado.png' . '" alt="user-icon" />';
                                        // $user['fname'] .' '. $user['lastname'] 
                                        echo '<p>' . 'GLOBAL CHAT' . '</p>' . ' </div>';
                                        echo '<div class="social-media">';
                                        // echo '<i class="icon-facebook" aria-hidden="true"></i>';
                                        // echo '<i class="icon-twitter" aria-hidden="true"></i>';
                                        // echo '<i class="icon-instagram" aria-hidden="true">';
                                        echo '</i> <span class="icon-x i-cerrar" onclick="cerrarChat();"></span>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="messages" id="conversation">
                                    <?php
                                    echo $chat->getUserChat($_SESSION['userid'], $currentSession);
                                    ?>
                                </div>
                                <div class="message-input" id="replySection">
                                    <div class="message-input" id="replyContainer">

                                        <div class="wrap">
                                            <input type="text" class="chatMessage" id="chatMessage<?php echo $currentSession; ?>" placeholder="Escribe tu mensaje..." />
                                            <button class="submit chatButton" id="chatButton<?php echo $currentSession; ?>"><i class="icon-send" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <audio id="audio" controls hidden>
                        <source type="audio/wav" src="audio/send.mp3">
                    </audio>
                <?php } else { ?>
                    <?php include "index.php" ?>
                <?php } ?>
            </div>



        </div>
    </div>
    <div class="suggestion-container">
        <div class="conte-suggestion" id="suggestion_container">
            <button class="btn_x" onclick="showSuggestion();"> <span class="icon-x"></span></button>
            <img src="images/logo_conectado.webp" alt="logo conectado" class="logo_conectado">
            <h3 class="suggestion_text">SUGGESTION <strong>BOX</strong></h3>
            <?php
            $sql = "SELECT fname, lastname, username FROM chat_users WHERE userid = '$userid'";
            $stmt = $chat->dbConnect->query($sql);
            if (!$stmt) {
                die("Error en la consulta: " . $chat->dbConnect->error);
            }
            while ($row = $stmt->fetch_assoc()) {
                $fname = $row['fname'];
                $lname = $row['lastname'];
                $completename = $fname . ' ' . $lname;
                $username = $row['username'];
            }
            ?>
            <div id="value_userid" value="<?php $userid ?>"></div>
            <form action="" method="" id="" class="form_col">
                <input type="text" value="<?php echo $completename ?>" name="fname" id="fname" hidden>
                <input type="text" value="<?php echo $username ?>" name="email" id="email" hidden>
                <textarea type="text" id="input_suggestion" name="input_suggestion" class="input_suggestion" placeholder="PLEASE LEAVE US YOUR COMMENTS OF THE EXPERIENCE IN CONECTADO WORD"></textarea>
                <button type="button" class="send_suggestion" onclick="enviarSugerencia();">SEND</button>
                <div id="respuesta">

                </div>
            </form>

        </div>
    </div>
    <div class="conectado_container">
        <iframe id="vagonFrame" allow="microphone  *; clipboard-read *; clipboard-write *; encrypted-media *;" src="https://streams.vagon.io/streams/8f59150f-3bc6-4a99-8f47-123a6960ed21 " class="view_conectado" />
    </div>

    <?php
    include "page-master/footer.php";
    ?>