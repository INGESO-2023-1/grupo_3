<?php 
session_start();
include("cabecera_log.php");
include("../back/connection.php");
if (!isset($_SESSION['name'])) {
    header('location:index.php');
    exit;
}
?>
<head>
    <title>WhatsApp Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['name']; ?></a>
    <a class="navbar-brand" href="#">User</a>
    <div class="chat-container">
        <div class="user-list">
            <h2>Usuarios</h2>
            <ul>
                <li class="user active">John</li>
                <li class="user">Jane</li>
                <li class="user">Mike</li>
                <?php //Listado de usuarios en la base de datos ?>
            </ul>
        </div>

    <div class="chat">
        <div class="messages">
            <?php
            $sql = "SELECT * FROM `chat`";
            $query = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($query) > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<div class="message incoming">
                        <div class="message-sender">'.$row['user'].'</div>
                        <div class="message-content">'.$row['message'].'</div>
                    </div>';
                }
            } else {
                echo '<div class="message incoming">
                    <div class="message-sender">System</div>
                    <div class="message-content">No hay ninguna conversación previa.</div>
                </div>';
            }
            ?>
        </div>
        <form class="message-form" method="POST" action="sendMessage.php">
            <input type="text" name="msg" placeholder="Escribe tu mensaje..." required>
            <button type="submit"><i class="fa fa-paper-plane"></i></button>
        </form>
    </div>
</div>
</nav>

<?php include("pie.php");?>
</body>
