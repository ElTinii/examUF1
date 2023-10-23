<div class="modal fade hide" role="dialog" id="confirm-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="message">
                <p>Are you sure you want to delete your post about '<strong><?php echo $article['title'] ?></strong>'?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a type="button" class="btn btn-danger text-decoration-none" href="" id="confirmDelete">Yes</a>
            </div>
        </div>
    </div>
</div>