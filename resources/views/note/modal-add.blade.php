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
          <div class="col">
            <div class="card mb-1">
              <div class="card-body">
                <select id="selectCtgr" class="form-control" name="category">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Snow Theme -->
          <div id="text-editor"></div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary" onclick="saveNote()">Save Note</button>
      </div>
    </div>
  </div>
</div>

