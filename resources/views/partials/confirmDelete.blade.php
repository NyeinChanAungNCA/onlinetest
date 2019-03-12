<!-- Modal Dialog -->
<div class="modal" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure do you want to delete? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Delete</button>
      </div>
    </div>
  </div>
</div>

@section('js')
<!-- Dialog show event handler -->
<script type="text/javascript">
$('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });  

  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
 
</script>

<script type="text/javascript">
// Edit a post
  $(document).on('click', '.edit-category-modal', function() {
    $('.modal-title').text('Edit Category');
    $('#id_edit').val($(this).data('id'));
    $('#name_edit').val($(this).data('name'));

    id = $('#id_edit').val();
    $('#editModal').modal('show');
  });

  $('.modal-footer').on('click', '.edit', function() {
   var base_url = window.location.origin;
   var url=base_url+'/onlinetest/public/category/' + id;
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  $.ajax({
    type: 'put',
    url: url,
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $("#id_edit").val(),
      'name': $("#name_edit").val(),
    },
    success: function(data) {
      //console.log(data);
      location.reload(); 
    }
  });
  });
</script>
@endsection