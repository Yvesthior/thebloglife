<div class="form-group mb-3">
    <label class="control-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="Recent Articles">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Subtitle') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control"
           placeholder="Don't miss new trend">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Categories Ids') }}</label>
    <input name="categories" value="{{ Arr::get($attributes, 'categories') }}" class="form-control"
           placeholder="11,12,23">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Categories Ids Exclude') }}</label>
    <input name="categories_exclude" value="{{ Arr::get($attributes, 'categories_exclude') }}" class="form-control"
           placeholder="11,12,23">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Post Ids') }}</label>
    <input name="include" value="{{ Arr::get($attributes, 'include') }}" class="form-control" placeholder="1,2,3">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Post Ids Exclude') }}</label>
    <input name="exclude" value="{{ Arr::get($attributes, 'exclude') }}" class="form-control" placeholder="1,2,3">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Limit') }}</label>
    <input name="limit" class="form-control" value="{{ Arr::get($attributes, 'limit', 4) }}">
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Order by') }}</label>
    <select name="order_by" class="form-control">
        <option value="updated_at" @if (Arr::get($attributes, 'order_by') == 'updated_at') selected @endif>
            {{ __('Updated') }}
        </option>
        <option value="views" @if (Arr::get($attributes, 'order_by') == 'views') selected @endif>{{ __('Views') }}</option>
    </select>
</div>
<div class="form-group mb-3">
    <label class="control-label">{{ __('Order') }}</label>
    <select name="order" class="form-control">
        <option value="desc" @if (Arr::get($attributes, 'order') == 'desc') selected @endif>{{ __('Descending order') }}</option>
        <option value="asc" @if (Arr::get($attributes, 'order') == 'asc') selected @endif>{{ __('Ascending') }}</option>
    </select>
</div>
