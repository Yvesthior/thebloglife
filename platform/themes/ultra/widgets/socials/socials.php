<?php

use Botble\Widget\AbstractWidget;

class SocialsWidget extends AbstractWidget
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
    protected $widgetDirectory = 'socials';

    /**
     * Widget constructor.
     */
    public function __construct()
    {
        parent::__construct([
            'name'        => __('Socials'),
            'description' => __('Widget to display socials'),
            'title'       => 'Follow us'
        ]);
    }
}
