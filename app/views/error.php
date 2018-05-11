<?php


?>
<div class="error-heading">
    <h1>Error</h1>
</div>

<div class="error-body">
    <div class="error-row">
        <?php
            // Displays the Template error if there is any
            if(!empty($templateErr)){
                echo $this->templateErr;
            }

        ?>
        <hr>
    </div>
    <div class="error-row">
        <?php
            // Displays the view error if there is any
            if(!empty($viewErr)){
                    echo $this->viewErr;
            }

        ?>
        <hr>
    </div>

</div>
    

  

    
        
    
    

    

    


