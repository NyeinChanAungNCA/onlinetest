<!-- Modal form to edit a form -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>  
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <div class="row add">
                           <!-- <input type="hidden" name="name" id="name_edit"> -->
                           <input type="hidden" class="form-control" id="id_edit">

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name_edit" class="col-sm-4 control-label">Name</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="name" value="{{ $category->name }}" autofocus id="name_edit" placeholder="Name">
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-white btn-primary edit" data-dismiss="modal">
                    <i class="fa fa-check"></i> Save
                </button>
                <button type="button" class="btn btn-white btn-warning" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </button>
            </div>        
        </div>
    </div>
</div>
</div>