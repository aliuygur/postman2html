postman2html
============

Generating html file from a [postman](http://www.getpostman.com/) collection file. it is useful for API documentation.


## Installation
This library is available via [Composer](https://getcomposer.org/)

```bash
composer global require "alioygur/postman2html=~1.0"
```

## Usage

### Simple example of usage

```bash
postman2html render location-of-postman-collection-file.json
```

### Custom output file location and name, instead of default

```bash
postman2html render location-of-postman-collection-file.json path/to/apidoc.html
```

### Help

```bash
postman2html help render
```

**Output of `postman2html help render` command**
 
```bash
Usage:
 render inputfile [outputfile]

Arguments:
 inputfile             input file
 outputfile            output file (default: "output.html")

Options:
 --help (-h)           Display this help message.
 --quiet (-q)          Do not output any message.
 --verbose (-v|vv|vvv) Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug.
 --version (-V)        Display this application version.
 --ansi                Force ANSI output.
 --no-ansi             Disable ANSI output.
 --no-interaction (-n) Do not ask any interactive question.
```
