<?php
    session_start();
    session_destroy();
    echo 'You are now logged out!';
    echo ('<script>window.location.href="../cama-new/login.php";</script>');    

?>
<body>
    <h1>
        
    </h1>
</body>