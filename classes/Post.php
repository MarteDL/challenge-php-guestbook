<?php


class Post
{
    private string $title;
    private string $date;
    private string $content;
    private string $author;

    public function __construct($title, $content, $author){
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = date("F j, Y");
    }

}