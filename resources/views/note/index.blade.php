@extends('pages.main')

@section('title-page')
Dictionary
@endsection

@section('name-page')
Dictionary
@endsection

@section('main-page')
<!-- Ajax Sourced Server-side -->
<div class="card">
  <h5 class="card-header">EDP Dictionary</h5>
  <div class="card-datatable">
      <table class="datatables-ajax table">
          <thead>
              <tr>
                <th>Details</th>
                <th>Category</th>
                <th>Summary</th>
              </tr>
          </thead>
      </table>
      @include('note.modal-add')
  </div>
</div>
<!--/ Ajax Sourced Server-side -->
@include('note.modal')
@push('js')
<script>
$(function(){
  var dt_ajax_table = $('.datatables-ajax'),
    dt_filter_table = $('.dt-column-search'),
    dt_adv_filter_table = $('.dt-advanced-search'),
    dt_responsive_table = $('.dt-responsive'),
    startDateEle = $('.start_date'),
    endDateEle = $('.end_date');

    if (dt_ajax_table.length) {
    var dt_ajax = dt_ajax_table.dataTable({
      processing: true,
      ajax: {
        "url" : `{{ url('api/notes') }}`,
        "type": 'GET',
        "data": function(response){
          return response.data
        }
      },
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      columns: [
        {   data: (note) => {
          return `
          <button type="button" class="btn btn-outline-primary" onclick="showNote(${note.id})">
            <i class="menu-icon tf-icons ti ti-eye"></i>
          </button>
          `;
        }},
        {   data: "category_name" },
        {   data: 'summary' },
      ]
    });
  }

});

function showNote(data){
  $('#noteDetail').modal('show');
  $.get(`{{ url('api/notes/${data}') }}`)
  .done((response) => {
    $('#noteDetailTitle').text(response.data['category_name']);
    $('#NoteDetailSummary').text(response.data['summary']);
    $('#NoteDetailBody').text(response.data['details']);
    $('#NoteDetailError').text(response.data['error']);
    $('#NoteDetailSolution').text(response.data['solution']);
    $('#NoteDetailSolution').text(response.data['solution']);
    $('#NoteDetailImage').attr('src', `{{ url('Images') }}/${response.data['image']}`);
    $('#NoteDetailImage').attr('alt', `{{ url('Images') }}/${response.data['image']}`);
  }).fail((e) => {
    console.log(e);
  })
}

function showText(){
  if($('#addNoteText').hasClass('d-none')){
    $('#addNoteText').removeClass('d-none');
  }

  if(!$('#addNoteText').hasClass('d-none')){
    $('#addNoteText').addClass('d-none');
  }
}
</script>
@endpush

@endsection
