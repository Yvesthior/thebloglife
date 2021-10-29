<li>
    <a class="fb"
       href="javascript:void(0)"
       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}&title={{ $post->description }}', 'Share This Post', 'width=640,height=450'); return false"
       title="{{ __('Share on Facebook') }}">
        <i class="ti-facebook"></i>
    </a>
</li>
<li>
    <a class="tw"
       href="javascript:void(0)"
       onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode($post->url) }}&text={{ $post->description }}', 'Share This Post', 'width=640,height=450'); return false"
       title="{{ __('Tweet now') }}">
        <i class="ti-twitter-alt"></i>
    </a>
</li>
<li>
    <a class="it"
       href="javascript:void(0)"
       onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}', 'Share This Post', 'width=640,height=450'); return false"
       title="{{ __('Share on Linkedin') }}">
        <i class="ti-linkedin"></i>
    </a>
</li>
<li>
    <a class="pt"
       href="javascript:void(0)"
       onclick="window.open('http://pinterest.com/pin/create/button/?url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}', 'Share This Post', 'width=640,height=450'); return false">
        <i class="ti-pinterest"></i>
    </a>
</li>
