
<ul id="banners_grid" class="clearfix">
    @foreach($categoryItem as $key => $item)
    <li>
        <a href="{{ route('collections',['slug'=> $item->slug ] ) }}" class="img_container">
            <img src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" data-src="@if($item->image && file_exists(public_path($item->image))){{ asset($item->image) }}@else{{ asset('upload/404.png') }}@endif" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <h3>{{ $item->name }}</h3>
                <div><span class="btn_1">{{ __('click here') }}</span></div>
            </div>
        </a>
    </li>
    @endforeach
</ul>