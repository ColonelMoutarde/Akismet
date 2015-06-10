<?php

namespace OpenClassrooms\Akismet\Models;

use OpenClassrooms\Akismet\Models\Impl\Comment;

/**
 * @author Arnaud Lefèvre <arnaud.lefevre@openclassrooms.com>
 */
interface CommentBuilder
{
    /**
     * @return CommentBuilder
     */
    public function create();

    /**
     * @param string $userIp
     *
     * @return CommentBuilder
     */
    public function withUserIp($userIp);

    /**
     * @param string $userAgent
     *
     * @return CommentBuilder
     */
    public function withUserAgent($userAgent);

    /**
     * @param string $authorName
     *
     * @return CommentBuilder
     */
    public function withAuthorName($authorName);

    /**
     * @param string $authorEmail
     *
     * @return CommentBuilder
     */
    public function withAuthorEmail($authorEmail);

    /**
     * @param string $content
     *
     * @return CommentBuilder
     */
    public function withContent($content);

    /**
     * @return Comment
     */
    public function build();
} 
