<?php

defined('SYSPATH') or die('No direct script access.');


// Basecamp.phpm, v 1.0 2008/05/03 7:33

/**
 * @file
 * Interacts with the Basecamp API
 *
 * Utilize this class in your custom applications to connect with Basecamp
 * More information can be found at: http://developer.37signals.com/basecamp/index.shtml
 * I have not yet tested this with https, if you do please let me know.
 *
 * CREDITS
 * Developer: Aaron Klump
 * Website: http://www.InTheLoftStudios.com
 * Blog: http://blog.InTheLoftStudios.com
 * Email: aaron@intheloftstudios.com
 */


class Basecamp_Core {

/*
##########################################################################################
##	PROPERTIES
##########################################################################################*/

private $attachmentIds=array();
private $authorId;
private $basecampUrl;
private $categoryId;
private $isHttps;
private $toDoListId;
private $notificationIds=array();
private $password;
private $postId;
private $projectId;
private $reply;
private $requestUrl;
private $responsiblePersonId;
private $sendXml;
private $username;
private $config;

/*
##########################################################################################
##	METHODS
##########################################################################################*/

/**
 * Instantiate the class and setup connection parameters.
 *
 * @param $BasecampUrl
 *   Your Basecamp Url. Should begin with http or https
 * @param $username
 *   Your Basecamp username.
 * @param $password
 *   Your Basecamp password.
 */
public function __construct($username = null,$password = null,$basecampUserId = null, $BasecampUrl = null){
	
  $config = Kohana::config_load('basecamp');
  
  $this->config = $config;
  $BasecampUrl = $config['basecamp.url'];	
  
  $this->setBasecampUrl($BasecampUrl);
  $this->setUsername($username);
  $this->setPassword($password);
  $this->setAuthorId($basecampUserId);
  
  $this->setCategoryId($config['basecamp.categoryID']);
  $this->setProjectId($config['basecamp.projectID']);
  
}

/**
 * Add a notification (person) id to send with all Basecamp requests.
 *
 * To clear the array use $this->setNotifcationIds()
 *
 * @param $notificationId
 *   The Basecamp person id you want notified after the request.
 * @return
 *   1 successfully added this person to the list
 *  -1 invalid format of $notificationId
 */
public function addNotificationId($notificationId){
  if(!preg_match('/[0-9]+/',$notificationId)){
    return -1;
  }
  $this->notificationIds[]=$notificationId;
  return 1;
  
}

/**
 * Upload a file and attach to next event, if attachments allowed.
 *
 * This works for messages and comments
 *
 * @param $path
 *   This is the absolute file path on to the file.
 * @return
 *   string Success; the id assigned by Basecamp
 *  -1 The file does not exist
 *  -2 A name was not given
 *  -3 No mime type was indicated
 *  -4 Basecamp did not return a file id
 */
public function attachFile($path,$name,$mime){
  if(!file_exists($path)){
    return -1;
  }
  
  if(!$name){
    return -2;  
  }
  
  if(!$mime){
    return -3;  
  }

  $stream=file_get_contents($path);

  //set the request Url for attaching a file
  $this->setRequestUrl($this->getBasecampUrl().'/upload');

  error_reporting(E_ALL);

  $session = curl_init();
  curl_setopt($session, CURLOPT_URL,$this->getRequestUrl()); // url to post to 
  curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($session, CURLOPT_POST, 1); 
  curl_setopt($session, CURLOPT_POSTFIELDS, $stream); 
  curl_setopt($session, CURLOPT_HEADER, true);
  
  curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/xml', 'Content-Type: application/octet-stream', 'Content-Length: '.filesize($path)));
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($session, CURLOPT_USERPWD,$this->getUsername().":".$this->getPassword());
  
  // tell cURL to graciously accept an SSL certificate if presented
  if($this->getIsHttps()){
    curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);
  }
  
  $this->setReply(curl_exec($session));
  curl_close($session);
  
  preg_match('/\<upload\>\<id\>([0-9A-Za-z.]+)\<\/id\>\<\/upload\>/',$this->getReply(),$found);
  if(!$found[1]){
    return -4;
  }
  
  $attachment=array(
    'name' => $name,
    'basename' => substr($path,strrpos($path,'/')+1),
    'mime' => $mime,
    'id' => $found[1],
  );
  $this->attachmentIds[]=$attachment;
  
  //return the fileId
  return $found[1];
}

/**
 * Create a new comment on existing message in Basecamp account.
 *
 * Will not work unless $this->postId is set, see $this->setPostId()
 *
 * @param $body
 *   (Str) The body of the comment item.
 * @return
 *   int Successful; the Basecamp comment Id
 *  -5 Post Id is undefined.
 *  -6 No Comment Id was returned from Basecamp
 */
