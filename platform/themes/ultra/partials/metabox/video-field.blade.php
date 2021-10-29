<div class="tabbable-custom">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_metabox_video_link" type="button"
                    role="tab" aria-controls="home" aria-selected="true">
                {{ __('Get Video from URL') }}
            </button>
        </li>
        @if (auth()->user())
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#tab_metabox_video_upload" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">
                    {{ __('Upload Video') }} (.mp4)
                </button>
            </li>
        @endif
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="tab_metabox_video_link">
            <div class="form-group mb-3">
                <label for="video_link">{{ __('Video Embed URL') }}
                    <small>({{ __('Youtube, Vimeo, Dailymotion, Facebook') }})</small>
                </label>
                {!! Form::text('video_link', $videoLink , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group mb-3">
                <label for="video_link">{{ __('Video Embed Code') }}</label>
                {!! Form::text('video_embed_code', $videoEmbedCode , ['class' => 'form-control']) !!}
            </div>
        </div>

        @if (auth()->user())
            <div class="tab-pane" role="tabpanel" id="tab_metabox_video_upload">
                <div class="form-group mb-3">
                    {!! Form::mediaFile('video_upload_id', $videoUploadId) !!}
                </div>
            </div>
        @endif
    </div>
</div>
