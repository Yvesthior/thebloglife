<?php

use Botble\Widget\AbstractWidget;

class LastestPostsWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $frontendTemplate = 'frontend';

    /**
     * @var string
     */
    protected $backendTemplate = 'backend';

    /**
     * @var string
     */
    protected $widgetDirectory = 'lastest-posts';

    /**
     * Widget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'           => 'Lastest Posts',
            'description'    => __('Widget to display lastest posts'),
            'number_display' => 5,
            'name_custom_class' => '',
        ]);
    }
}
