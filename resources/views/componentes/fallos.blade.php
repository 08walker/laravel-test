@if(session()->has('fallos'))
<div id="fallos" class="container">
		<div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <strong>
                {!! session()->get('fallos') !!}
            </strong>
    </div>
</div>    
@endif