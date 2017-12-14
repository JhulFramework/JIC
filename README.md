### Codeigniter Application Installer

 - Web UI to facilitate codeigniter app installation


### Requirement

 - PHP Version >= 5.6


### Installation ( as it is )

 - CI 3.1.6 is included with it and is configured

 - Clone or download this repository

 - codeigniter application foder is  jic/codeigniter/application

 - codeigniter system folder is jic/codeigniter/system


### Installation ( advanced )

- Clone or download this repository

- you only need "jic" folder, you can delete "public_html" and  "jic/codeigniter" directory

- EDIT your codeigniter config/config.php and change respective lines to

```php

$config['base_url'] = \JI::I()->config('base_url');

$config['encryption_key'] = \JI::I()->config('encryption_key');

```

- EDIT your codeigniter config/database.php and change respective lines to

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

$env = 'prod' // enivoronment name, just a unique key to keep configuration seperate

// passing third parameter true will auto run installation if not installed already
\JI::run( __DIR__, $env, TRUE );

```

now you can access your url

### NOTE
 - before passing code to client or if you want to reinstall, delete content of directory jic/_data
 
