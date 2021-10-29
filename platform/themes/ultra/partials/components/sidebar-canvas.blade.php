<aside id="sidebar-wrapper"
       class="custom-scrollbar offcanvas-sidebar {{ $headerStyle == 'style-2' || $headerStyle == 'style-3' ? 'position-right' : '' }}"
       data-load-url="{{ route('theme.ajax-get-panel-inner') }}">
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner"></div>
</aside>
