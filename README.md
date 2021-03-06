# AutoCFC

Sistema de Gestão para Auto Escolas (Centro de Formação de Condutores). Projeto realizado para fins academicos como trabalho de conclusão de curso.

## instalação

> Instale as dependências do projeto laravel

```bash
composer install
```

> Copie o .env.example e altere seu nome para .env
> Altere os dados de conexão com seu banco de dados MySQL dentro do seu arquivo .env
> Execute a instalação padrão do Backpack que é a base na qual o sistema de administração foi construida.

```bash
php artisan backpack:base:install
php artisan backpack:crud:install
```

> Execute suas migrações para criar as tabelas e as seeds que irão preencher o sistema com dados iniciais. O exemplo abaixo faz isso tudo de uma vez.

```bash
php artisan migrate --step --seed
```

> Caso não tenha um servidor local você pode testar criando um com o comando abaixo.

```bash
php artisan serve
```

## referências e documentações

> Laravel [https://laravel.com/docs/5.6/installation](https://laravel.com/docs/5.6/installation)

> Backpack [https://backpackforlaravel.com/docs/3.4/installation](https://backpackforlaravel.com/docs/3.4/installation)
