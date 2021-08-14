<?php

namespace App\Entity;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    private int $id;
    private string $phone;

    protected array $hidden = ["password"];
    protected array $fillable = ["phone", "password"];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
