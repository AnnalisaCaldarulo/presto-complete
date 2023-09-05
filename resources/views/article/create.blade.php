<x-layout>

    <div class="container height">
        <div class="row h-75 justify-content-center align-items-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <livewire:create-article-form />
            </div>
        </div>
    </div>

</x-layout>
