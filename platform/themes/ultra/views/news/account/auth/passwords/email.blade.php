@php Theme::layout('no-breadcrumbs') @endphp

<div class="main_content shop background12">
    <div class="container pb-100">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5 mt-100 ">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3 class="mb-30">{{ trans('plugins/member::member.forgot_password') }}</h3>
                        </div>
                        <form method="POST" action="{{ route('public.member.password.email') }}">
                            @csrf
                            @include(Theme::getThemeNamespace() . '::views.news.account.auth.includes.messages')
                            <div class="form-group">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email" value="{{ old('email') }}" required
                                       placeholder="{{ trans('plugins/member::dashboard.email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-fill-out btn-block">
                                    {{ trans('plugins/member::dashboard.reset-password-cta') }}
                                </button>
                                <br><br>
                                <div class="text-center">
                                    <a href="{{ route('public.member.login') }}"
                                       class="btn-link">{{ trans('plugins/member::dashboard.back-to-login') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
