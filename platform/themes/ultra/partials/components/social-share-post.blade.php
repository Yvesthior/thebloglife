<li class="list-inline-item">
    <a class="social-icon facebook-icon text-xs-center color-white"
       href="javascript:void(0)"
       onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ urlencode($post->url) }}&title={{ $post->description }}', 'Share This Post', 'width=640,height=450'); return false">
        <i class="ti-facebook"></i>
    </a>
</li>
<li class="list-inline-item">
    <a class="social-icon twitter-icon text-xs-center color-white"
       href="javascript:void(0)"
       onclick="window.open('https://twitter.com/intent/tweet?url={{ urlencode($post->url) }}&text={{ $post->description }}', 'Share This Post', 'width=640,height=450'); return false">
        <i class="ti-twitter-alt"></i>
    </a>
</li>
<li class="list-inline-item">
    <a class="social-icon instagram-icon text-xs-center color-white"
       href="javascript:void(0)"
       onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}', 'Share This Post', 'width=640,height=450'); return false">
        <i class="ti-linkedin"></i>
    </a>
</li>
<li class="list-inline-item">
    <a class="social-icon pinterest-icon text-xs-center color-white"
       href="javascript:void(0)"
       onclick="window.open('http://pinterest.com/pin/create/button/?url={{ urlencode($post->url) }}&summary={{ rawurldecode($post->description) }}', 'Share This Post', 'width=640,height=450'); return false">
        <i class="ti-pinterest"></i>
    </a>
</li>
