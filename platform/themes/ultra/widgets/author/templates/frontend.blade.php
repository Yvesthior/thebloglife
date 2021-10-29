@php
    $post = get_post();
@endphp
@if($post)
<div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 background12 border-radius-5">
    <h5 class="mb-20">{{ $post->author->name }}<img class="about-author-img float-right ml-30"
                                            src="{{ RvMedia::getImageUrl($post->author->avatar->url, 'thumb', false, RvMedia::getDefaultImage()) }}" alt=""></h5>
    <p class="font-medium">{{ $post->author->description }}</p>

    <ul class="header-social-network d-inline-block list-inline color-white mb-20">
        <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center"
                                        target="_blank" href="#"><i class="ti-facebook"></i></a>
        </li>
        <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center"
                                        target="_blank" href="#"><i class="ti-twitter-alt"></i></a>
        </li>
        <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center"
                                        target="_blank" href="#"><i class="ti-pinterest"></i></a>
        </li>
        <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center"
                                        target="_blank" href="#"><i class="ti-instagram"></i></a>
        </li>
    </ul>
    <p>
        <a class="readmore-btn font-small text-uppercase font-weight-ultra" href="contact.html">Contact
            me<i class="ti-arrow-right ml-5"></i></a>
    </p>
</div>
@endif