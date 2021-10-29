<?php

namespace Theme\UltraNews\Http\Controllers;

use Botble\Member\Http\Controllers\ForgotPasswordController as MemberForgotPasswordController;
use SeoHelper;
use Theme;

class ForgotPasswordController extends MemberForgotPasswordController
{
    public function showLinkRequestForm()
    {
        SeoHelper::setTitle(trans('plugins/member::member.forgot_password'));

        return Theme::scope('news.account.auth.passwords.email')->render();
    }
}
