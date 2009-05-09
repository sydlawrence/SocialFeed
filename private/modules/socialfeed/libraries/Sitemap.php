<?php
class Sitemap_Core{

        protected $sitemap;
       
        protected $urlset;
       
        protected $schema_file='http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd';
       
        protected $changefreq = array('always','hourly','daily','weekly','monthly','yearly','never');
       
        public $location;
       
        public $cache_name='sitemap_cache';
       
        public $cache;
        /**
         * Constructs the Sitemap controller
         *
         */
        public function __construct()
        {
                //Create sitemap
                $this->create();
                $this->location=url::base().'sitemap.xml';
        }

        /**
         * Render sitemap, sends xml header
         */
        public function render($cache = FALSE,$ttl=86400)
        {
                //XML header
                $this->send_header();
               
                $cache AND $this->cache($ttl);
               
                return $this->get();
        }
        /*
         * Cache current sitemap
         */
        public function cache($ttl=86400)
        {
                Cache::instance()->set($this->cache_name,$this->get(), NULL, $ttl);
                return $this;
        }
        /*
         * Render from cache or return false;
         */
        public function cache_render(){

                if(($sitemap_cache=Cache::instance()->get($this->cache_name)) != NULL)
                {
                        $this->send_header();
                                echo $sitemap_cache;
                        return true;
                }
                else
                {
                        return false;
                }
        }
        /*
         * Invalidate cache
         */
        public function invalidate_cache()
        {
                Cache::instance()->delete($this->cache_name);
        }
        /**
         * Get the xml sitemap
         * @return      string
         */
        public function get()
        {
                return $this->sitemap->saveXML();
        }
        /**
         * Save sitemap to the location
         * @param       string  file location
         */
        public function save($location)
        {
                $this->sitemap->save($location);
        }
        /**
         * Send the xml header
         */
        public function send_header()
        {
                header('Content-type: text/xml; charset=UTF-8');
        }
        /**
         * Creates beginning of sitemap without urls
         * @return      void
         */
        protected function create()
        {
                //Create sitemap
                $sitemap= new DOMDocument;
                $sitemap->formatOutput = true;
                $sitemap->encoding='UTF-8';
       
                //Create <urlset>
                $this->urlset=$sitemap->createElement('urlset');

                $this->urlset->setAttribute('xmlns:xsi','http://www.w3.org/2001/XMLSchema-instance');
                $this->urlset->setAttribute('xsi:schemaLocation','http://www.sitemaps.org/schemas/sitemap/0.9');
//              $this->urlset->setAttribute('url',$this->schema_file);
                $this->urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
               
                //Append <urlset> to document
                $sitemap->appendChild($this->urlset);          
               
                $this->sitemap=$sitemap;
        }
        /**
         * Add url to sitemap
         * @param       string  url
         * @param       string  last time of modification format in YYYY-MM-DD
         * @param       string  change frequency always|hourly|daily|weekly|monthly|yearly|never
         * @return      object
         *
         */
        public function add_url($location,$lastmod=NULL,$changefreq=NULL,$priority=NULL)
        {
                $sitemap=$this->sitemap;
       
                if(!valid::url($location))
                        throw new Kohana_Exception('sitemap.url_wrong_type', $location);
               
                if($this->url_exists($location)==true)
                        return false;
                       
                $url=$this->sitemap->createElement("url");
                $loc=$this->sitemap->createElement("loc",$location);
                $url->appendChild($loc);
               
               
                //Last modification is optional
                if($lastmod != NULL)
                {              
                        $lastmod=$this->sitemap->createElement("lastmod",$lastmod);
                        $url->appendChild($lastmod);
                }
                //Change frequency is optional
                if($changefreq != NULL)
                {              
                        if(!in_array($changefreq,$this->changefreq)) {
                        	
                        	throw new Kohana_Exception('sitemap.unknown_change_frequency', $changefreq);
                        
                        }
                        $changefreq=$this->sitemap->createElement("changefreq",$changefreq);
                        $url->appendChild($changefreq);
                }
                //Priority is optional
                if($priority != NULL)
                {
                        if(!($priority >= 0 AND $priority <= 1))
                                throw new Kohana_Exception('sitemap.priority_out_of_range', $priority);        
                                                               
                        $priority=$this->sitemap->createElement("priority",$priority);
                        $url->appendChild($priority);          
                }
                       
                $this->urlset->appendChild($url);
                return $this;
        }
        /**
         * Add modelname, orm model of that name will
         * be used to find records and add each record to sitemap
         * calls get_url() on each record and checks for a 'modified' field,
         * orm::$modified is expected to be unix timestamp
         * @param       mixed   name of orm model
         * @param       mixed   conditions of query, will be applied to models if array is supplied
         * @param   string      priority 0-1
         * @returns object
         */
        public function add_model($model_names,$where = NULL, $priority= NULL)
        {
                $model_names=(array) $model_names;
               
                foreach($model_names as $model_name)
                {
                        $entries=ORM::factory($model_name);
                       
                        ($where != NULL) and $entries->where($where);
                         
                        $entries=$entries->find_all();
                       
                        foreach($entries as $entry)
                        {
                                //if a column 'modified' exists
                                $lastmod=($entry->modified != NULL) ? date("Y-m-d",$entry->modified) : NULL;
                               
                                //Create <url>
                                $this->add_url(url::base().$entry->get_url(),$lastmod,null,$priority);
                        }                      
                }              
                return $this;
        }      
        /**
         * Test whether url already exists
         */
        protected function url_exists($url){


                $xpath=new DOMXPath($this->sitemap);
                $query='/urlset/url[loc="'.$url.'"]';
               
                return ($xpath->query($query)->length > 0);
        }
        /*
         * Ping sitemaps provider
         * @param       array  
         */
        public function ping_google(array $options=array())
        {
                $url='www.google.com';

                if($request=@fsockopen($url,80))
                {
                        $http = 'GET /webmasters/sitemaps/ping?sitemap=' .
                        urlencode($this->location).
                                         " HTTP/1.1\r\n".
                                         'Host:'.$url."\r\n".
                                         "Connection: Close\r\n\r\n";
                       
                        fwrite($request,$http);
                        $response= fgets($request, 128);
                        fclose($request);

                        return (trim($response)=='HTTP/1.1 200 OK');            
                }
                return false;

        }

}

