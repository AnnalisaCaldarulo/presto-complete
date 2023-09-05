
<div class="container">
    <div class="row justify-content-center w-100">
        @if (session()->has('successMessage'))
        <div class="col-9 col-md-6 alert alert-success">
            {{ session('successMessage') }}
        </div>
        @endif
    </div>
</div>
