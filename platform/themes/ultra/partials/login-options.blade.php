@if (setting('social_login_facebook_enable', false) || setting('social_login_google_enable', false) || setting('social_login_github_enable', false) || setting('social_login_linkedin_enable', false))
    <div class="divider-text-center mt-15 mb-15">
        <span> {{ __('Or') }}</span>
    </div>
    <div class="login-options social-login">
        <ul class="btn-login list_none text-center mb-15">
            @if (setting('social_login_facebook_enable', false))
                <li>
                    <a href="{{ route('auth.social', 'facebook') }}" class="btn btn-facebook">
                        <i class="ti-facebook mr-5"></i>{{ __('Facebook') }}</a>
                </li>
            @endif
            @if (setting('social_login_google_enable', false))
                <li>
                    <a href="{{ route('auth.social', 'google') }}" class="btn btn-google">
                        <i class="ti-google mr-5"></i>{{ __('Google') }}</a>
                </li>
            @endif
            @if (setting('social_login_github_enable', false))
                <li>
                    <a href="{{ route('auth.social', 'github') }}" class="btn btn-dark github connect-github">
                        <i class="ti-github mr-5"></i>{{ __('Github') }}</a>
                </li>
            @endif
            @if (setting('social_login_linkedin_enable', false))
                <li>
                    <a href="{{ route('auth.social', 'linkedin') }}" class="btn linkedin connect-linkedin">
                        <i class="ti-linkedin mr-5"></i>{{ __('Linkedin') }}</a>
                </li>
            @endif
        </ul>
    </div>
@endif
