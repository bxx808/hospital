<?php
require_once "layout/head.php";
?>
<div class="reception">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReception">
       Создать прием
    </button>
    <div class="modal" tabindex="-1" id="addReception">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once "layout/footer.php";
?>