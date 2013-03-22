<?php

/**
 * Description of forum
 *
 * @author timat
 */
class Forum {
    public static $instance = NULL;
    private $cookie;
    public function __construct() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        $this->cookie = new Cookie();
        self::$instance = $this;
        return self::$instance;
    }
    
    public function getInstance() {
        if(isset(self::$instance)){
            return self::$instance;
        }
        self::$instance = $this; 
        return self::$instance;
    }
    
    public function createForum($key = ""){
        $forum = $this->cookie->getCookieVal("forum");
        if(!isset($forum[$key]) && $key != ""){
            $forum[$key] = array();
            $this->cookie->setCookieAttr("forum",$forum);
        }
    }
    public function getForum($key = ""){
        $forum = $this->cookie->getCookieVal("forum");
        if(isset($forum[$key])){
            return $forum[$key];
        }
        return $forum;        
    }
    public function getForumSubject($key = ""){
        $forum = $this->cookie->getCookieVal("forum");
        foreach($forum as $fo){
            if(isset($fo[$key])){
                return $fo[$key];
            }
        }
        return array();        
    }
    public function createForumSubjet($forumGen = "", $subject = "", $user = "", $comment = ""){
        $forum = $this->cookie->getCookieVal("forum");
        if(isset($forum[$forumGen]) && !isset($forum[$forumGen][$subject]) && $subject != ""){
            if($user == ""){
                $USER = new User();
                $user = $USER->getUsername();
            }
            $forum[$forumGen][$subject] = array($user => array("comment" => $comment,"nbReply" => 0,"reply" => array()) );
            $this->cookie->setCookieAttr("forum",$forum);
        }
    }
}

?>
