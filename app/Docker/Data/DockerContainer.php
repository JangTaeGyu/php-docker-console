<?php

namespace App\Docker\Data;

use DateTime;

class DockerContainer
{
    private string $id;
    private string $image;
    private string $name;
    private string $command;
    private string $networks;
    private string $mounts;
    private string $ports;
    private DateTime $createdAt;
    private string $runningFor;
    private string $size;
    private string $state;
    private string $status;

    public function __construct(
        string $id,
        string $image,
        string $name,
        string $command,
        string $networks,
        string $mounts,
        string $ports,
        string $createdAt,
        string $runningFor,
        string $size,
        string $state,
        string $status)
    {
        $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        $this->command = $command;
        $this->networks = $networks;
        $this->mounts = $mounts;
        $this->ports = $ports;
        $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s O T', $createdAt);
        $this->runningFor = $runningFor;
        $this->size = $size;
        $this->state = $state;
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getNetworks(): string
    {
        return $this->networks;
    }

    public function getMounts(): string
    {
        return $this->mounts;
    }

    public function getPorts(): string
    {
        return $this->ports;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getRunningFor(): string
    {
        return $this->runningFor;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}