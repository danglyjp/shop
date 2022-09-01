<div class="container margin_60_35">
    <div class="main_title">
        <h2>{{ __('latest news') }}</h2>
        <span>{{ __('latest news') }}</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row">
        @foreach($article as $key => $item)
        <div class="col-lg-6">
            <a class="box_news" href="{{ route('article.detail',['slug'=> $item->slug ] ) }}">
                <figure>
                <img src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" alt="" width="400" height="266" class="lazy">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                <ul>
                    <li>by Mark Twain</li>
                    <li>{{ date('d/m/Y', strtotime($item->created_at)) }}</li>
                </ul>
                <h4>{{ $item->title }}</h4>
                <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
            </a>
        </div>
        @endforeach
    </div>
    <!-- /row -->
</div>