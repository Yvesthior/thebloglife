<div class="form-group mb-3">
    {!! Form::customSelect(
        'show_toc_in_content',
        [
            'yes' => trans('core/base::base.yes'),
            'no'  => trans('core/base::base.no'),
        ],
        $showToC,
        ['class' => 'form-control', 'id' => 'show_toc_in_content']
    ) !!}
</div>
