<?php
class Artist
{
    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function saveArtist()
    {
        array_push($_SESSION['list_of_artists'], $this);
    }


}
?>
