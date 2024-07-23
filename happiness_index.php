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

        $this->include_stylesheet($this->local_skin_path() . '/happiness_index.css');

        $this->add_texts('localization', true);
        $this->add_button(
            [
                'type'     => 'link',
                'label'    => 'test',
                'command'  => 'plugin.archive',
                'class'    => 'button buttonPas archive disabled',
                'classact' => 'button archive',
                'width'    => 32,
                'height'   => 32,
                'title'    => 'buttontitle',
                'domain'   => $this->ID,
                'innerclass' => 'inner',
            ],
            'toolbar');


        /*
            add_button() has 2 params the first is an array of properties for the rcmail_output_html::button() function
            and the second is the name of the container to put the button in.

            supported 'types in the first param are: image, link, input (depreciated), and button (default).
            You also need a 'command' key and then whatever HTML attributes you want the element to have; id, class etc.          *
         */


        $this->add_button(array(
            'type'       => 'button',
            'label'      => 'happiness_index.happiness',
            'href'       => $this->happiness_index_var,
            'target'     => '_blank',
            'class'      => 'happiness_index',
            'classsel'   => 'happiness_index button-selected',
            'innerclass' => 'button-inner'
        ), 'toolbar');

        // additional email headers
        $additional_headers = [
            'User-Agent' => 'My-Very-Own-Webmail'
        ];

        $args['message']->headers($additional_headers, true);

        return $args;
    }
}