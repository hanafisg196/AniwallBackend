<?php if(session()->getFlashdata('msg')):?>
    <div class="demo-spacing-0">
        <div class="alert alert-primary" role="alert">
            <div class="alert-body"><?= session()->getFlashdata('msg') ?></div>
        </div>
    </div>
<?php endif;?>