<?php


class postCollection
{
    private array $posts;

    public function __construct()
    {
        $json =  file_get_contents('posts/messages.txt');
        $decoded = json_decode($json);

        foreach ($decoded AS $i => $post) {
            $decoded[$i] = new Post($post->author, $post->title, $post->message, $post->date);
            }
        $this->posts = $decoded;
    }

    public function writeAwayPost($post)
    {
        $this->posts[] = $post;
        $encodedPosts = json_encode($this->posts);
        file_put_contents("posts/messages.txt", $encodedPosts);
    }

    public function getLastTwentyPosts(): array
    {
        $newestPostsFirst = array_reverse($this->posts);

        if (count($newestPostsFirst) > 20) {
            return array_slice($this->posts, 0, 20);
        }
        return $newestPostsFirst;
    }
}