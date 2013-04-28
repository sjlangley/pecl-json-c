pecl-json-c
===========

JSON-C wrapper

Should be a drop-in alternative to PHP json extension.

json_encode is the same than current PHP one.

json_decode use the json-c library and is mostly compatible.
- integer are always parse as integer (never float or string)
- comments are allowed in json string/files

Also provide a new incremental parser object:

	$parser = new JsonIncrementalParser();
	$fic = fopen("somefile.json", "r");
	do {
		$buf = fgets($fic);
		$ret=$parser->parse($buf);
	} while ($buf && ($ret==JsonIncrementalParser::JSON_PARSER_CONTINUE));
	$result = $parser->get();
or
	$result = $parser->parseFile("somefile.json");


Work in progress.
