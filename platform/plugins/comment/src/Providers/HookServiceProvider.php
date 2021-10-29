<?php


namespace Botble\Comment\Providers;

use Botble\Blog\Models\Post;
use Botble\Comment\Repositories\Interfaces\CommentInterface;
use RvMedia;
use Botble\Member\Models\Member;
use Illuminate\Support\ServiceProvider;
use MacroableModels;
use Theme;
use Html;
use MetaBox;
use SlugHelper;

class HookServiceProvider extends ServiceProvider
{
    protected $currentReference;

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function boot()
    {
        $this->registerAttribute();

        add_shortcode('comment', 'Comment', 'Comment for this article', [$this, 'renderComment']);
        // add_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, [$this, 'storageCurrentReference'], 100, 2);
        add_filter(BASE_FILTER_APPEND_MENU_NAME, [$this, 'getUnreadCount'], 210, 2);
        if (setting('comment_enable')) {
            add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function ($form, $data) {
                if (get_class($data) == Post::class) {
                    $form->add('comment_status', 'onOff', [
                        'label'         => trans('plugins/comment::comment.name'),
                        'label_attr'    => ['class' => 'control-label'],
                        'default_value' => true,
                    ]);
                }
                return $form;
            }, 127, 2);
            add_action(BASE_ACTION_AFTER_CREATE_CONTENT, function ($type, $request, $object) {
                if (get_class($object) == Post::class) {
                    MetaBox::saveMetaBoxData($object, 'comment_status', $request->input('comment_status'));
                }
            }, 230, 3);
        
            add_action(BASE_ACTION_AFTER_UPDATE_CONTENT, function ($type, $request, $object) {
                if (get_class($object) == Post::class) {
                    MetaBox::saveMetaBoxData($object, 'comment_status', $request->input('comment_status'));
                }
            }, 231, 3);
        }
    }

    /**
     * Render comment view section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function renderComment()
    {
        if (!setting('comment_enable')) {
            return null;
        }
        
        $this->loadAssets();

        $reference = $this->getReference();

        $loggedUser = auth()->user() ? request()->user()->only(['id', 'email']) : ['id' => 0];

        add_filter(THEME_FRONT_HEADER, function ($html) {
            $this->addSchemas($html);
            return $html . view('plugins/comment::partials.trans');
        }, 15);

        return $reference ? view('plugins/comment::short-codes.comment', compact('reference', 'loggedUser')) : null;
    }

    /**
     * @param $screen
     * @param $object
     */
    public function storageCurrentReference($screen, $object)
    {
        $this->currentReference = $object;
        $menuEnables = json_decode(setting('comment_menu_enable', '[]'), true);

        if (setting('comment_enable') && in_array(get_class($object), $menuEnables)) {
            if (strpos($object->content, '[comment') === false) {
                $object->content.= '[comment][/comment]';
            }
        }
    }

    /**
     * @return string|array
     */
    protected function getReference($isBase64 = true)
    {
        $slug = SlugHelper::getSlug(request()->route('slug'), '');
      
        $reference = [
            'reference_type'    => $slug->reference_type,
            'reference_id'      => $slug->reference_id
        ];

        return $isBase64 ? base64_encode(json_encode($reference)) : $reference;
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function loadAssets()
    {
        Theme::asset()
            ->container('footer')
            ->usePath(false)
            ->add('bb-comment', 'vendor/core/plugins/comment/js/comment.js', ['jquery'], [], comment_plugin_version());

        Theme::asset()
            ->usePath(false)
            ->add('fontawesome-css', 'vendor/core/plugins/comment/css/vendor/fontawesome-all.min.css', [], [], comment_plugin_version())
            ->add('bb-comment-css', 'vendor/core/plugins/comment/css/comment.css', [], [], comment_plugin_version());
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function registerAttribute()
    {
        if (has_member()) {
            MacroableModels::addMacro(Member::class, 'getNameAttribute', function () {
                return $this->first_name.' '. $this->last_name;
            });
        }
    }

    public function getUnreadCount($index, $menuId)
    {
        if ($menuId == 'cms-plugins-comment') {
            $unread = app(CommentInterface::class)->count([
                ['id', '>', setting('admin-comment_latest_viewed_id', 0)]
            ]);

            if ($unread > 0) {
                return Html::tag('span', (string)$unread, ['class' => 'badge badge-success'])->toHtml();
            }
        }

        return $index;
    }

    protected function addSchemas(&$html)
    {
        $schemaJson = array(
            '@context' => 'http://schema.org',
            '@type' => 'NewsArticle',
        );


        if ($this->currentReference && get_class($this->currentReference) === Post::class) {
            $post = $this->currentReference;
            $category = $post->categories()->first();

            if ($category) {
                $schemaJson['category'] = $category->name;
            }

            $schemaJson = array_merge($schemaJson, [
                'url' => $post->url,
                'description' => $post->description,
                'name' => $post->name,
                'image' => RvMedia::getImageUrl($post->image),
            ]);

            $html .= '<script type="application/ld+json">'. json_encode($schemaJson) .'</script>';
        }
    }
}
