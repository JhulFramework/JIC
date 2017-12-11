### Codeignitor Application Installer
 - Web UI to facilitate Codeignitor app installation

### Requirement
- PHP Version >= 5.6

### Installation ( as it is )

 - Clone or download this repository

 - EDIT your application/config/config.php and change respective lines to

```php

$config['base_url'] = \JI::I()->config('base_url');

$config['encryption_key'] = \JI::I()->config('encryption_key');

```

- EDIT your application/config/database.php and change respective lines to

```php

'hostname' => \JI::I()->config('db.host'),
'username' => \JI::I()->config('db.username') ,
'password' => \JI::I()->config('db.password'),
'database' => \JI::I()->config('db.name'),
'dbprefix' => \JI::I()->config('db.prefix'),

```

- Move Your Codeignitor application directory and codeignitor system directory inside /path/to/jic/codeignitor/


### Installation ( advanced )

- Clone or download this repository

- you only need "jic" folder, you can delete "public_html" and  "jic/codeigniter" directory

- EDIT your codeignitor config/config.php and change respective lines to

```php

$config['base_url'] = \JI::I()->config('base_url');

$config['encryption_key'] = \JI::I()->config('encryption_key');

```

- EDIT your codeignitor config/database.php and change respective lines to

```php

'hostname' => \JI::I()->config('db.host'),
'username' => \JI::I()->config('db.username') ,
'password' => \JI::I()->config('db.password'),
'database' => \JI::I()->config('db.name'),
'dbprefix' => \JI::I()->config('db.prefix'),

```

- in your public root index.php, add follwing lines to the top

```php

require( '/path/jic/include_me.php');

$env = 'prod' // enivoreonmnet name, just a unique key to keep configuration seperate

// passing third parameter true will auto run installation if not installed already
\JI::run( __DIR__, $env, TRUE );

// if you dont want to run auto installation use
\JI::run( __DIR__, $env );


```

Creating seperate installation file
example install.php

```php

require( '/path/jic/include_me.php');

$env = 'prod' // enivoreonmnet name, just a unique key to keep configuration seperate

\JI::run( __DIR__, $env, TRUE );

```

delete install.php after installation
