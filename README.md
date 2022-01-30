# Open Startup


## Présentation :
```
https://www.openstartup.fr/

```


## Installation :
```bash
//Installer les dépendances
composer install

//Créer la base de données
symfony console doctrine:database:create

//Créer une migration (sorte de sauvegarde)
symfony console make:migration

//Migrer la migration
symfony console doctrine:migrations:migrate

//Supprimer la base de données
symfony console doctrine:database:drop --force

//Charger les fixtures
symfony console doctrine:fixtures:load

//Autre 
symfony serve -d
symfony server:start
symfony server:stop

```

## Les Bundles :
Pour ce projet, j'ai utilisé les bundles suivants :
- [Fixtures](https://symfony.com/bundles/DoctrineFixturesBundle/current/index.html) : `composer require --dev orm-fixtures`
- 
- KnpPaginatorBundle for the pagination
- KnpTimeBundle for the "3 minutes ago" text

We could cheat even more using 

- [FOSUserBundle](https://github.com/FriendsOfSymfony/FOSUserBundle) to manage user login / registration
- [SonataAdminBundle](https://github.com/sonata-project/SonataAdminBundle) to manage backend
- [StofDoctrineExtensionsBundle](https://github.com/stof/StofDoctrineExtensionsBundle) to manage the "sluggable" behaviour


