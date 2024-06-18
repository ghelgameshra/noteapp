@extends('pages.main')

@section('css')
<link rel="stylesheet" href="{{ url('Template') }}/assets/vendor/libs/typeahead-js/typeahead.css" />
<link rel="stylesheet" href="{{ url('Template') }}/assets/vendor/libs/quill/typography.css" />
<link rel="stylesheet" href="{{ url('Template') }}/assets/vendor/libs/quill/katex.css" />
<link rel="stylesheet" href="{{ url('Template') }}/assets/vendor/libs/quill/editor.css" />
@endsection

@section('title-page')
Dictionary
@endsection

@section('name-page')
Dictionary
@endsection

@section('main-page')

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

<div class="position-fixed top-50 end-0 translate-middle">
  <button type="button" class="btn btn-primary btn-icon rounded-pill btn-outline" onclick="addNewNote()">
    <i class="tf-icons ti ti-plus"></i>
  </button>
</div>

@include('note.modal')
@push('js')
<script src="{{ url('support/editor.js') }}"></script>
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
        "type": 'GET'
      },
      dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      columns: [
        {   data: (note) => {
          return `
          <button type="button" class="btn btn-outline-primary" onclick="showNote(${note.id})">
            <i class="tf-icons ti ti-eye"></i>
          </button>
          `;
        }},
        {   data: "category_name" },
        {   data: 'summary' },
      ]
    });
  }

  const editorBody = [
    {"title": 'Summary',"placeholder": 'Problem summary here.'},
    {"title": 'Detail Problem',"placeholder": 'Problem details here.'},
    {"title": 'Error Messages',"placeholder": 'Error Messages.'},
    {"title": 'Solution',"placeholder": 'Your solution/ idea here.'},
  ];

  insertEditor(editorBody);

});
// end funtion DOM

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

function addNewNote(){
  $('#addNoteDetail').modal('show');
}
</script>
<script src="{{ url('Template') }}/assets/vendor/libs/quill/katex.js"></script>
<script src="{{ url('Template') }}/assets/vendor/libs/quill/quill.js"></script>
@endpush

@endsection
