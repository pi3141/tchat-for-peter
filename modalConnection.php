<?php include 'functions.php' ?>
<div id="modalNewMsg" tabindex="-1" role="dialog" aria-labelledby="modalNewMsgLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="index.php">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNewMsgLabel">Bienvenue sur le tchat !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"modl>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $value = $_SESSION['pseudo'] ?? ''; ?>
                    Ton nom : <input type="text" name="pseudo" id="pseudo" value="<?= $value ?>"/><br/>
                    <?php
                        if(isAdmin()) { ?>
                            Mot de passe : <input type="password" name="password">
                        <?php } ?>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="connect" class="btn btn-success" value="OK">
                </div>
            </form>
        </div>
    </div>
</div>