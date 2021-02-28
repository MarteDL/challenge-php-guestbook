<?php


class postCollection
{
    private array $posts;

    public function __construct()
    {
        $json =  file_get_contents('text-files/messages.txt');
        $decoded = json_decode($json);

        foreach ($decoded AS $i => $post) {
            $decoded[$i] = new Post($post->author, $post->title, $post->message, $post->date);
            }
        $this->posts = array_reverse($decoded);
    }

    public function writeAwayPost($post)
    {
        $this->posts[] = $post;
        $encodedPosts = json_encode($this->posts);
        file_put_contents("text-files/messages.txt", $encodedPosts);
    }

    public function getPosts(): array
    {
        return $this->posts;
    }
}