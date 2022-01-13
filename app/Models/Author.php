<?php

namespace Danshin\Development\Models;

use Danshin\Development\Services\LangType;
use Danshin\Development\Services\LangRepository;

final class Author
{
    public readonly string $surname;
    public readonly string $name;
    public readonly string $surnameAndName;
    public readonly string $email;
    public readonly string $roleComment;

    public function __construct(
        string $surname,
        string $name,
        string $email,
        string $roleComment
    ) {
        $this->surname = $surname;
        $this->name = $name;
        $this->surnameAndName = "$surname $name";
        $this->email = $email;
        $this->roleComment = $roleComment;
    }

    public static function get(string $lang): self
    {
        $lang = LangType::tryFrom($lang);
        $lang = ($lang === null) ? LangType::EN : $lang;

        return new self(
            LangRepository::get($lang, "author.surname"),
            LangRepository::get($lang, "author.name"),
            LangRepository::get($lang, "author.email"),
            LangRepository::get($lang, "author.role_comment"),
        );
    }
}
