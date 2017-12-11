### Codeignitor Application Installer
 - Web UI to facilitate Codeignitor app installation

### Requirement
- PHP Version >= 5.6

### Installation ( default )

 - move your codeignitor application and system folder in /path/to/jic/codeignitor directory

EDIT /path/to/jic/codeignitor/application/config/config.php

and change respective lines to

'''php

$config['base_url'] = \\JI::I()->config('base_url');

$config['encryption_key'] = \\JI::I()->config('encryption_key');

'''
