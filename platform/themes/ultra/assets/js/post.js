"use strict";

let handleRecentlyViewedPosts = function () {
    let cookieName = window.currentLanguage + '_recently_viewed_posts';
    let postId = $('div[data-post-id]').data('post-id');
    let recentPostCookies = decodeURIComponent(getCookie(cookieName));

    let arrList = [];
    if (recentPostCookies != null && recentPostCookies != undefined && recentPostCookies.length > 0)
        arrList = JSON.parse(getCookie(cookieName));

    if (postId != null && postId != 0 && postId != undefined) {
        let item = {id: postId};
        if (recentPostCookies == undefined || recentPostCookies == null || recentPostCookies == '') {
            arrList.push(item);

            setCookie(cookieName, JSON.stringify(arrList), 60);
        } else {
            arrList = JSON.parse(recentPostCookies);
            var index = arrList.map(function (e) {
                return e.id;
            }).indexOf(item.id);

            if (index === -1) {
                if (arrList.length >= 20)
                    arrList.shift();

                arrList.push(item);
                clearCookies(cookieName);
                setCookie(cookieName, JSON.stringify(arrList), 60);
            } else {
                arrList.splice(index, 1);
                arrList.push(item);

                clearCookies(cookieName);
                setCookie(cookieName, JSON.stringify(arrList), 60);
            }
        }
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        var url = new URL(window.siteUrl);
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = 'expires=' + d.toUTCString();
        document.cookie = cname + '=' + cvalue + "; " + expires + '; path=/' + '; domain=' + url.hostname;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return '';
    }

    function clearCookies(name) {
        var url = new URL(window.siteUrl);
        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/' + '; domain=' + url.hostname;
    }
}

handleRecentlyViewedPosts();
