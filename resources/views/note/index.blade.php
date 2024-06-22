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

function addNewNote(){
  $('#addNoteDetail').modal('show');

  const editorTheme = 'snow';
  const editorModule = [
    [{header: [1, 2, false]}],
    ['bold', 'italic', 'underline'],
    ['code-block']
  ];

  if( $('#editorDetails .ql-editor').length == 0 ){
    detail = new Quill( '#editorDetails',{
      modules: {
        toolbar: editorModule
      },
      placeholder: 'Problem details...',
      theme: editorTheme
    });

    errorMessages = new Quill( '#editorErrorMessages',{
      modules: {
        toolbar: editorModule
      },
      placeholder: 'Error messages...',
      theme: editorTheme
    });

    solution = new Quill( '#editorSolution',{
      modules: {
        toolbar: editorModule
      },
      placeholder: 'Your solution here...',
      theme: editorTheme
    });
  }

  console.log(JSON.stringify(detail.getContents()));


  $('#saveNoteButton').on('click', () =>{

    $.post(`{{ url('api/note/add') }}`,{
      "category": $('#selectCtgr').val(),
      "summary": $('#summary').val(),
      "details": (detail.root.innerHTML == '<p><br></p>' ? '' : detail.getContents()),
      "error_messages": (errorMessages.root.innerHTML == '<p><br></p>' ? '' : errorMessages.getContents()),
      "solution": (solution.root.innerHTML == '<p><br></p>' ? '' : solution.getContents()),
    }).done((response) =>{
      $('#addNoteDetail').modal('hide');

      detail.root.innerHTML = '<p><br></p>';
      errorMessages.root.innerHTML = '<p><br></p>';
      solution.root.innerHTML = '<p><br></p>';

      setTimeout(() => {
        $('.datatables-ajax').DataTable().ajax.reload();
      }, 1500);
    }).fail((response) => {
      const error = response.responseJSON['errors'];
      showError(error);

    })

  });

}

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
  $('#noteDetail').modal('show');

  $.get(`{{ url('api/notes/${data}') }}`)
  .done((response) => {

    showDetailNote(response.data);

  }).fail((e) => {
    console.log(e);
  })
}

function showError(error){
  if(error['category']){
      $('#categoryError').removeClass('d-none');
      $('#categoryError p').text(error['category'])
    } else {
      $('#categoryError').addClass('d-none');

    }

    if(error['summary']){
      $('#summaryError').removeClass('d-none');
      $('#summaryError p').text(error['summary'])
    } else {
      $('#summaryError').addClass('d-none');
    }

    if(error['details']){
      $('#detailsError').removeClass('d-none');
      $('#detailsError p').text(error['details'])
    } else {
      $('#detailsError').addClass('d-none')
    }

    if(error['error_messages']){
      $('#error_messagesError').removeClass('d-none');
      $('#error_messagesError p').text(error['error_messages'])
    } else {
      $('#error_messagesError').addClass('d-none');
    }

    if(error['solution']){
      $('#solutionError').removeClass('d-none');
      $('#solutionError p').text(error['solution'])
    } else {
      $('#solutionError').addClass('d-none');
    }
}

function showDetailNote(data){
  $('#NoteDetailSummary').children().remove();
  $('#NoteDetailBody').children().remove();
  $('#NoteDetailError').children().remove();
  $('#NoteDetailSolution').children().remove();

  $('#noteDetailTitle').text(data['category_name']);
  $('#NoteDetailSummary').append(data['summary']);
  $('#NoteDetailBody').append(data['details']);
  $('#NoteDetailSolution').append(data['solution']);

  if(data['error']){
    $('#NoteDetailError').append(data['error']);
  } else {
    $('#NoteDetailError').parent().addClass('d-none');
  }
}
</script>
@endpush
