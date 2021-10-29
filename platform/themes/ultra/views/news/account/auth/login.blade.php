@php Theme::layout('no-breadcrumbs') @endphp

<!--main content-->
<div class="main_content shop background12">
    <div class="container pb-100">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5 mt-100 ">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3 class="mb-30">{{ __('Login') }}</h3>
                        </div>

                        <form method="POST" class="simple-form" action="{{ route('public.member.login') }}">
                            @csrf

                            @include(Theme::getThemeNamespace() . '::views.news.account.auth.includes.messages')

                            <div class="form-group">
                                <input type="text" required=""
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       name="email"
                                       placeholder="{{ __('Your email') }}">
                                @if ($errors->has('email') || $errors->has('username'))
                                    <span class="invalid-feedback d-block">
                                            <strong>{{ !empty($errors->first('email')) ? $errors->first('email') : $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       required
                                       type="password"
                                       name="password"
                                       placeholder="{{ __('Password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="login_footer form-group">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input type="checkbox" class="form-check-input"
                                               id="exampleCheckbox1"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheckbox1">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>
                                </div>
                                <a class="text-muted"
                                   href="{{ route('public.member.password.request') }}">{{ __('Forgot password?') }}</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block"
                                        name="login">{{ __('Login in') }}</button>
                            </div>
                        </form>

                        <div class="text-center">
                            {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Member\Models\Member::class) !!}
                        </div>

                        <div class="text-muted text-center">{{ __("Don't have an account?") }}
                            <a href="{{ route('public.member.register') }}">{{ __('Sign up now') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    Theme::asset()->usePath(true)->add('shop-css', 'css/shop.css');
@endphp
