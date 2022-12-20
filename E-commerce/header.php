<div class="top-bar">
    <p>
       <div class="logo"> <span class="logo">E-com</span>
        <?php
        session_start();
        if (isset($_SESSION['emailid'])) {
        ?>
        <span class="pp">
            <?php 
            echo substr($_SESSION['FirstName'], 0, 1);
            echo substr($_SESSION['LastName'], 0, 1); 
           ?>
        </span>
        <?php
        }
        ?></div>
       
    </p>
</div>
