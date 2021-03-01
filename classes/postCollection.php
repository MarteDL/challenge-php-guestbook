<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
set_error_handler("var_dump");

class postCollection
{
    private array $posts;

    public function __construct()
    {
        $json = file_get_contents('text-files/messages.txt');
        $decoded = json_decode($json);

        foreach ($decoded as $i => $post) {
            $decoded[$i] = new Post($post->author, $post->title, $post->message, $post->date);
        }

        $this->posts = $decoded;
    }

    public function writeAwayPost($post)
    {
        $this->posts[] = $post;
        $encodedPosts = json_encode($this->posts);
        file_put_contents("text-files/messages.txt", $encodedPosts);
    }

    public function sortPosts() {
        $compareDates = function ($post1, $post2) {
            return strtotime($post1->getDate()) - strtotime($post2->getDate());
        };
        usort($this->posts, $compareDates);
    }

    public function getPosts(): array
    {
        $this->sortPosts();
        return array_reverse($this->posts);
    }
}