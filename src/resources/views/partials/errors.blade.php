@if ($errors->any())
    <div class="alert alert-important alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h6 class="alert-heading">Errors Found!</h6>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif