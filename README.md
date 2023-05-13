# Wordpress project using Composer

This is an opinionated wordpress project that you can use for *local development*

## Usage

You can create a new project by running:

```bash
composer create-project zaherg/wordpress-project my-project "<version>"
```

Remember to replace `<version>` with the tag you want to use like `6.0`,`6.1` and `6.2`.

Once you finished, you can edit `.env` file to update the following information

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
WP_SITEURL=
```

All environment variables has a default value, you can always consolidate the [config](./support/config.php) file
to check all the environment variables available.

once you are done editing the `.env` file, you should run the following command

```
composer wp:install
```

> **Note**
>
> There is a small fix for wp cli which was copied from https://github.com/orgs/wp-cli/discussions/5765 and
> https://github.com/wp-cli/wp-cli/issues/5623#issuecomment-1469899992


## License

This is licensed under the GPL version 2 or later.