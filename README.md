# Сведения о разработке

Содержит сведения об авторе сайта и дате разработки.  
Поддерживаются локализации en, ru.  

## Требования
- PHP 8.1 или выше  
- Laravel 8.0  или выше
- Composer

## Установка
Добавьте в файл composer.json

    "require": {
        "mldanshin/package-development": "^1.0"
    }

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mldanshin/package-development"
        }
    ]

Выполните

    composer update

## Использование
Пример получения сведений об авторе

    use Danshin\Development\Repositories\Author;

    $author = Author::get("ru");
    $author->surname; //фамилия
    $author->name(); //имя
    $author->surnameAndName(); //фамилия и имя
    $author->email(); //адрес почты
    $author->roleComment(); //описание роли

Пример получения сведений о дате

    use Danshin\Development\Repositories\Year;

    $year = new Year();
    $year->periodFrom(2020); //период от 2020 до текущего года
    $year->periodFromTo(2020, 2021); //период от 2020 до 2021
    $year->today(); //текущий год
