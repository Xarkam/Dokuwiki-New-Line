<?php
/**
 * Example Action Plugin: Inserts a newline button into the toolbar
 *
 * @author Xarkam <xarkam@gmail.com>
 */

if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');
require_once (DOKU_PLUGIN . 'action.php');

class action_plugin_newline extends DokuWiki_Action_Plugin {

    /**
     * return some info
    */
  function getInfo(){
    return array(
                 'author' => 'Xarkam',
                 'email'  => 'Xarkam@gmail.com',
                 'date'   => rtrim(io_readFile(DOKU_PLUGIN.'newline/VERSION.txt')),
                 'name'   => 'New Line (action plugin component)',
                 'desc'   => 'Insert a new line with \\\\',
                 'url'    => 'http://wiki.splitbrain.org/plugin:newline',
                 );
  }

    /**
     * Register the eventhandlers
     */
    function register(&$controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', array ());
    }

    /**
     * Inserts the toolbar button
     */
    function insert_button(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('qb_newlinebutton'),
            'icon' => '../../plugins/newline/newline.png',
            'open' => '\\\\ ',
            'close' => '',
        );
    }

}
