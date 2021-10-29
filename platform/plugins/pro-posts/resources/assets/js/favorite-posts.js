$(document).ready(() => {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.btn-action-favorite-post', (event) => {
        event.preventDefault();
        let _self = $(event.currentTarget);

        if (_self.data('login-id') === '' || _self.data('login-id') === undefined) {
            window.showAlert('alert-success', 'Before you can add this post to your favorites, you must first log in!');
            return;
        }

        $.ajax({
            type: 'POST',
            cache: false,
            url: _self.data('url'),
            data: {
                post_id: _self.data('post-id'),
                type: _self.hasClass('post-bookmarked') ? 'remove' : 'add'
            },
            success: (res) => {
                _self.toggleClass('background8 post-bookmarked');
            },
            error: (res) => {
            }
        });
    });
});
