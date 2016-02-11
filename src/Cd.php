<?php
class Cd
{
    private $artist;
    private $title;
    private $cover;


    function __construct($cd_artist, $cd_title, $cd_cover)
    {
        $this->artist = $cd_artist;
        $this->title = $cd_title;
        $this->cover = $cd_cover;
    }


    function getArtist()
    {
        return $this->artist;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getCover()
    {
        return $this->cover;
    }

    function saveCd()
    {
        array_push($_SESSION['list_of_cds'], $this);
    }

    function search($input_artist)
    {
        return strtolower($this->getArtistName()) == strtolower($input_artist);
    }

if (in_array($user_input, $list_of_cds->name))

    static function getAll()
    {
        return $_SESSION['list_of_cds'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_cds'] = array();
    }

    function getArtistName()
    {
        $current_artist =$this->artist;
        return $current_artist->getName();

    }


}
?>
