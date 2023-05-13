# Wordpress project using Composer

This is an opinionated wordpress project that you can use for *local development*

## Create a new project

To start a new project using this skeleton, you just need to run :

```bash
composer create-project zaherg/wordpress-project [path] [version]
```

- `[path]` is the path to the installation directory, if not defined, a wordpress-project folder will be created in your current path.
- `[version]` is the version of the project to use when installing, if not defined, the more recent stable is used, else you can use : `dev-main`, `v6.2`, ...

You can also use a simple git clone :

```
git clone https://github.com/zaherg/wordpress-project
```

## Configuration

To configure database credentials and all the others settings, you need to edit `.env` file and update the following information

```dotenv
APP_ENV=
WP_DEBUG=
WP_DEBUG_DISPLAY=
SCRIPT_DEBUG=
GRAPHQL_DEBUG=

DB_NAME=
DB_USER=
DB_PASSWORD=
DB_HOST=
WP_HOME=
```

All environment variables has a default value, you can always consolidate the [config](./support/config.php) file
to check all the environment variables available and how to change them.

once you are done editing the `.env` file, you can either run the installer via your browser or via the CLI

## Installation via command line

You can install wordpress and activate a few plugins automatically via the command

```
composer wp:install
```

Note that:
- There is some default values in `wp-cli.yml` so feel free skip them from the prompt.
- you can create a specific `wp-cli.local.yml` file at project root and overwrite the default values.
- Make sure that the url you entered in the prompt match your `WP_HOME/core` so if your `WP_HOME` is `http://wordpress.test`, the url you enter should be `http://wordpress.test/core`

### Default user login information

```
user name: admin
password: password
```

## Using WP-CLI

> **Note**
>
> There is a small fix for wp cli which was copied from https://github.com/orgs/wp-cli/discussions/5765 and
> https://github.com/wp-cli/wp-cli/issues/5623#issuecomment-1469899992

I created a small command `wp:exec` within `composer` that you can use to run `wp-cli` commands and not get the deprecation errors,
to use this command you need to understand how `composer` works, basically remember to add `--` before any parameter you want to send
for example: 

- To get help we run the command `composer run wp:exec -- --help`
- To activate a plugin: `composer run wp:exec plugin install disable-wordpress-updates -- --activate`

And so on, hopefully, soon we will not need this trick and `wp-cli` will have upgraded to support `php 8.1`


## License

This is licensed under the GPL version 2 or later.