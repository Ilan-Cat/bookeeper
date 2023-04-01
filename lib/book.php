<?php

class Book
{
    private static $books = array();
    private $author;
    private $title;
    private $description;
    private $year;
    private $publisher;
    private $bestseller;
    private $isbn;
    private $cover;

    public function __construct($isbn,$title,$author,$description,$year,$publisher,$bestseller,$cover)
    {
        // Set object properties
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->year = $year;
        $this->publisher = $publisher;
        $this->bestseller = $bestseller;
        $this->cover = $cover;
        // Add the book object to the books array
        self::$books[] = $this;
    }

    // Getters and setters for the object properties

    public static function getAllBooks()
    {
        if (empty(self::$books)) {
            // Connect to the database
            require_once("config.php");
            // Retrieve all books from the database
            $result = $db->query("SELECT * FROM books ORDER BY title");
            while ($book = $result->fetch_assoc()) {
                new Book($book['isbn'],$book['title'],$book['author'],$book['description'],$book['year'],$book['publisher'],$book['bestseller'],$book['cover']);
            }

            // Close the database connection
            $db->close();
        }

        return self::$books;
    }

    public static function getAllFavorites($iduser, $allbooks){
        $favorites = [];
        require("config.php");
        $result = $db->query("SELECT * FROM userfavorites WHERE user_id=$iduser");
        while ($book = $result->fetch_assoc()) {
            $isbn = $book['isbn'];
            foreach ($allbooks as $bookObj) {
                if ($bookObj->getIsbn() == $isbn) {
                    $favorites[] = $bookObj;
                    break;
                }
            }
        }
        $db->close();
        return $favorites;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getPublisher()
    {
        return $this->publisher;
    }
    public function getBestseller()
    {
        return $this->bestseller;
    }

    public function getCover()
    {
        return $this->cover;
    }
}
