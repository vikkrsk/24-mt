@if (session('status'))
<div class="alert alert-{{session('type', 'success')}} alert-dismissible fade show" role="alert" align="center">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
