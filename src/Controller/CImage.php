<?php

namespace Controller;

use Foundation\FPersistentManager;
use Entity\EImage;

class CImage
{
    // public static function show(int $id): void
    // {
    //     if ($id <= 0) {
    //         http_response_code(404);
    //         exit;
    //     }

    //     $pm = new FPersistentManager();
    //     $image = $pm->findById(EImage::class, $id);

        
    // if (!$image) {
    //     http_response_code(404);
    //     exit;
    // }

    // $stream = $image->getContent();

    // if (is_resource($stream)) {
    //     rewind($stream);
    //     $data = stream_get_contents($stream);
    // } else {
    //     $data = $stream;
    // }

    // header('Content-Type: ' . $image->getMimeType());
    // header('Content-Length: ' . strlen($data));
    // header('Cache-Control: public, max-age=86400');

    // echo $data;
    // exit;
    // }
}
