@extends('pages.main')

@section('css')
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

});
// end funtion DOM

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
</script>
<script src="{{ url('Asset/lib/js/editor.js') }}"></script>
@endpush

@endsection