public function createComment($body){

  if(!$this->getPostId()){
    return -5;
  }
  
  $xml = <<<EOD
  <comment>
    <post-id>{$this->getPostId()}</post-id>
    <body>{$body}</body>
  </comment>

EOD;
  
  //set the request Url for creating a message
  $this->setRequestUrl($this->getBasecampUrl().'/msg/create_comment');
  
  //send to Basecamp
  $this->sendRequest($xml);
  
  return $this->getReturnId();
}

/**
 * Create a new message in Basecamp account.
 *
 * Will not work unless $this->projectId is set, see $this->setProjectId()
 *
 * @param $title
 *   (Str) The title of the message.
 * @param $body
 *   (Str) The body of the message. (Essentially the message summary)
 * @param $milestoneId
 *   (Int, optional) If this message relates to a milestone, the Basecamp milestoneId
 * @param $extendedBody
 *   (Str) The extended body of the message; this is only shown in list view when the user clicks on "Continued..."
 * @param $isPrivate
 *   (Int, optional) 1 if this is a private message, 0 if not.
 * @param $useTextile
 *   (Int, optional) Use textile 1=true, 0=false: Textile is the shorthand html syntax, more info can be found at
 *   Basecamps writeboard area.
 * @return
 *   int Successful; the Basecamp post Id
 *  -5 Project Id is undefined.
 *  -6 No Post Id was returned from Basecamp
 */
public function createMessage($title, $body, $milestoneId='', $extendedBody='', $isPrivate=false, $useTextile=false){

  if(!$this->getProjectId()){
    return -5;
  }
    
  $xml = <<<EOD
  <post>
    <author-id type="integer">{$this->getAuthorId()}</author-id>
    <body>$body</body>
    <category-id type="integer">{$this->getCategoryId()}</category-id>
    <extended-body nil="true">$extendedBody</extended-body>  
    <milestone-id type="integer">$milestoneId</milestone-id>
    <private type="boolean">$isPrivate</private>
    <project-id type="integer">{$this->getProjectId()}</project-id>
    <title>$title</title>  
    <use-textile type="boolean">$useTextile</use-textile>
  </post>

EOD;

echo $xml;
  
  //set the request Url for creating a message
  $this->setRequestUrl($this->getBasecampUrl().'/projects/'.$this->getProjectId().'/msg/create');
  
  //send to Basecamp
  $this->sendRequest($xml);
  $this->setPostId($this->getReturnId());
  return $this->getPostId();

}

/**
 * Create a new todo in Basecamp account.
 *
 * Will not work unless $this->toDoListId is set, see $this->setToDoListId()
 *
 * @param $content
 *   (Str) The content of the todo item.
 * @return
 *   string Basecamp reply
 *  -5 List Id is undefined.
 */
public function createToDo($content){

  if(!$this->getToDoListId()){
    return -5;
  }
  
  $xml = <<<EOD
    <content>{$content}</content>
    <responsible-party>{$this->getResponsiblePersonId()}</responsible-party>

EOD;
  
  //set the request Url for creating a message
  $this->setRequestUrl($this->getBasecampUrl().'/todos/create_item/'.$this->getToDoListId());
  
  //send to Basecamp
  $this->sendRequest($xml);
  
  return $this->getReturnId();
}

public function getAttachmentIds(){
  return $this->attachmentIds;
}

public function getAttachmentXml(){
  
  $xml='';
  foreach($this->getAttachmentIds() as $attachment){
    $xml.=<<<EOD
  <attachments>
    <name>{$attachment['name']}</name>
    <file>
      <file>{$attachment['id']}</file>
      <content-type>{$attachment['mime']}</content-type>
      <original-filename>{$attachment['basename']}</original-filename>
    </file>
  </attachments>
    
EOD;
  }
  
  return $xml;
}

public function getAuthorId(){
  return $this->authorId;
}

public function getBasecampUrl(){
  return $this->basecampUrl;
}

public function getCategoryId(){
  return $this->categoryId;
}

public function getIsHttps(){
  return $this->isHttps;
}

public function getToDoListId(){
  return $this->toDoListId;
}

public function getNotificationIds(){
  return $this->notificationIds;
}

public function getNotifyXml(){
  $xml='';
  if(!$ids=$this->getNotificationIds()){
    return false;
  }
  
  foreach($ids as $id){
    $xml.="  <notify>$id</notify>\n";
  }
  return rtrim($xml);
}

public function getPassword(){
  return $this->password;
}

public function getPostId(){
  return $this->postId;
}

public function getProjectId(){
  return $this->projectId;
}

public function getRequestUrl(){
  return $this->requestUrl;
}

public function getReply(){
  return $this->reply;
}

public function getResponsiblePersonId(){
  return $this->responsiblePersonId;
}

/**
 * Pull the id of the last record created from return xml from Basecamp
 *
 * @return
 *   int Successful; the Basecamp Id
 *  -1 Can't find an id in xml
 */
