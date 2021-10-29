<div class="form-group mb-3">
    <label class="control-label">{{ __('Title') }}</label>
    <input name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="POPULAR">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Sub title') }}</label>
    <input name="subtitle" value="{{ Arr::get($attributes, 'subtitle') }}" class="form-control" placeholder="Sub title">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Number of posts') }}</label>
    <input name="limit" class="form-control" value="{{ Arr::get($attributes, 'limit', 4) }}">
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Get posts Post Collection') }}</label>
    <select name="posts_collection_id" class="form-control">
        <option value="">{{ __('--Select Post Collection--') }}</option>
        @foreach($postsCollections as $postsCollection)
            <option value="{{ $postsCollection->id }}"
                    @if (Arr::get($attributes, 'posts_collection_id') == $postsCollection->id) selected @endif>{{ $postsCollection->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group mb-3">
    <label class="control-label">{{ __('Background style') }}</label>
    {!! Form::select('background_style', get_background_styles(), Arr::get($attributes, 'background_style'), ['class' => 'form-control']) !!}
</div>
