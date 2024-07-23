## Happiness Index Plugin for Roundcube Webmail

### Features

* Integrates into contextmenu plugin when available
* Works for skins *classic*, *larry* and *elastic* (highest priority for *elastic*)
* currently available translations:
    * English
    * French (Français)
    * Greek (ελληνικά)
* [screenshot](http:/pdiveris.github.io/roundcube-happiness_index/)

### INSTALL

#### manual:

1. unpack to plugins directory
1. add `, 'happiness_index'` to `$config['plugins']` in roundcubes `config/config.inc.php`
1. rename `config.inc.php.dist` to `config.inc.php`
1. if you run a custom skin, e.g. `silver` then you should also symlink or copy the skins folder
   of the plugin to the corresponding skins name, for the example given:
   `ln -s plugins/happiness_index/skins/larry plugins/happiness_index/skins/silver`

#### composer:

1. go to your roundcube root dir, setup `composer.json` and run `composer require weird-birds/thunderbird_labels`

### CONFIGURE

See `config.inc.php` for more details

### Author
Petros Diveris
<https://github.com/pdiveris/roundcube-happiness_index>

### History
This plugin is based on Michael Kefeder's Thundebird Labels plugin.

