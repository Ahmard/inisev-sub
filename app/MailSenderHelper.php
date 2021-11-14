<?php

namespace App;

class MailSenderHelper
{
    protected static int $siteId;
    protected static int $postId;

    public static function init(int $siteId, int $postId): void
    {
        self::$postId = $postId;
        self::$siteId = $siteId;
    }

    /**
     * @return int
     */
    public static function getPostId(): int
    {
        return self::$postId;
    }

    /**
     * @return int
     */
    public static function getSiteId(): int
    {
        return self::$siteId;
    }
}