public function getReturnId(){
  preg_match('/\<id ([a-z="]+)\>([0-9]+)\<\/id>/',$this->getReply(),$found);
  if(!isset($found[2])){
  
    //no id
    return -1;
  }
  return $found[2];
}

public function getSendXml(){
  return $this->sendXml;
}

public function getUsername(){
  return $this->username;
}

/**
 * Send request to Basecamp.
 *
 * @return
 *   This will be an xml string, see http://developer.37signals.com/Basecamp/index.shtml
 */
public function sendRequest($xml){
  
  //wrap with <request>
  $xml="<request>\n$xml\n";
  
  //this is for all notifications
  $xml.=$this->getNotifyXml();
  
  //this is for attachments
  if($this->getAttachmentIds()){
    $xml.=$this->getAttachmentXml();
  }
  
  $xml.="</request>\n";
  
  $this->setSendXml($xml);

  error_reporting(E_ALL);
  
  $session = curl_init();
  curl_setopt($session, CURLOPT_URL,$this->getRequestUrl()); // url to post to 
  curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($session, CURLOPT_POST, 1); 
  curl_setopt($session, CURLOPT_POSTFIELDS, $this->getSendXml()); 
  curl_setopt($session, CURLOPT_HEADER, true);
  
  curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/xml', 'Content-Type: application/xml'));
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($session, CURLOPT_USERPWD,$this->getUsername().":".$this->getPassword());
  
  // tell cURL to graciously accept an SSL certificate if presented
  if($this->getIsHttps()){
    curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);
  }
  
  $this->setReply(curl_exec($session));
  curl_close($session);
  
  //remove attachments
  $this->setAttachmentIds();
}

public function setAttachmentIds($attachmentIds=array()){
  $this->attachmentIds=$attachmentIds;
  return $this->getAttachmentIds();
}

public function setAuthorId($authorId){
	
  if(!preg_match('/[0-9]+/',trim($authorId))){
    return -1;
  }
  
  $this->authorId=$authorId;
  return $this->getAuthorId();
}

/**
 * Check format and set Basecamp Url.
 *
 * @param $BasecampUrl
 *   Must begin with http:// or https://.
 * @return
 *   $BasecampUrl success
 *  -1 improper format
 */
public function setBasecampUrl($basecampUrl){

  //make sure this begins with http and find out if it's secure
  preg_match('/^(http)([s]?)/',$basecampUrl,$found);
  
  //check format
  if(!$found[1]){
    return -1;
  }

  //check if secure
  if($found[2]){
    $this->setIsHttps(1);
  }

  $this->basecampUrl=$basecampUrl;
  return $this->getBasecampUrl();
}

public function setCategoryId($categoryId){
  if(!preg_match('/[0-9]+/',$categoryId)){
    return -1;
  }
  $this->categoryId=$categoryId;
  return $this->getCategoryId();
}

public function setIsHttps($isHttps){
  $this->isHttps=$isHttps;
  return $this->getIsHttps();
}

public function setToDoListId($toDoListId){
  if(!preg_match('/[0-9]+/',$toDoListId)){
    return -1;
  }
  $this->toDoListId=$toDoListId;
  return $this->getToDoListId();
}

public function setNotificationIds($notificationIds=array()){
  $this->notificationIds=$notificationIds;
  return $this->getNotificationIds();
}

public function setPassword($password){
  $this->password=$password;
  return $this->getPassword();
}

public function setPostId($postId){
  if(!preg_match('/[0-9]+/',$postId)){
    return -1;
  }
  $this->postId=$postId;
  return $this->getPostId();
}

public function setProjectId($projectId){
  if(!preg_match('/[0-9]+/',$projectId)){
    return -1;
  }
  
  $this->projectId=$projectId;
  return $this->getProjectId();
}

public function setReply($reply){
  $this->reply=$reply;
  return $this->getReply();
}

public function setResponsiblePersonId($responsiblePersonId){
  if(!preg_match('/[0-9]+/',$responsiblePersonId)){
    return -1;
  }
  $this->responsiblePersonId=$responsiblePersonId;
  return $this->getResponsiblePersonId();
}

public function setSendXml($sendXml){
  $this->sendXml=$sendXml;
  return $this->getSendXml();
}

public function setRequestUrl($requestUrl){
  $this->requestUrl=$requestUrl;
  return $this->getRequestUrl();
}

public function setUsername($username){
  $this->username=$username;
  return $this->getUsername();
}

public function getRecentItems($all = TRUE){
  $url = $this->getBasecampUrl()."/projects/".$this->getProjectId()."/feed/recent_items_rss";	
  return cURL::secureXML($url,$this->getUsername(),$this->getPassword());
}

} //End Basecamp Class
