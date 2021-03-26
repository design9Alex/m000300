# ![](public/static/admin/images/common/logo.png) Minmax Admin

`Current v3.2.43` `Laravel 5.6.33` `PHP ^7.1.3`

## Project Install

### Initial project

```bash
> composer create-project --prefer-dist minmax/laravel <project-folder> "3.2.*"
```

Before update you should edit `composer.json` to choose what modules for project using.

```bash
> composer update
> php artisan minmax:init --first
```

### Useful commands

```bash
> composer dump-autoload                # Update class autoload
> php artisan cache:clear               # Clear all cache (Especial language cache)
> php artisan view:clear                # Clear all compiled view files
> php artisan migrate:fresh --seed      # Refresh migration and build seed data
> php artisan ide-helper:generate       # Generate new ide-helper mapping file
> php artisan minmax:generator [name]   # Generate new feature all crud files
> php artisan minmax:init               # Do all refresh for project
```

### Site url (Develop only)

```
(your site)                         # Frontend Website
(your site)/siteadmin               # Admin Backend
(your site)/administrator           # Super Admin manager
```

## Project Construct

### Folder `app`

```
Http\Controllers
# Each feature has their own controller.

Http\Requests
# Each modle has their own requset rule with different method.

Models
# Put database connection here, one model one table. Also set table relation here.

Repositories
# The logic for model using. If there are columns with multi language,
# please put column name into $languageColumns array.

Presenters
# This is for view components. Form fields, selection item, all define here.
# You need make for model using. It's more easy to customize each model show up style.

Transformers
# This is for datatable list data.

Helpers
# You can make your project shortcut functions.

Mails
# Here is mailer. Please check Laravel offical documents.
```

### Manage `routes`

```
\app\Providers\RouteServiceProvider
# Group platform's route setting. Default only turn on web platform.

# route file is already with auth middleware. (user login system)
```

## Project go live

### Edit `.env` file for server setting.

1. Change app name for project.
2. Database connection information.
3. Mailer account information.
4. Analytics view id change.
5. App url change to live domain name.
6. Log channel set to `daily`.
7. Debug switch to `false`.
8. App environment set to `production`.

### Lite composer required.

1. Remove vendor folder.
2. Run `composer install --no-dev`

### Make cache to boost website.

1. `php artisan cache:clear`
2. `php artisan view:clear`
3. `php artisan route:trans:cache`
4. `php artisan config:cache`

If config cache cannot make on live server, please make local and edit `bootstrap\config.php` to change all absolute path to live server path.

### Make sure server url rewrite rule.

Edit .htaccess or server's *.conf setting to fit laravel official document.

## Notice

1. You can make `resources\views\vendor\<package>\...` or `resources\lang\vendor\<package>\...` to override package's views and translations.
2. Using `php artisan minmax:generator [ModelName]` to easy create a new feature crud need files include Controller, Request, Model, Repository, Presenter, Transformer, and View files. You can command `php artisan minmax:generator --help` and get parameters usage

## Links

* https://laravel.com/docs/5.6
* https://docs.laravel-dojo.com/laravel/5.5

## License

Made by Jeff Chen (Jeffy).

The Minmax Laravel project powered by [MINMAX](https://minmax.tw) company, all rights reserved.
