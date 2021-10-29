@php Theme::layout('homepage'); @endphp

<div class="container">
    <div style="margin: 40px 0;">
        <h4 style="color: #f00; margin-bottom: 15px;">You need to setup your homepage first!</h4>

        <p><strong>1. Go to Admin -> Plugins then activate all plugins.</strong></p>
        <p><strong>2. Go to Admin -> Pages and create a page:</strong></p>

        <div style="margin: 20px 0;">
            <div>- Content:</div>
            <div style="border: 1px solid rgba(0,0,0,.1); padding: 10px; margin-top: 10px;">
                <div>[posts-slider title="" filter_by="featured" limit="4" include="" style="1"][/posts-slider]</div>
                <div>[posts-slider title="Editor's picked" filter_by="ids" limit="4" include="1,2,3,4" style="2" description="The featured articles are selected by experienced editors. It is also based on the reader's rating. These posts have a lot of interest."][/posts-slider]</div>
                <div>[posts-grid title="Trending Topics" subtitle="" categories="" categories_exclude="" style="3" limit="6"][/posts-grid]</div>
                <div>[posts-grid title="Recent Articles" subtitle="Don't miss new trend" categories="" categories_exclude="" style="2" limit="6"][/posts-grid]</div>
                <div>[theme-galleries title="@ OUR GALLERIES" limit="8"][/theme-galleries]</div>
            </div>
            <br>
            <div>- Template: <strong>Homepage</strong>.</div>
        </div>

        <p><strong>3. Then go to Admin -> Appearance -> Theme options -> Page to set your homepage.</strong></p>
    </div>
</div>
