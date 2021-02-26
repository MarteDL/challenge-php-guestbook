<?php


use JetBrains\PhpStorm\Pure;

class Post implements JsonSerializable
{
    protected string $author;
    protected string $title;
    protected string $message;
    protected string $date;

    #[Pure] public function __construct($author, $title, $message, $date)
    {
        $this->author = $author;
        $this->title = $title;
        $this->message = $message;
        $this->date = $date;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDate(): bool|string
    {
        return $this->date;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function jsonSerialize()
    {
        return [
            'author' => $this->author,
            'title' => $this->title,
            'message' => $this->message,
            'date' => $this->date
        ];
    }
}