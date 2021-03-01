<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
set_error_handler("var_dump");

use JetBrains\PhpStorm\Pure;

class Post implements JsonSerializable
{
    private string $author;
    private string $title;
    private string $message;
    private string $date;
    private array $badWords;


    #[Pure] public function __construct($author, $title, $message, $date)
    {
        $this->author = $author;
        $this->title = $title;
        $this->message = $message;
        $this->date = $date;

        $jsonBadWords = file_get_contents('text-files/badwords.txt');
        $decodedBadWords = json_decode($jsonBadWords);
        $this->badWords = $decodedBadWords;
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

    #[Pure] public function containsBadWords(): bool
    {
        foreach ($this->badWords as $badWord) {
            if (str_contains($this->title, $badWord)) {
                return true;
            }
            if (str_contains($this->author, $badWord)) {
                return true;
            }
            if (str_contains($this->message, $badWord)) {
                return true;
            }
        }
        return false;
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