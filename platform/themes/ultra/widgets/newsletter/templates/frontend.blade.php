<div class="sidebar-widget widget_newsletter mb-30">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 color-white">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="newsletter">
        <p class="color-white">{{ $config['description'] }}</p>
        <div class="footer-form">
            <div id="mc_embed_signup">
                <form target="_blank" action="{{ route('public.newsletter.subscribe') }}" method="post"
                      class="subscribe_form form-subcriber newsletter-form relative mail_part"
                      action="{{ route('public.newsletter.subscribe') }}">
                    @csrf
                    <input type="email" name="email" id="newsletter-form-email"
                           placeholder="{{ __('Enter your email') }}"
                           class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = ' Email Address '">
                    <div class="form-icon">
                        <button type="submit" name="submit" id="newsletter-submit"
                                class="email_icon newsletter-submit button-contactForm">
                            <i class="ti-email color-white"></i>
                        </button>
                    </div>
                    <div class="mt-10 info"></div>
                    @if (setting('enable_captcha') && is_plugin_active('captcha'))
                        <div class="form-group">
                            {!! Captcha::display() !!}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
