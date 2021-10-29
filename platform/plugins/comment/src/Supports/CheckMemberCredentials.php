<?php

namespace Botble\Comment\Supports;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CheckMemberCredentials
{
    protected $app;

    protected $provider = COMMENT_GUARD;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(Request $request)
    {
        $user = auth()->guard(COMMENT_GUARD)->user();

        if ($user) {
            app('auth')->guard(COMMENT_GUARD)->setUser($user);
            return $user;
        }

        return null;
    }
}
