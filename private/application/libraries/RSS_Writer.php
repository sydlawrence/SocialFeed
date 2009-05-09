<?php defined('SYSPATH') or die('No direct script access.');

class RSS_Writer {
    /*****************************************************************
     *  This class aims to be a VERY simple RSS feed generator.
     *  (Simple is in the eye of the beholder, though). It generates only
     * The MOST BASIC POSSIBLE RSS2.0 feed.  The minimum posssible required
     * to remain both RSS2.0 compliant and be actually usable.
     * Author:  Jeff Silverman
     * Date:    28-OCT-2005
     * Version: 0.1
     * Copyright © 2005, The Johns Hopkins University, All rights reserved.
     *
     *  To create RSS output, the following steps must be taken:
     *  1) Get data together into a properly formatted array
     *     Example:
     *     $channel=array("title"=>"Channel Title"
     *                     , "description"=>"Channel description"
     *                     , "link"=>"http://a.b.com/Chanel_link.html"
     *                     "items" = array(
     *                         array(
     *                             "title" => "Blah blah"
     *                             , "description" => "Full text of the article..."
     ********* NOT YET IMPLEMENTED ********
     *                             , "item_is_complete" => 1
     ********* NOT YET IMPLEMENTED ********
     *                         )
     *                         , array(title, description, etc.)
     *                         , array(title, description, etc.)
     *                   );
     *
     *  2) Create class instance.
     *        a) Pass in array of "channel" data at instantiation
     *        OR
     *        b) create empty class instance and initialize channel
     *           data using the initialize_channel() function
     * 
     * 
     *  example:
     *  $feed = new SimpleRSSFeedCreator();
     * 
     *  3) Output feed using get_feed() function
     * 
     *  Example:
     *  echo $feed->get_feed();
     * 
     *  The hard part, then, is getting all the data together and creating
     *  channel.  The only *required* bits are:
     *      * title
     *      * link
     *      * description
     *      * at least one "item"
     *  Each "item" requires one of either the title or description.
     ********* NOT YET IMPLEMENTED ********
     *  If the description is the entire content of the item, use the
     *  "item_is_complete" flag to indicate so for that item. Include
     *  the flag in the array for that item or set the value to true later.
     *****************************************************************/

    var $required_headers;
    var $no_required;
    var $channel;

    function __construct( $channel_data = array() ) {
        $this->required_headers = array(
            "title"
            , "link"
            , "description"
        );
        $this->no_required = count($this->required_headers);
        if ( count($channel_data) > 0 ) $this->initialize_channel($channel_data);
    }

    function initialize_channel( $channel_data ){
        $channel_meta = array_keys($channel_data);
        $x = 0;
        $missing = "";
        foreach ( $channel_meta as $header ){
            if ( in_array( $header, $this->required_headers ) ){
                $x++;
            } else {
                $missing .= "'$header' ";
            }
        }
        if ( ! $x == $this->no_required ){
            exit("Missing required headers $missing when initializing this channel.");
        }
        $this->channel = $channel_data;
    }

    function add_item( $item ){
       // Adds an item to the feed.
       // Requires an array with "title" "link" and/or "description" values
    }

    function get_feed(){
        // Outputs the feed in XML
        $header = "<?xml version=\"1.0\"?>\n";
        $header .= "<rss version=\"2.0\">\n";
        $header .= "  <channel>\n";

        $footer = "  </channel>\n";
        $footer .= "</rss>\n";

        $body = "";
        foreach ( $this->channel as $element => $value ){
            if ( $element == 'items' ){
                foreach ( $value as $item_value  ){
                $body .= "    <item>\n";
                    foreach ( $item_value as $subelement => $subelement_value ){
                        $body .= "      <" . $subelement . ">" . htmlspecialchars($subelement_value, ENT_QUOTES) . "</" . $subelement . ">\n";
                    }
                $body .= "    </item>\n";
                }
            } else {
                $body .= "    <" . $element . ">" . htmlspecialchars($value, ENT_QUOTES) . "</" . $element . ">\n";
            }
        }
        return $header . $body . $footer;
    }
    function item_is_complete(){
     /******** NOT YET IMPLEMENTED ********
     *  ( NOTE: the title passed in to the function item_is_complete() must EXACTLY
     *  match the title of the item you wish to update. )
     */
        return false;
    }

}