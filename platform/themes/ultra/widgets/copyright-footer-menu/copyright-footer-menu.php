<?php

use Botble\Widget\AbstractWidget;

class CopyrightFooterMenuWidget extends AbstractWidget
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
    protected $widgetDirectory = 'copyright-footer-menu';

    /**
     * CustomMenuWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => __('Copyright footer Menu'),
            'description' => __('Add a custom menu to your widget area.'),
            'menu_id'     => null,
        ]);
    }
}
