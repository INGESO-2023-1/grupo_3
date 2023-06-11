<?php include("cabecera_log.php");?>

<head>
    <title>WhatsApp Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav id="navbar-example3" class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
    <a class="navbar-brand" href="#">User</a>
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
                // Aquí debes obtener los mensajes de tu base de datos o fuente de datos
                // y mostrarlos en el chat. Puedes utilizar un bucle para recorrer los mensajes.
                ?>
                <div class="message incoming">
                    <div class="message-sender">John <?php //Usuario seleccionado ?></div>
                    <div class="message-content">Hola, ¿cómo estás? <?php //mensaje del usuario seleccionado ?></div>
                </div>
                <div class="message outgoing">
                    <div class="message-content">¡Hola! Estoy bien, ¿y tú? <?php //Mensaje del usuario ?></div>
                </div>
            </div>
            <form class="message-form" method="POST" action="send_message.php">
                <input type="text" name="message" placeholder="Escribe tu mensaje..." required>
                <button type="submit"><i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>
</nav>
</body>


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <br> <br><br> <br> <br><br> <br> <br><br> <br> 
<?php include("pie.php");?>