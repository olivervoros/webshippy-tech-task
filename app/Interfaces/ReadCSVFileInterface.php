<?php

interface ReadCSVFileInterface
{
    public function read(string $filePath): array;
}
