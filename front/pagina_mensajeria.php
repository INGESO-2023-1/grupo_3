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
    <title>Systema de mensajeria</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['user']; ?></a>
    <a class="navbar-brand" href="#"><?php echo $selectedChatUserName ? 'Conversación con ' . $selectedChatUserName : 'User'; ?></a>
    <div class="chat-container">
        <div class="user-list">
            <h2>Usuarios</h2>
            <ul>
                <?php 
                $sqlUsers = "SELECT * FROM `usuarios` WHERE `id_user` <> " . mysqli_real_escape_string($conexion, $_SESSION['id_user']);
                $queryUsers = mysqli_query($conexion, $sqlUsers);
                if (mysqli_num_rows($queryUsers) > 0) {
                    while ($rowUser = mysqli_fetch_assoc($queryUsers)) {
                        echo '<li class="user"><a href="?selectedChatUserId=' . urlencode($rowUser['id_user']) . '">' . $rowUser['user'] . '</a></li>';
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
                        echo '<div class="message ' . ($row['id_emisor'] === $_SESSION['id_user'] ? 'outgoing' : 'incoming') . '">
                            <div class="message-sender">'.$row['username'].'</div>
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
                <input type="text" name="msg" placeholder="Escribe tu mensaje..." required>
                <button type="submit"><i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    </nav>

<?php include("pie.php");?>
</body>
