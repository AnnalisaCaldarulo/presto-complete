<div class="container height margin">
    <div class="row">
        <div class="col-12">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Max</label>
                    <input type="text" class="form-control" wire:model="maxPrice" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Min</label>
                    <input type="text" class="form-control" wire:model="minPrice">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        @foreach ($searched as $article)
            <x-card :article="$article" />
        @endforeach
    </div>
</div>
