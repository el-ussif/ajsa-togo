<?php
namespace App\Constants;

class PostConstants {
    const CONTENT_TYPE_BLOG = 'BLOG';

    const CONTENT_TYPE_PROJECTS = 'PROJECTS';

    const CONTENT_TYPE_NEWS = 'NEWS';

    const CONTENT_TYPE_LIST = [
        self::CONTENT_TYPE_BLOG,
        self::CONTENT_TYPE_PROJECTS,
        self::CONTENT_TYPE_NEWS
    ];
}
