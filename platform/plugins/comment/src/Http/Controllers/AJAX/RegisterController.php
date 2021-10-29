<?php

namespace Botble\Comment\Http\Controllers\AJAX;

use App\Http\Controllers\Controller;
use Botble\ACL\Traits\RegistersUsers;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = null;

    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    public function __construct(MemberInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function register(Request $request, BaseHttpResponse $response)
    {
        $this->validator($request->input())->validate();

        event(new Registered($member = $this->create($request->input())));

        $this->guard()->login($member);
        return $this->registered($request, $member, $response)
            ?: $response->setNextUrl($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function validator(array $data)
    {
        return Validator::make($data, array_merge(
            [
                'first_name' => 'required|max:255',
                'last_name'  => 'required|max:255',
                'email'      => 'required|email|max:255|unique:members',
                'password'   => 'required|min:6|confirmed',
            ],
            setting('enable_captcha') && is_plugin_active('captcha') ? ['g-recaptcha-response' => 'required|captcha'] : []
        ));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Member
     */
    protected function create(array $data)
    {
        return $this->memberRepository->create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth(COMMENT_GUARD);
    }

    public function registered(Request $request, $user, $response)
    {
        $token = $user->id;

        return $response
            ->setData(compact('token'));
    }
}
