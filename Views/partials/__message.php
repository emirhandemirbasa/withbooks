<?php
if (isset($_SESSION["Message"])): ?>
    <div class="alert-box <?php echo $_SESSION['MessageType']; ?>">
        <?php 
            echo $_SESSION['Message']; 
            unset($_SESSION["Message"]);
            unset($_SESSION["MessageType"]);
        ?>
    </div>
<?php endif; ?>
