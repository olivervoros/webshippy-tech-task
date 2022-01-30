<?php

namespace WebshippyTechTask\Interfaces;

interface ReadCSVFileInterface
{
    public function read(string $filePath): array;
}
