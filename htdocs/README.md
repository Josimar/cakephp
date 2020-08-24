# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/github/workflow/status/cakephp/app/CakePHP%20App%20CI/master?style=flat-square)](https://github.com/cakephp/app/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.

## Começando

### ajuda dos comandos no diretório raiz /apps/cakephp/htdocs
bin/cake --help 

### Criar tabela
bin/cake bake migration CreateUsers id:integer:primary name:string lastname:string email:string phone:string password:string token:string status:integer created:datetime modified:datetime deleted:datetime 

bin/cake bake migration CreateColleges id:integer:primary name:string shortname:string email:string description:string location:string totalfaculty:integer imageurl:string phone:string status:integer created:datetime modified:datetime deleted:datetime 

bin/cake bake migration CreateBranches id:integer:primary name:string description:string collegid:integer startdate:datetime enddate:datetime totalseats:integer totaldurations:integer status:integer created:datetime modified:datetime deleted:datetime 

bin/cake bake migration CreateStudents id:integer:primary name:string email:string phone:string collegid:integer branchid:integer address:string bloodgroup:string gender:string urlimage:string dob:string status:integer created:datetime modified:datetime deleted:datetime 

bin/cake bake migration CreateStaffs id:integer:primary name:string email:string phone:string collegid:integer designation:string stafftype:string branchid:integer address:string bloodgroup:string gender:string urlimage:string dob:string status:integer created:datetime modified:datetime deleted:datetime 

bin/cake bake migration CreateTransportes id:integer:primary nome:string tipo:string descricao:string urlfoto:string urlvideo:string latitude:string logitude:string created:datetime modified:datetime deleted:datetime 

### Verificar status das migrations
bin/cake migrations status
