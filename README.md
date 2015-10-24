Transfer Commons
================

[![Build Status](https://travis-ci.org/transfer-framework/commons.svg)](https://travis-ci.org/transfer-framework/commons)

This repository provides a collection of components which can be used with Transfer. Part of these components, such as 
workers, can also be used without Transfer.

Installation
------------

Install the latest version with:

    $ composer require transfer/commons 

This requires [Composer](https://getcomposer.org/download/) to be installed globally in your system.

Listing
-------

### Doctrine

* [DbalAdapter](src/Transfer/Commons/Doctrine#dbaladapter)

### JSON

* [JsonStringToArrayTransformer](src/Transfer/Commons/Json#jsonstringtoarraytransformer)
* [ArrayToJsonStringTransformer](src/Transfer/Commons/Json#arraytojsonstringtransformer)

### Stream

* [StreamAdapter](src/Transfer/Commons/Stream#streamadapter)

### XML

* [StringToSimpleXmlTransformer](src/Transfer/Commons/Xml#stringtosimplexmltransformer)
* [SimpleXmlToStringTransformer](src/Transfer/Commons/Xml#simplexmltostringtransformer)

### Yaml

* [YamlToArrayTransformer](src/Transfer/Commons/Yaml#yamltoarraytransformer)
* [ArrayToYamlTransformer](src/Transfer/Commons/Yaml#arraytoyamltransformer)
