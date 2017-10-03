<?php

session_start();



if(!isset($_SESSION['u_id']))

  {
       header("Location: ../upload.php?signup=success");
  }
  else
  {
        header("Location: error.inc.php?signup=error");
  }




	?>