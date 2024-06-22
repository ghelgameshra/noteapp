<!-- Modal -->
<div class="modal fade" id="addNoteDetail" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewNote">Add New Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">

          <!-- Merged -->
          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <small id="categoryError" class="text-danger d-flex align-item-center d-none">
                  <i class="tf-icons ti ti-exclamation-circle"></i>
                  <p>Error messages</p>
                </small>
                <select id="selectCtgr" class="form-control" name="category">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <small id="summaryError" class="text-danger d-flex align-item-center d-none">
                  <i class="tf-icons ti ti-exclamation-circle"></i>
                  <p>Error messages</p>
                </small>
                <input type="text" class="form-control" id="summary" autocomplete="off" placeholder="Summary of problem">
              </div>
            </div>
          </div>

          <!-- Snow Theme -->
          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <small id="detailsError" class="text-danger d-flex align-item-center d-none">
                    <i class="tf-icons ti ti-exclamation-circle"></i>
                    <p>Error messages</p>
                </small>
                <div id="editorDetails"></div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <small id="error_messagesError" class="text-danger d-flex align-item-center d-none">
                    <i class="tf-icons ti ti-exclamation-circle"></i>
                    <p>Error messages</p>
                </small>
                <div id="editorErrorMessages"></div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card mb-1">
              <div class="card-body">
                <small id="solutionError" class="text-danger d-flex align-item-center d-none">
                    <i class="tf-icons ti ti-exclamation-circle"></i>
                    <p>Error messages</p>
                </small>
                <div id="editorSolution"></div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" id="saveNoteButton">Save Note</button>
      </div>
    </div>
  </div>
</div>

