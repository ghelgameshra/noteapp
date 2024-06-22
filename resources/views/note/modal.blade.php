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

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <label for="nameWithTitle" class="form-label">Summary</label>
                <div class="form-control" id="NoteDetailSummary"></div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <label for="nameWithTitle" class="form-label">Details Problem</label>
                <div id="NoteDetailBody" class="form-control"></div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body d-none">
                <label for="nameWithTitle" class="form-label">Error Messages</label>
                <div id="NoteDetailError" class="form-control"></div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <label for="nameWithTitle" class="form-label">Solution</label>
                <div id="NoteSulution" class="form-control"></div>
              </div>
            </div>
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
