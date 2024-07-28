<?php
/**
* Happiness Index
*
* Add a happiness_index header value to the email based on a selection from a dropdown list
*
* @version 1.0
* @author Petros Diveris
* @url http://github.com/pdiveris/happiness_index
*/
class happiness_index extends rcube_plugin
{
    private $some_var = 'Just a placeholder';

    /**
     * Plugin initialization
     */
    public function init()
    {
        $this->load_config();

        $this->happiness_index = rcube::get_instance()->config->get('some_var', '');
        $this->register_action('plugin.setHappiness', array($this, 'setHappiness'));

        $this->include_stylesheet($this->local_skin_path() . '/happiness_index.css');
        $this->include_script('happiness_index.js');

        $this->add_texts('localization/');

        $this->add_button([
            'type'          => 'link',
            'label'         => 'happiness_index.happiness',
            'href'          => 'javascript: getAndSetHappiness();',
            'class'         => 'button-happiness',
            'classsel'      => 'button-happiness button-selected',
            'innerclass'    => 'button-inner',

            'aria-haspopup' => true,
            'aria-expanded' => false,
            'aria-owns'     => 'happiness_index',
        ], 'toolbar');

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
            'Happiness-Index' => $_SESSION['happiness_index']
        ];

        $args['message']->headers($additional_headers, true);
    }

    /**
     * @return void
     */
    public function setHappiness() {
        $happiness = (int)trim(rcube_utils::get_input_value('_happiness', rcube_utils::INPUT_GPC));

        if ($happiness < 1) {
            $happiness = 1;
        }

        $_SESSION['happiness_index'] = $happiness;
    }
}