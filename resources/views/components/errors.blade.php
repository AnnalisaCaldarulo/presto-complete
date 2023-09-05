@if ($errors->any())
<div class="row justify-content-center">
    <div class="rectangle-validation">
        <div class="notification-text pe-1">
            <i class="bi bi-exclamation-triangle-fill fs-5 px-2"></i>
            <span>
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{$error}}</p>
                @endforeach
            </span>
        </div>
    </div>
</div>
@endif
