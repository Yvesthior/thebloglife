<ul class="float-left mr-30 font-medium" {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        @if($loop->index % 2 == 1) @continue @endif
        <li class="cat-item @if ($row->has_child) menu-item-has-children @endif @if ($row->css_class) {{ $row->css_class }} @endif @if ($row->active) current-menu-item @endif">
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                @if ($row->icon_font) <i class="{{ trim($row->icon_font) }}"></i> @endif {{ $row->title }}
            </a>
        </li>
    @endforeach
</ul>
<ul class="float-left mr-30 font-medium" {!! $options !!}>
    @foreach ($menu_nodes as $key => $row)
        @if($loop->index % 2 == 0) @continue @endif
        <li class="cat-item @if ($row->has_child) menu-item-has-children @endif @if ($row->css_class) {{ $row->css_class }} @endif @if ($row->active) current-menu-item @endif">
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                @if ($row->icon_font) <i class="{{ trim($row->icon_font) }}"></i> @endif {{ $row->title }}
            </a>
        </li>
    @endforeach
</ul>

