<div class="form-group">
    <label class="control-label">{{ __('Ads location') }}</label>
    {!! Form::select('ads_location', AdsManager::getLocations(), $config['ads_location'], ['class' => 'form-control']) !!}
</div>
