<div class="sidebar-widget widget_categories mb-30">
    <div class="widget-header position-relative mb-30">
        <h5 class="widget-title mt-5 mb-30 color-white">{{ $config['name'] }}</h5>
        <div class="letter-background">{{ $config['name'][0] ?? '' }}</div>
    </div>
    <div class="post-block-list post-module-1 post-module-5">
        {!!
            Menu::generateMenu(['slug' => $config['menu_id'], 'view' => 'quicklink_menu', 'options' => ['class' => 'font-medium']])
        !!}
    </div>
    <div class="clearfix"></div>
</div>
