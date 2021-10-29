<div class="row">
    <div class="col-lg-6 col-md-12">
        @if(!empty($title))
            <h1 class="mb-30">{!! clean($title) !!}</h1>
        @endempty
        {!! Form::open(['route' => 'public.send.contact', 'method' => 'POST', 'class' => 'contact-form comment_form', 'id' => 'contactForm']) !!}
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" required>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                    <input class="form-control" name="email" id="email" type="email" placeholder="Email"
                           required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                           id="contact_phone" placeholder="{{ __('Phone') }}" required>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9"
                              placeholder="Message" required></textarea>
                </div>
            </div>
        </div>
        @if (setting('enable_captcha') && is_plugin_active('captcha'))
            <div class="contact-form-row">
                <div class="contact-column-12">
                    <div class="contact-form-group">
                        {!! Captcha::display() !!}
                    </div>
                </div>
            </div>
        @endif
        <div class="form-group">
            <button class="button button-contactForm" type="submit">{{ __('Finish & Submit') }}</button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-lg-6 col-md-12">
        <img src="{{ Theme::asset()->url('images/marginalia-productive-work.png') }}" alt="background">
    </div>
</div>


