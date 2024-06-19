@extends('pages.main')

@section('css')
<link rel="stylesheet" href="{{ url('Template') }}/assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="{{ url('Asset/lib/css/quill.snow.css') }}">
<script src="{{ url('Asset/lib/js/quill.js') }}"></script>
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
  </div>
</div>

<div class="position-fixed top-50 end-0 translate-middle">
  <button type="button" class="btn btn-primary btn-icon rounded-pill btn-outline" onclick="addNewNote()">
    <i class="tf-icons ti ti-plus"></i>
  </button>
</div>
@include('note.modal-add')
@include('note.modal')
@endsection

@push('js')
<script src="{{ url('Asset/lib/js/editor.js') }}"></script>
<script src="{{ url('Template') }}/assets/js/forms-selects.js"></script>
<script src="{{ url('Template') }}/assets/vendor/libs/select2/select2.js"></script>
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


  $('#addNoteDetail').on('shown.bs.modal', function(){
    getCatg();
  })

});
// end funtion DOM

function getCatg(){
  $('#selectCtgr').select2({
    dropdownParent: '#addNoteDetail',
      ajax: {
        url: '{{ url('api/categories') }}',
        data: function (params) {
            var query = {
              search: params.term,
            }
            return query;
          },
        processResults: function (data) {
            return {
                results: data.data,
            };
        },
        cache: true
      },
  })
}

function showNote(data){
  $('#NoteDetailBody p').remove();
  $('#NoteDetailError p').remove();
  $('#NoteDetailSolution p').remove();

  $('#noteDetail').modal('show');

  $.get(`{{ url('api/notes/${data}') }}`)
  .done((response) => {

    $('#noteDetailTitle').text(response.data['category_name']);
    $('#NoteDetailSummary').append(response.data['summary']);

    $('#NoteDetailBody').append(response.data['details']);

    $('#NoteDetailError').append(response.data['error']);
    $('#NoteDetailSolution').append(response.data['solution']);

    $('#NoteDetailImage').attr('src', `{{ url('Images') }}/${response.data['image']}`);
    $('#NoteDetailImage').attr('alt', `{{ url('Images') }}/${response.data['image']}`);

  }).fail((e) => {
    console.log(e);
  })
}

function saveNote(){
  for (let index = 0; index < 4; index++) {
    if($(`#snow-editor-${index} .ql-editor`)[0].innerHTML == "<p><br><\/p>")
    $(`#snow-editor-${index} .ql-editor`)[0].innerHTML = '';
  }

  $.post(`{{ url('api/note/add') }}`,{
    "category": $('#selectCtgr').val(),
    "summary": $('#snow-editor-0 .ql-editor')[0].innerHTML,
    "details": $('#snow-editor-1 .ql-editor')[0].innerHTML,
    "error_messages": $('#snow-editor-2 .ql-editor')[0].innerHTML,
    "solution": $('#snow-editor-3 .ql-editor')[0].innerHTML,
  })
  .done((response) =>{
    $('#addNoteDetail').modal('hide');
    for (let index = 0; index < 4; index++) {
      $(`#snow-editor-${index} .ql-editor`)[0].innerHTML = '<p><br><\/p>';
    }

    setTimeout(() => {
      $('.datatables-ajax').DataTable().ajax.reload();
    }, 1500);
  })
}
</script>
@endpush
