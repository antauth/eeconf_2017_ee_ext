<?php
namespace RS;

class Comment_notifier_ext {

    var $name     = 'Comment Notifier';
    var $version  = '1.0';
    var $description = 'Notify secondary server of comment post';
    var $settings_exist = 'y';
    var $docs_url = '';

    var $settings = array();

    /**
     * Constructor
     *
     * @param mixed settings array or empty string
     */
    function __construct($settings='')
    {
	$this->settings = $settings;
    }

    /**
     * Activate Extension
     *
     * This function enters the extension into the exp_extensions table
     *
     * @return void
     */
    function activate_extension()
    {

        $this->settings = array();

        $data = array(
            'class'    => __CLASS__,
            'method'   => 'send_comment',
            'hook'     => 'comment_sent_end',
            'settings' => serialize($this->settings),
            'priority' => 1,
            'version'  => $this->version,
            'enabled'  => 'y'
        );

        ee()->db->insert('extensions', $data);
    }

    /**
     * Update Extension
     *
     * Performs any necessary db updates when extension page visited
     *
     * @return    mixed    void on update / false if none
     */
    function update_extension($current = '')
    {
  
        if ($current == '' OR $current == $this->version)
        {

            return FALSE;
        }

        if ($current < '1.0')
        {

            // Update to version 1.0
        }

        ee()->db->where('class', __CLASS__);
        ee()->db->update(
                    'extensions',
                    array('version' => $this->version)
        );
    }

    // ----------------------
	// Settings
	// ----------------------

	function settings()
	{

		$settings = array();

		// server url text input with default value
        $settings['server_url']		= array('i', '', "http://localhost:8186");
		
		// key that accompanies requests to server with default value
		$settings['key']		= array('i', '', "7wYbQWyo3KNb7eb");

		return $settings;

	}
}

// END CLASS

