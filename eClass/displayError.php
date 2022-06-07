<?php if(isset($er) && !empty($er))
{ ?>
  <div class="alert alert-danger">

    <?php 

    foreach ($er as $key => $value) {
      //$msg .= $value."<br>";
      echo $validate_msg = $value."<br>";
    }
    
   //echo '<script type="text/javascript">alert("'.$msg.'");</script>';

    ?>
    
  </div>

  <?php } ?>

   <!-- ---------------------------------- -->

  <?php if(isset($successmsg))
{ ?>
  <div class="alert alert-success">
   
    <?php 
    
      echo $successmsg;
  

    ?>
  </div>

  <?php } ?>

   <!-- ---------------------------------- -->

   <!-- ---------------------------------- -->

  <?php if(isset($successmsg2))
{ ?>
  <div class="alert alert-warning">
   
    <?php 
    
      echo $successmsg2;
  

    ?>
  </div>

  <?php } ?>

   <!-- ---------------------------------- -->


     <?php if(isset($Error))
{ ?>
  <div class="alert alert-danger">
   
    <?php 
    
      echo $Error;
  

    ?>
  </div>

  <?php } ?>

   <!-- ---------------------------------- -->

     <!-- ---------------------------------- -->
     <?php if(isset($Error2))
{ ?>
  <div class="alert alert-danger">
   
    <?php 
    
      echo $Error2;
  

    ?>
  </div>

  <?php } ?>

   <!-- ---------------------------------- -->