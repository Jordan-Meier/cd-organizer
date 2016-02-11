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

    function save()
    {
        array_push($_SESSION['list_of_cds'], $this);
    }

    // function search($input_artist)
    // {
    //     return ($this->)
    //
    //     strpos($this->artist, $user_input)
    // }

    static function getAll()
    {
        return $_SESSION['list_of_cds'];
    }

    static function deleteAll()
    {
        $_SESSION['list_of_cds'] = array();
    }




}
?>
