<?php
/**
 * Example Action Plugin: Inserts a newline button into the toolbar
 *
 * @author Xarkam <xarkam@gmail.com>
 */

if (!defined('DOKU_INC')) die();

class action_plugin_newline extends DokuWiki_Action_Plugin {

    /**
     * Register the eventhandlers
     */
    public function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', array ());
    }

    /**
     * Inserts the toolbar button
     */
    public function insert_button(Doku_Event $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('qb_newlinebutton'),
            'icon' => '../../plugins/newline/newline.png',
            'open' => '\\\\ ',
            'close' => '',
        );
    }

}
