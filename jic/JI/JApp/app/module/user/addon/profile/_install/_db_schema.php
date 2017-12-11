<?php return
[
	'data' =>
	[
		'fields' =>
		'
		`userKey` int(11) NOT NULL PRIMARY KEY,
		`dataOne` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
		`dataTwo` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
		`dataThree` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
		`dataFour` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
		`dataFive` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
		`dataSix` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
		',

		'meta' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin',
	],

	'style' =>
	[
		'fields' =>
		'
		`userKey` int(11) NOT NULL,
		`dataOne` varchar(120) DEFAULT NULL,
		`dataTwo` varchar(120) DEFAULT NULL,
		`dataThree` varchar(120) DEFAULT NULL,
		`dataFour` varchar(120) DEFAULT NULL,
		`dataFive` varchar(120) DEFAULT NULL,
		`dataSix` varchar(120) DEFAULT NULL
		',

		'meta' => 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin',
	],
];
