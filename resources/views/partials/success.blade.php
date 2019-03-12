<div class="row">
        <div class="col-md-4 pull-right">
		@if(session ('success'))
		<div id="successMessage" class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{  session('success') }}
		</div>
		@endif
		@if(session ('fail'))
		<div id="successMessage" class=
		"alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">×</button>
			{{  session('fail') }}
		</div>
		@endif
	</div>
</div>