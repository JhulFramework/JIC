<?php return
[

	'definition'			=> 'L=6-99:P=R',

      'allowed_hosts'     		=> [ 'gmail.com', 'yahoo.com', 'rediffmail.com', 'outlook.com', 'live.com', 'zoho.com' ],

      'if_verification_required'	=> TRUE,

	'verification_attempt_limit' 	=> 12,

	'validation_steps'		=> 'type:minLength:maxLength:host',
];
