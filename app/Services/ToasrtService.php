<?php

namespace App\Services;

class ToasrtService
{
    const FLASH_NAME = 'toastr';

    /**
     * @param string $type
     * @param $message
     * @return void
     */
    public static function addMessage(string $type, $message): void
    {
        session()->flash(
            self::FLASH_NAME,
            self::mergeWithLastToastr($type, $message)
        );
    }

    /**
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function getAll(): array
    {
        return session()->get(self::FLASH_NAME, []);
    }

    /**
     * @param $type
     * @param $message
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    private static function mergeWithLastToastr($type, $message): array
    {
        return array_merge(
            (array)session()->get(self::FLASH_NAME),
            [[$type => $message]]);
    }
}
