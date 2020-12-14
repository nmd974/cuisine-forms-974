

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <?php
        if (isset($_GET['idmo'])):?> 
        <?php 
            $data = getAteliersData();
        
        ?>
        <?php if($data):?>
            <?php foreach($data as $atelier):?>
                <?php if($atelier['id'] == $_GET['idmo']):?>
                    <div class="modal-header">
                    <h5 class="modal-title">Modification de l'atelier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p><?= $atelier['description']?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                <?php endif ?>
            <?php endforeach?>
      <?php endif?>
      <?php endif?>
    </div>
  </div>
</div>