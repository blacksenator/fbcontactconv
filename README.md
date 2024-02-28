# Converter of FRITZ!Box contacts into IP phone phonebooks

Purpose of the software is the converting of contact data from AVM FRITZ!Box phonebook (XML) into XML phonebook formats of various IP phone devices.

This is a spin-off from [carddav2fb](https://github.com/blacksenator/carddav2fb)! You will also find this functionality there as the final part of a comprehensive program for loading CardDAV data (vCards) into the FRITZ!Box as phonebook.

## Features

* The conversion takes place with **XSL transformation**. The XML of the FRITZ! Box is converted into the XML target format on the basis of the respective XSL file
* If necessary or possible, the name chain is divided into first name and surname. The prerequisite is the assumption that a comma with a space separates matrix of `[last name], [first name]`. If no ", " is found in the string, the name chain is used as the organization or surname (depending on the target format)
* specify an entry in `ipPhonebooks` if the phone book is to be stored in your desired format (XML). There are currently five transformation templates stored in the `/lib/` directory:
  * Cisco
  * Grandstream
  * jFritz (not a phone but similar XML structure)
  * snom
  * Yealink (two different xsl transformations)

## Requirements

* PHP >7.3 or 8.0 (incl. gd, soap, xsl)
* Composer (follow the installation guide at <https://getcomposer.org/download/>)

## Installation

Install fbcontactconv:

```console
git clone https://github.com/blacksenator/fbcontactconv.git
cd fbcontactconv
composer install --no-dev
```

Install composer (see <https://getcomposer.org/download/> for newer instructions):

```console
composer install --no-dev --no-suggest
```

Edit `config.example.php` and save as `config.php` or use an other name of your choice (but than keep in mind to use the -c option to define your renamed file)

## Usage

### List all commands

```console
./fbcontactconv list
```

### Complete processing

```console
./fbcontactconv run
```

### Get help for a command

```console
./fbcontactconv run -h
```

### Export phonebooks

You can transform FRITZ!Box phonebook into different XML formats:

* Cisco
* Grandstream
* jFritz
* snom
* Yealink

The transformation takes place using XSL files. You can adapt the existing files or add more of your own.

You need to activate XSL module

```console
extension=xsl
```

## License

This script is released under Public Domain, some parts under GNU AGPL or MIT license. Make sure you understand which parts are which.

## Authors

Copyright© 2021 Volker Püschel
