<?php return
[

	'definition'				=> 'L=6-99:P=R',

      'check_host'				=> FALSE,

      'allowed_hosts'				=> [ 'gmail.com', 'yahoo.com', 'rediffmail.com', 'outlook.com', 'live.com', 'zoho.com' ],

      'if_verification_required'     	=> FALSE,

	'verification_attempt_limit' 		=> 12,

	'validation_steps'			=> 'type:host:minLength:maxLength:notUsed',

];
