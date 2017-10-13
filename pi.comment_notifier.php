<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_notifier {
    public function __construct()
    {
    }
    public function get_server_url()
    {
        $ext = ee('Model')->get('Extension')->filter('class', 'Comment_notifier_ext')->first();
        return $ext->settings['server_url'];
    }
}
/* End of file pi.comment_notifier.php */
/* Location: ./system/user/addons/comment_notifier/pi.comment_notifier.php */