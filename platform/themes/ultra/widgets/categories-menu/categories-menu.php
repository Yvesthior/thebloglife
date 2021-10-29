<?php

use Botble\Widget\AbstractWidget;

class CategoriesMenuWidget extends AbstractWidget
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
    protected $widgetDirectory = 'categories-menu';

    /**
     * TagsWidget constructor.
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function __construct()
    {
        parent::__construct([
            'name'           => __('Categories menu'),
            'description'    => __('Show categories menu and number posts'),
            'number_display' => 5,
            'name_custom_class' => '',
        ]);
    }
}
