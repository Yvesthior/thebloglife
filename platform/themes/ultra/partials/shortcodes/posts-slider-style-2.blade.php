<!--Editor's Picked Start-->
<div class="widgets-post-carausel-1 pt-40 mb-40">
    <div class="container">
        <div class="post-carausel-1 border-radius-10 bg-white">
            <div class="row no-gutters">
                <div class="col col-1-5 background6 editor-picked-left d-none d-lg-block">
                    <div class="editor-picked">
                        <h4>{{ $title }}</h4>
                        <p class="font-medium color-grey mt-20 mb-30">{{ clean($description) }}</p>
                        <div class="post-carausel-1-arrow"></div>
                    </div>
                </div>
                <div class="col col-4-5 col-md-12">
                    <div class="post-carausel-1-items row">
                        @foreach ($posts as $post)
                            {!! Theme::partial('components.post-card-editor-picked', ['post' => $post]) !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Editor's Picked End-->
