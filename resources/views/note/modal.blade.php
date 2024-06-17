<!-- Vertically Centered Modal -->
<!-- Modal -->
<div class="modal fade" id="noteDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteDetailTitle">Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <img src="" width="100%" id="NoteDetailImage" loading="lazy" alt="">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nameWithTitle" class="form-label">Summary</label>
                            <article class="form-control" id="NoteDetailSummary"></article>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="nameWithTitle" class="form-label">Detail</label>
                        <article class="form-control" id="NoteDetailBody"></article>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="nameWithTitle" class="form-label">Error</label>
                        <article class="form-control" id="NoteDetailError"></article>
                    </div>


                    <div class="col-12 mb-3">
                      <label for="nameWithTitle" class="form-label">Solution</label>
                      <article class="form-control" id="NoteDetailSolution"></article>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
</div>
