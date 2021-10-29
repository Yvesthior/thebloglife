<!--Search Form-->
<div class="main-search-form transition-02s">
    <div class="container">
        <div class="pt-10 pb-50 main-search-form-cover">
            <div class="row mb-20">
                <div class="col-12">
                    <form action="{{ route('public.search') }}" method="get" class="search-form position-relative">
                        <div class="search-form-icon"><i class="ti-search"></i></div>
                        <label>
                            <input type="text" class="search_field" placeholder="{{__('Enter keywords for search...')}}"
                                   value="" name="q">
                        </label>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 font-small suggested-area">
                    <p class="d-inline font-small suggested"><strong>{{ __('Suggested') }}:</strong></p>
                    <ul class="list-inline d-inline-block">
                        @foreach(get_popular_tags(10) as $tag)
                            <li class="list-inline-item"><a href="{{ $tag->url }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
