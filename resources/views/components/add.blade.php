<div class="row justify-content-center align-items-center my-5">

    <form action="{{ route('add', ['article' => $article]) }}" method="POST"
        class="w-50">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success p-1 px-3"><i class="bi bi-cart-check"></i></button>
    </form>

    
</div>