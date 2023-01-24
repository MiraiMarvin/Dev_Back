<?php
class album_share
{
    public function __construct(
        public int $id_receive,
        public int $id_send,
        public int $album_id,

    )
    {
    }



}
?>