<?php

namespace App\Enums;

enum PdfOutputType: string
{
    case ATTACH = 'attach';
    case DOWNLOAD = 'download';
    case STREAM = 'stream';
}
