# IESA-Symfony

- https://speakerdeck.com/dunglas/symfony-4-run-through

## Création du projet

 - composer create-project symfony/skeleton mywebsite
 - composer require server --dev

## Création database
 - https://symfony.com/doc/current/doctrine.html
 - composer require doctrine
 - composer maker --dev
 - bin/console doctrine:database:create

## Création entity
 - bin/console make:entity
 - bin/console make:migration
 - bin/console doctrine:migrations:migrate
 - en cas de modification(s) manuelle(s) php bin/console make:entity --regenerate

## Ajout des relations
 - https://symfony.com/doc/current/doctrine/associations.html
 - https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/association-mapping.html#many-to-many-bidirectional

## Ajout de datafixtures
 - https://github.com/hautelook/AliceBundle

## Soucis Authentification MySQL dans la VM

- sudo mysql -uroot
- ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'VOTRE PASSWORD';
- FLUSH PRIVILEGES;
- exit

## Ressources

 - VM https://drive.google.com/open?id=1O_YKFpdyk7xeocGAu63-nprFD7JDi46e
 - https://fr.wikipedia.org/wiki/Programmation_orient%C3%A9e_objet
 - https://fr.wikipedia.org/wiki/Principe_KISS
 - https://en.wikipedia.org/wiki/SOLID
 - http://blog.xebia.fr/2011/07/18/les-principes-solid/
 - https://williamdurand.fr/2013/07/30/from-stupid-to-solid-code/
 - https://fr.slideshare.net/ArnaudLanglade/programmation-stupid-vs-solid
 - https://en.wikipedia.org/wiki/Dependency_injection
 - https://en.wikipedia.org/wiki/Don%27t_repeat_yourself
 - https://en.wikipedia.org/wiki/Software_design_pattern
 - https://fr.wikipedia.org/wiki/PHP
 - https://afup.org/home
 - https://www.phpmetrics.org/
 - https://phpqa.io/
 - https://www.php-fig.org/
