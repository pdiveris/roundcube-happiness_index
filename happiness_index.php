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
    private $happiness_index_var;

    /**
     * Plugin initialization
     */
    public function init()
    {
        $this->add_hook('message_before_send', [$this, 'message_headers']);
    }

    /**
     * 'message_before_send' hook handler
     *
     * @param array $args Hook arguments
     *
     * @return array Modified hook arguments
     */
    public function message_headers($args)
    {
        $this->load_config();
        $this->happiness_index_var = rcube::get_instance()->config->get('happiness_index_var', '');

        $rcube = rcube::get_instance();


        $this->include_stylesheet($this->local_skin_path() . '/cloud_button.css');
        $this->add_texts('localization/');

        $this->add_button(array(
            'type'       => 'link',
            'label'      => 'happiness_index.happiness',
            'href'       => $this->happiness_index_var,
            'target'     => '_blank',
            'class'      => 'happiness_index',
            'classsel'   => 'happiness_index button-selected',
            'innerclass' => 'button-inner'
        ), 'taskbar');

        // additional email headers
        $additional_headers = [
            'User-Agent' => 'My-Very-Own-Webmail'
        ];

        $args['message']->headers($additional_headers, true);

        return $args;
    }
}