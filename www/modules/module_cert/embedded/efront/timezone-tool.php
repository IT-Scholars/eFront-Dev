<?PHP

/*
 * Returning an array with the pairs of eFront and vLab eFront2vLabTimezones
 */
function geteFront2vLabTimezones() {
	
	$eFront2vLabTimezones = array(
		"Pacific/Kwajalein" 			=> "GMT+12:00 Pacific/Kwajalein",
		"Pacific/Samoa" 				=> "GMT-11:00 Pacific/Samoa",
		"Pacific/Honolulu" 				=> "GMT-10:00 Pacific/Honolulu",
		"US/Alaska" 					=> "GMT-09:00 US/Alaska",
		"America/Los_Angeles" 			=> "GMT-08:00 America/Los_Angeles",
		"America/Mazatlan" 				=> "GMT-07:00 America/Mazatlan",
		"America/Phoenix" 				=> "GMT-07:00 America/Phoenix",
		"America/Chicago" 				=> "GMT-06:00 America/Chicago",
		"America/Costa_Rica" 			=> "GMT-06:00 America/Costa_Rica",
		"America/Mexico_City" 			=> "GMT-06:00 America/Mexico_City",
		"Canada/Saskatchewan" 			=> "GMT-06:00 Canada/Saskatchewan",
		"America/New_York" 				=> "GMT-05:00 America/New_York",
		"America/Indiana/Indianapolis" 	=> "GMT-05:00 America/Indiana/Indianapolis",
		"America/Bogota" 				=> "GMT-05:00 America/Bogota",
		"America/Caracas" 				=> "GMT-04:30 America/Caracas",
		"America/Santiago" 				=> "GMT-04:00 America/Santiago",
		"America/La_Paz" 				=> "GMT-04:00 America/La_Paz",
		"Canada/Newfoundland" 			=> "GMT-03:30 Canada/Newfoundland",
		"America/Buenos_Aires" 			=> "GMT-03:00 America/Buenos_Aires",
		"Etc/GMT+2" 					=> "GMT-02:00 Etc/GMT+2",
		"Atlantic/Azores" 				=> "GMT-01:00 Atlantic/Azores",
		"Atlantic/Cape_Verde" 			=> "GMT-01:00 Atlantic/Cape_Verde",
		"Africa/Casablanca" 			=> "GMT+00:00 Africa/Casablanca",
		"Europe/London" 				=> "GMT+00:00 Europe/London",
		"Europe/Paris" 					=> "GMT+01:00 Europe/Paris",
		"Europe/Zagreb" 				=> "GMT+01:00 Europe/Zagreb",
		"Europe/Bratislava" 			=> "GMT+01:00 Europe/Bratislava",
		"Europe/Vienna" 				=> "GMT+01:00 Europe/Vienna",
		"Africa/Cairo" 					=> "GMT+02:00 Africa/Cairo",
		"Africa/Harare" 				=> "GMT+02:00 Africa/Harare",
		"Asia/Jerusalem" 				=> "GMT+02:00 Asia/Jerusalem",
		"Europe/Bucharest" 				=> "GMT+02:00 Europe/Bucharest",
		"Europe/Helsinki" 				=> "GMT+02:00 Europe/Helsinki",
		"Europe/Athens" 				=> "GMT+02:00 Europe/Athens",
		"Asia/Kuwait" 					=> "GMT+03:00 Asia/Kuwait",
		"Africa/Nairobi" 				=> "GMT+03:00 Africa/Nairobi",
		"Asia/Baghdad" 					=> "GMT+03:00 Asia/Baghdad",
		"Europe/Moscow" 				=> "GMT+03:00 Europe/Moscow",
		"Asia/Tehran" 					=> "GMT+03:30 Asia/Tehran",
		"Asia/Muscat" 					=> "GMT+04:00 Asia/Muscat",
		"Asia/Baku" 					=> "GMT+04:00 Asia/Baku",
		"Asia/Kabul" 					=> "GMT+04:30 Asia/Kabul",
		"Asia/Karachi" 					=> "GMT+05:00 Asia/Karachi",
		"Asia/Yekaterinburg" 			=> "GMT+05:00 Asia/Yekaterinburg",
		"Asia/Calcutta" 				=> "GMT+05:30 Asia/Calcutta",
		"Asia/Kathmandu" 				=> "GMT+05:45 Asia/Kathmandu",
		"Asia/Almaty" 					=> "GMT+06:00 Asia/Almaty",
		"Asia/Colombo" 					=> "GMT+05:30 Asia/Colombo",
		"Asia/Novosibirsk" 				=> "GMT+06:00 Asia/Novosibirsk",
		"Asia/Rangoon" 					=> "GMT+06:30 Asia/Rangoon",
		"Asia/Bangkok" 					=> "GMT+07:00 Asia/Bangkok",
		"Asia/Krasnoyarsk" 				=> "GMT+07:00 Asia/Krasnoyarsk",
		"Asia/Hong_Kong" 				=> "GMT+08:00 Asia/Hong_Kong",
		"Australia/Perth" 				=> "GMT+08:00 Australia/Perth",
		"Asia/Singapore" 				=> "GMT+08:00 Asia/Singapore",
		"Asia/Taipei" 					=> "GMT+08:00 Asia/Taipei",
		"Asia/Irkutsk" 					=> "GMT+08:00 Asia/Irkutsk",
		"Asia/Tokyo" 					=> "GMT+09:00 Asia/Tokyo",
		"Asia/Seoul" 					=> "GMT+09:00 Asia/Seoul",
		"Asia/Yakutsk" 					=> "GMT+09:00 Asia/Yakutsk",
		"Australia/Adelaide" 			=> "GMT+09:30 Australia/Adelaide",
		"Australia/Darwin" 				=> "GMT+09:30 Australia/Darwin",
		"Australia/Canberra" 			=> "GMT+10:00 Australia/Canberra",
		"Australia/Brisbane" 			=> "GMT+10:00 Australia/Brisbane",
		"Pacific/Guam" 					=> "GMT+10:00 Pacific/Guam",
		"Australia/Hobart" 				=> "GMT+10:00 Australia/Hobart",
		"Asia/Vladivostok" 				=> "GMT+10:00 Asia/Vladivostok",
		"Asia/Magadan" 					=> "GMT+11:00 Asia/Magadan",
		"Pacific/Fiji" 					=> "GMT+12:00 Pacific/Fiji",
		"Pacific/Auckland" 				=> "GMT+12:00 Pacific/Auckland",
		"Pacific/Tongatapu" 			=> "GMT+13:00 Pacific/Tongatapu");

	return $eFront2vLabTimezones;
}

/*
 * Returning an vLab timezone equivalent of the indicated eFront timezone
 */
function eFront2vLabTimezone($eFrontTimezone) {
	
	$eFront2vLabTimezones = geteFront2vLabTimezones();
	
	return $eFront2vLabTimezones[$eFrontTimezone];
	
}

?>