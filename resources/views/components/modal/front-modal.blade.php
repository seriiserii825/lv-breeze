@props(['title', 'apply_btn', 'modal_id'])
<div class="modal fade" id="{{ $modal_id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
            </div>
            <div class="modal-body">{{ $slot }}</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary js-front-modal-close"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" id="{{ $apply_btn }}" class="js-modal-apply btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>
