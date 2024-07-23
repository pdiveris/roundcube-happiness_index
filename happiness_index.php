<?php
/**
* Happiness Index
*
* Sample plugin add a happiness_index header value to the email based on a selection from a dropdown list
*
* @version 1.0
* @author Petros Diveris
* @url http://github.com/pdiveris/happiness_index
*/
class happiness_index extends rcube_plugin
{
    private $some_var;

    /**
     * Plugin initialization
     */
    public function init()
    {
        $this->load_config();
        $this->some_var = rcube::get_instance()->config->get('some_var', '');

        $this->include_stylesheet($this->local_skin_path() . '/happiness_index.css');
        $this->add_texts('localization/');

        $this->add_button(array(
            'type'       => 'link',
            'label'      => 'happiness_index.happiness',
            'href'       => $this->some_var,
            'target'     => '_blank',
            'class'      => 'button-cloud',
            'classsel'   => 'button-cloud button-selected',
            'innerclass' => 'button-inner'
        ), 'toolbar');

        $this->add_hook('message_before_send', [$this, 'message_headers']);
    }

    /**
     * @param $args
     * @return void
     */
    function message_headers($args)
    {
        // additional email headers
        $additional_headers = [
            'User-Agent' => 'My-Very-Own-Webmail'
        ];
    }
}