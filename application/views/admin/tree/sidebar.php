<?php foreach ($blog->result() as $b) {?>
<body>
   
    <?php
    $user = 1;
    if ($user == 1) {
       include 's_admin.php';
    }else{
        include 's_user.php';
    }
    }
    ?>
        