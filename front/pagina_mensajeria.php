<?php 
session_start();
include("cabecera_log.php");
include("../back/connection.php");
if (!isset($_SESSION['id_user'])) {
    header('location:index.php');
    exit;
}

$selectedChatUserId = $_GET['selectedChatUserId'] ?? null;

$selectedChatUserName = '';
if ($selectedChatUserId) {
    $sqlReceiverName = "SELECT user FROM `usuarios` WHERE `id_user` = " . mysqli_real_escape_string($conexion, $selectedChatUserId);
    $queryReceiverName = mysqli_query($conexion, $sqlReceiverName);
    if (mysqli_num_rows($queryReceiverName) > 0) {
        $rowReceiverName = mysqli_fetch_assoc($queryReceiverName);
        $selectedChatUserName = $rowReceiverName['user'];
    }
}
?>
<head>
    <title>Sistema de mensajería</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="corner-buttons">
    <style>
        .corner-buttons {
        position: absolute;
        top: 150px;
        left: 70px;
        }

        .corner-buttons button {
        background-color: #66CCCC; /* color pal fondo */
        color: #FFFFFF; /* esto es pal texto */
    }
    </style>
    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
    <button class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></button>
    <button class="navbar-brand" href="#"><?php echo $selectedChatUserName ? 'Chat con ' . $selectedChatUserName : 'Usuario'; ?></button>
    </div>
    <div class="chat-container">
    <style>
        .user-list button {
        background-color: #CCFF99; 
        color: #FFFFFF; 
    }
    
    </style>
        <div class="user-list">
            <h2>Usuarios</h2>
            <ul>
                <?php 
                $sqlUsers = "SELECT * FROM `usuarios` WHERE `id_user` <> " . mysqli_real_escape_string($conexion, $_SESSION['id_user']);
                $queryUsers = mysqli_query($conexion, $sqlUsers);
                if (mysqli_num_rows($queryUsers) > 0) {
                    while ($rowUser = mysqli_fetch_assoc($queryUsers)) {
                        if($rowUser['conection'] == 1){
                            
                            echo '<div class="containerr">
                            <div class="circle"></div>
                              En línea <li class="user"><button><a href="?selectedChatUserId=' . urlencode($rowUser['id_user']) . '">' . $rowUser['user'] . '</a></li></button>
                            </div> ';
                        }
                        else{
                            echo '<div class="containerr">
                            <div class="circlee"></div>
                              Ausente <li class="user"><button><a href="?selectedChatUserId=' . urlencode($rowUser['id_user']) . '">' . $rowUser['user'] . '</a></li></button>
                            </div>' ;
                        }
                    }
                } 
                ?>
            </ul>
        </div>

        <div class="chat">
            <?php
            if ($selectedChatUserId) {
                $sql = "SELECT c.*, u.user as username FROM `chat` c 
                        JOIN `usuarios` u on c.id_emisor = u.id_user
                        WHERE (c.id_emisor = '" . mysqli_real_escape_string($conexion, $_SESSION['id_user']) . "' AND c.id_receptor = '" . mysqli_real_escape_string($conexion, $selectedChatUserId) . "') 
                        OR (c.id_emisor = '" . mysqli_real_escape_string($conexion, $selectedChatUserId) . "' AND c.id_receptor = '" . mysqli_real_escape_string($conexion, $_SESSION['id_user']) . "') 
                        ORDER BY c.created_on";
            
                $query = mysqli_query($conexion, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $messageSender = ($row['id_emisor'] === $_SESSION['id_user']) ? 'Tú' : $row['username'];
                        echo '<div class="message ' . ($row['id_emisor'] === $_SESSION['id_user'] ? 'outgoing' : 'incoming') . '">
                            <div class="message-sender">'.$messageSender.'</div>
                            <div class="message-content">'.$row['message'].'</div>
                        </div>';
                    }
                } else {
                    echo '<div class="message incoming">
                        <div class="message-sender">System</div>
                        <div class="message-content">No hay ninguna conversación previa.</div>
                    </div>';
                }
            }
            ?>
            
                <form class="message-form" method="POST" action="sendMessage.php">
                    <input type="hidden" name="receiver" value="<?php echo htmlspecialchars($selectedChatUserId); ?>">
                    <input type="text" name="msg" placeholder="Escribe un mensaje..." required>
                    <button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
            
        </div>
    </div>
    </nav>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php include("pie.php");?>
</body>
