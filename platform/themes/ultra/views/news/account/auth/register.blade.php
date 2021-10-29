@php Theme::layout('no-breadcrumbs') @endphp

<!--main content-->
<div class="main_content shop background12">
    <div class="container pb-100">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5 mt-100 ">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3 class="mb-30">{{ __('Register') }}</h3>
                        </div>

                        @include(Theme::getThemeNamespace() . '::views.news.account.auth.includes.messages')

                        <form method="POST" class="simple-form" action="{{ route('public.member.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="first_name" type="text"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required autofocus
                                                   placeholder="{{ __('First name') }}">
                                        </div>
                                        @if ($errors->has('first_name'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="last_name" type="text"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required
                                                   placeholder="{{ __('Last name') }}">
                                        </div>
                                        @if ($errors->has('last_name'))
                                            <span class="d-block invalid-feedback">
                                                 <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="email" type="email"
                                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" value="{{ old('email') }}" required
                                                   placeholder="{{ __('Email') }}">
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="username" type="text"
                                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                   name="username" value="{{ old('username') }}" required
                                                   placeholder="{{ __('Username') }}">
                                        </div>
                                        @if ($errors->has('username'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required
                                                   placeholder="{{ __('Password') }}">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="d-block invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input id="password-confirm" type="password" class="form-control"
                                                   name="password_confirmation" required
                                                   placeholder="{{ __('Confirm password') }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-fill-out btn-block">
                                    {{ __('Submit') }}
                                </button>
                            </div>

                            <div class="form-group text-center">
                                <p>{{ __('Have an account already?') }}
                                    <a href="{{ route('public.member.login') }}"
                                       class="link d-block d-sm-inline-block text-sm-left text-center">{{ __('Login') }}</a>
                                </p>
                            </div>

                            <div class="text-center">
                                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Member\Models\Member::class) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
