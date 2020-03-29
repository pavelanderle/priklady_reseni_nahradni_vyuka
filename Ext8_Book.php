<?php
class Writer{
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function info(){
        return "Author is $this->$name";
    }
}

class Book{
    private $name;
    private $author;

    public function __construct($name,$author){
        $this->name = $name;
        $this->author = new Writer($author);
    }

    public function info(){
        return "The name book is $this->name and author is ". $this->author->name;
    }
}

$book1 = new Book("Válka z mloky", "Karel Čapek");
echo $book1->info();
?>