@props(['id', 'title', 'action'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark" style="border-radius: 0; border: 3px solid var(--metro-red);">
            <div class="modal-header bgc-red text-white border-0" style="border-radius: 0;">
                <h5 class="modal-title fw-light"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 text-center fs-5">
                {{ $slot }}
            </div>
            <div class="modal-footer justify-content-center border-0 bg-light">
                <button type="button" class="btn btn-secondary rounded-0 px-4" data-bs-dismiss="modal">Cancel</button>
                
                <form action="{{ $action }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-0 px-4">Yes, Delete it!</button>
                </form>
            </div>
        </div>
    </div>
</div>