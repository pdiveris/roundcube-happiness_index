<?php
/**
* Fancy Emoticons
*
* Sample plugin to replace emoticons in plain text message body with real icons
*
* @version 1.0
* @author Thomas Bruederli
* @url http://roundcube.net/plugins/fancy_emoticons
*/
class fancy_emoticons extends rcube_plugin
{
    public $task = 'mail';
    private $map;

    function init()
    {
        $this->add_hook('message_part_after', array($this, 'replace'));

        $this->map = array(
            ':)'  => html::img(array('src' => $this->urlbase.'media/smile.gif', 'alt' => ':)')),
            ':-)' => html::img(array('src' => $this->urlbase.'media/smile.gif', 'alt' => ':-)')),
            ':('  => html::img(array('src' => $this->urlbase.'media/cry.gif', 'alt' => ':(')),
            ':-(' => html::img(array('src' => $this->urlbase.'media/cry.gif', 'alt' => ':-(')),
        );
    }

    function replace($args)
    {
        if ($args['type'] == 'plain')
            return array('body' => strtr($args['body'], $this->map));

        return null;
    }
}