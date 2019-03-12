<?php

	function request_callback($response, $info)
	{
        $date = date("Y-m-d H:i:s");
        @$background = color("background", array("red","green","yellow","blue","magenta","cyan")[rand(0, 5)]);
        @$background2 = color("background", array("red","green","yellow","blue","magenta","cyan")[rand(0, 5)]);
        @$background3 = color("background", array("red","green","yellow","blue","magenta","cyan")[rand(0, 5)]);
        @$background4 = color("background", array("red","green","yellow","blue","magenta","cyan")[rand(0, 5)]);
        $json = json_decode($response);
		if(strpos($response, '"invalid_message":"Maaf, promosi dengan kode promo ini tidak tersedia. Mohon coba kembali."') or empty($json->voucher_info)){
            echo PHP_EOL."[".$background."EXTRAP SHOPII LA GAN\033[0m] [".$background2.$date."\033[0m] [".$background3."NEGBUT BOSS\033[0m] ~> ".$background4.$json->voucher_code."\033[0m : ".color("background", "red")."Die Pekokk\033[0m";
        }elseif(empty($response)){
            echo PHP_EOL."[".$background."EXTRAP SHOPII LA GAN\033[0m] [".$background2.$date."\033[0m] [".$background3."NEGBUT BOSS\033[0m] ~> ".$background4."\033[0m : ".color("background", "blue")."EMPTY!\033[0m";
        }else{
            echo PHP_EOL."[".$background."EXTRAP SHOPII LA GAN\033[0m] [".$background2.$date."\033[0m] [".$background3."NEGBUT BOSS\033[0m] ~> ".$background4.$json->voucher_info->voucher_code."\033[0m : ".color("background", "green")."Live Gan Degan\033[0m";
            simpan("voc_shopee.txt",$json->voucher_info->voucher_code."|".$json->description.PHP_EOL);
	    }
    }


$url = "https://shopee.co.id/api/v2/checkout/coupon";
$rc = new RollingCurl("request_callback");
$rc->window_size = 50; /*jgn diedit lagi dah cepet klo diedit yh bakal ad yg kelewat, recomended max 50 sih */

for($a = 1; $a <= 10000; $a++)
{	
	$code = "TRIFEB209".randStr("kapital_angka", "6");
	$postdata = '{"shoporders":[{"iteminfos":[{"donot_add_quantity":false,"free_return_day":7,"oldprice":839900000000,"is_wp_item":false,"checkout":true,"addin_time":1552380209,"item_group_id":null,"price":839900000000,"models":[],"quantity":1,"is_flash_sale":false,"name":"DJI Spark More Fly Combo & Spark Combo Garansi 1 Tahun","add_on_deal_id":null,"item_discount":0,"is_free_gift":false,"itemid":926958945,"welcome_package_type":0,"currency":"IDR","shopid":5649295,"bundle_deal_id":null,"catid":154,"status":1,"cb_option":0,"stock":10,"can_use_wholesale":false,"wholesale_tier_list":[],"mtime":1546327556,"tier_variations_formatted":[],"condition":1,"image":"28d32daba68db3ea6e0b0231955d20f5","attached_shop_info":{"vacation":null},"tier_variations":[],"is_add_on_sub_item":null,"add_on_deal_info":null}],"extrainfo":{},"shopid":5649295}],"promotion_data":{"voucher_code":"'.$code.'"}}';	
    $headers = array();
    $headers[] = 'content-length: '.strlen($postdata);
    $headers[] = 'content-type: application/json';
    $headers[] = 'cookie: _gcl_au=1.1.971595690.1552379591; csrftoken=tc2dJbs0p3S5IkKCWbgmYFSRFG5ptrqU; _fbp=fb.2.1552379593784.399519863; SPC_IA=-1; SPC_F=nSMX8t3dOYRYKQjjMc3u4nNLmdzMvkim; REC_T_ID=79587a92-44a1-11e9-8f4b-f8f21e1dbd00; SPC_SI=szrnhpoczcbu1m3axgpp658hjn8k1gs5; welcomePkgShown=true; bannerShown=true; AMP_TOKEN=%24NOT_FOUND; _ga=GA1.3.1417424225.1552379778; _gid=GA1.3.1168793063.1552379778; SPC_EC="i1DtfcaeHpu5+QkEhPvDFCtWswFkWmHbD6e6stqDkGbEBAOYV4DDCXsk/Q0ID37y+2qHxw5MOnP6tP9psSltoL73OFAu5yhQIn+pbQnSxxe7HETv/I2+moamyGQaL8crdNp7tkZJzT9Wu7jEXLU6OLTDLqM4sImfjnsTXOH7PvQ="; SPC_T_ID="sJma7dlZaCq33jJhjv44Ibi3OzzLXW85wNtQSbfqHD7PUsrPBm6aUurkq6F+pRPOjfmNvH6gFidbWD4yAqrPdX48+i+KWvEfnCliq51EwA4="; SPC_U=128328004; SPC_T_IV="K8X+rqJBOGhkAodtJVWeNg=="; SPC_SC_TK=3d4796100746bbb5351ab59c75756cee; SPC_SC_UD=128328004; _dc_gtm_UA-61904553-8=1';
    $headers[] = 'if-none-match-: 55b03-7e6bb597e2a4d10895ad00e5a4a68b2c';
    $headers[] = 'origin: https://shopee.co.id';
    $headers[] = 'referer: https://shopee.co.id/cart/';
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36';
    $headers[] = 'x-api-source: pc';
    $headers[] = 'x-csrftoken: tc2dJbs0p3S5IkKCWbgmYFSRFG5ptrqU';
    $headers[] = 'x-requested-with: XMLHttpRequest';
	$request = new RollingCurlRequest($url);
	$request->options = array(CURLOPT_HEADER => false, CURLOPT_HTTPHEADER => $headers, CURLOPT_POSTFIELDS => $postdata, CURLOPT_COOKIEFILE => "cookies.txt", CURLOPT_COOKIEJAR => "cookies.txt", CURLOPT_SSL_VERIFYPEER => 0, CURLOPT_RETURNTRANSFER => 1, CURLOPT_FOLLOWLOCATION => 1, CURLOPT_CUSTOMREQUEST => 'POST'); 
	$rc->add($request);
}
	$rc->execute();


	function simpan($namafile, $data)
	{
		$fh = fopen($namafile, "a");
		fwrite($fh, $data);
		fclose($fh);  
	}

	function randStr($type, $length)	
	{
		$characters = array();
		$characters['angka'] = '0123456789';
		$characters['kapital'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters['huruf'] = 'abcdefghijklmnopqrstuvwxyz';
		$characters['kapital_angka'] = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters['huruf_angka'] = '0123456789abcdefghijklmnopqrstuvwxyz';
		$characters['all'] = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters[$type]);
		$randomString = '';

		for ($i = 0; $i < $length; $i++) 
		{
			$randomString .= $characters[$type][rand(0, $charactersLength - 1)];
		}

		return $randomString;

	}   

	function color($type, $warna)
	{
		$foreground_colors['black'] = '0;30';
		$foreground_colors['dark_gray'] = '1;30';
		$foreground_colors['blue'] = '0;34';
		$foreground_colors['light_blue'] = '1;34';
		$foreground_colors['green'] = '0;32';
		$foreground_colors['light_green'] = '1;32';
		$foreground_colors['cyan'] = '0;36';
		$foreground_colors['light_cyan'] = '1;36';
		$foreground_colors['red'] = '0;31';
		$foreground_colors['light_red'] = '1;31';
		$foreground_colors['purple'] = '0;35';
		$foreground_colors['light_purple'] = '1;35';
		$foreground_colors['brown'] = '0;33';
		$foreground_colors['yellow'] = '1;33';
		$foreground_colors['light_gray'] = '0;37';
		$foreground_colors['white'] = '1;37';

		$background_colors['black'] = '40';
		$background_colors['red'] = '41';
		$background_colors['green'] = '42';
		$background_colors['yellow'] = '43';
		$background_colors['blue'] = '44';
		$background_colors['magenta'] = '45';
		$background_colors['cyan'] = '46';
		$background_colors['light_gray'] = '47';
		if($type == "background"){
			return "\033[".$background_colors[$warna]."m";
		}elseif($type == "foreground"){
			return "\033[".$foreground_colors[$warna]."m";
		}else{
			exit(PHP_EOL."Failed input Color");
		}
	}

/*
Authored by Josh Fraser (www.joshfraser.com)
Released under Apache License 2.0

Maintained by Alexander Makarov, http://rmcreative.ru/

$Id$
*/

/**
 * Class that represent a single curl request
 */
class RollingCurlRequest {
	public $url = false;
	public $method = 'GET';
	public $post_data = null;
	public $headers = null;
	public $options = null;

    /**
     * @param string $url
     * @param string $method
     * @param  $post_data
     * @param  $headers
     * @param  $options
     * @return void
     */
    function __construct($url, $method = "GET", $post_data = null, $headers = null, $options = null) {
        $this->url = $url;
        $this->method = $method;
        $this->post_data = $post_data;
        $this->headers = $headers;
        $this->options = $options;
    }

    /**
     * @return void
     */
    public function __destruct() {
        unset($this->url, $this->method, $this->post_data, $this->headers, $this->options);
    }
}

/**
 * RollingCurl custom exception
 */
class RollingCurlException extends Exception {}

/**
 * Class that holds a rolling queue of curl requests.
 *
 * @throws RollingCurlException
 */
class RollingCurl {
    /**
     * @var int
     *
     * Window size is the max number of simultaneous connections allowed.
	 * 
     * REMEMBER TO RESPECT THE SERVERS:
     * Sending too many requests at one time can easily be perceived
     * as a DOS attack. Increase this window_size if you are making requests
     * to multiple servers or have permission from the receving server admins.
     */
    private $window_size = 5;

    /**
     * @var float
     *
     * Timeout is the timeout used for curl_multi_select.
     */
    private $timeout = 10;

    /**
     * @var string|array
     *
     * Callback function to be applied to each result.
     */
    private $callback;

    /**
     * @var array
     *
     * Set your base options that you want to be used with EVERY request.
     */
    protected $options = array(
		CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT => 30
	);
	
    /**
     * @var array
     */
    private $headers = array();

    /**
     * @var Request[]
     *
     * The request queue
     */
    private $requests = array();

    /**
     * @var RequestMap[]
     *
     * Maps handles to request indexes
     */
    private $requestMap = array();

    /**
     * @param  $callback
     * Callback function to be applied to each result.
     *
     * Can be specified as 'my_callback_function'
     * or array($object, 'my_callback_method').
     *
     * Function should take three parameters: $response, $info, $request.
     * $response is response body, $info is additional curl info.
     * $request is the original request
     *
     * @return void
     */
	function __construct($callback = null) {
        $this->callback = $callback;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name) {
        return (isset($this->{$name})) ? $this->{$name} : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return bool
     */
    public function __set($name, $value){
        // append the base options & headers
        if ($name == "options" || $name == "headers") {
            $this->{$name} = $value + $this->{$name};
        } else {
            $this->{$name} = $value;
        }
        return true;
    }

    /**
     * Add a request to the request queue
     *
     * @param Request $request
     * @return bool
     */
    public function add($request) {
         $this->requests[] = $request;
         return true;
    }

    /**
     * Create new Request and add it to the request queue
     *
     * @param string $url
     * @param string $method
     * @param  $post_data
     * @param  $headers
     * @param  $options
     * @return bool
     */
    public function request($url, $method = "GET", $post_data = null, $headers = null, $options = null) {
         $this->requests[] = new RollingCurlRequest($url, $method, $post_data, $headers, $options);
         return true;
    }

    /**
     * Perform GET request
     *
     * @param string $url
     * @param  $headers
     * @param  $options
     * @return bool
     */
    public function get($url, $headers = null, $options = null) {
        return $this->request($url, "GET", null, $headers, $options);
    }

    /**
     * Perform POST request
     *
     * @param string $url
     * @param  $post_data
     * @param  $headers
     * @param  $options
     * @return bool
     */
    public function post($url, $post_data = null, $headers = null, $options = null) {
        return $this->request($url, "POST", $post_data, $headers, $options);
    }

    /**
     * Execute the curl
     *
     * @param int $window_size Max number of simultaneous connections
     * @return string|bool
     */
    public function execute($window_size = null) {
        // rolling curl window must always be greater than 1
        if (sizeof($this->requests) == 1) {
            return $this->single_curl();
        } else {
            // start the rolling curl. window_size is the max number of simultaneous connections
            return $this->rolling_curl($window_size);
        }
    }

    /**
     * Performs a single curl request
     *
     * @access private
     * @return string
     */
    private function single_curl() {
        $ch = curl_init();		
        $request = array_shift($this->requests);
        $options = $this->get_options($request);
        curl_setopt_array($ch,$options);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);

        // it's not neccesary to set a callback for one-off requests
        if ($this->callback) {
            $callback = $this->callback;
            if (is_callable($this->callback)){
                call_user_func($callback, $output, $info, $request);
            }
        }
		else
            return $output;
	return true;
    }

    /**
     * Performs multiple curl requests
     *
     * @access private
     * @throws RollingCurlException
     * @param int $window_size Max number of simultaneous connections
     * @return bool
     */
    private function rolling_curl($window_size = null) {
        if ($window_size)
            $this->window_size = $window_size;

        // make sure the rolling window isn't greater than the # of urls
        if (sizeof($this->requests) < $this->window_size)
            $this->window_size = sizeof($this->requests);
        
        if ($this->window_size < 2) {
            throw new RollingCurlException("Window size must be greater than 1");
        }

        $master = curl_multi_init();        

        // start the first batch of requests
        for ($i = 0; $i < $this->window_size; $i++) {
            $ch = curl_init();

            $options = $this->get_options($this->requests[$i]);

            curl_setopt_array($ch,$options);
            curl_multi_add_handle($master, $ch);

            // Add to our request Maps
            $key = (string) $ch;
            $this->requestMap[$key] = $i;
        }

        do {
            while(($execrun = curl_multi_exec($master, $running)) == CURLM_CALL_MULTI_PERFORM);
            if($execrun != CURLM_OK)
                break;
            // a request was just completed -- find out which one
            while($done = curl_multi_info_read($master)) {

                // get the info and content returned on the request
                $info = curl_getinfo($done['handle']);
                $output = curl_multi_getcontent($done['handle']);

                // send the return values to the callback function.
                $callback = $this->callback;
                if (is_callable($callback)){
	            $key = (string)$done['handle'];
                    $request = $this->requests[$this->requestMap[$key]];
                    unset($this->requestMap[$key]);
                    call_user_func($callback, $output, $info, $request);
                }

                // start a new request (it's important to do this before removing the old one)
                if ($i < sizeof($this->requests) && isset($this->requests[$i]) && $i < count($this->requests)) {
                    $ch = curl_init();
                    $options = $this->get_options($this->requests[$i]);
                    curl_setopt_array($ch,$options);
                    curl_multi_add_handle($master, $ch);

                    // Add to our request Maps
                    $key = (string) $ch;
                    $this->requestMap[$key] = $i;
                    $i++;
                }

                // remove the curl handle that just completed
                curl_multi_remove_handle($master, $done['handle']);

            }

	    // Block for data in / output; error handling is done by curl_multi_exec
	    if ($running)
                curl_multi_select($master, $this->timeout);

        } while ($running);
        curl_multi_close($master);
        return true;
    }


    /**
     * Helper function to set up a new request by setting the appropriate options
     *
     * @access private
     * @param Request $request
     * @return array
     */
    private function get_options($request) {
        // options for this entire curl object
        $options = $this->__get('options');
		if (ini_get('safe_mode') == 'Off' || !ini_get('safe_mode')) {
            $options[CURLOPT_FOLLOWLOCATION] = 1;
			$options[CURLOPT_MAXREDIRS] = 5;
        }
        $headers = $this->__get('headers');

		// append custom options for this specific request
		if ($request->options) {
            $options = $request->options + $options;
        }

		// set the request URL
        $options[CURLOPT_URL] = $request->url;

        // posting data w/ this request?
        if ($request->post_data) {
            $options[CURLOPT_POST] = 1;
            $options[CURLOPT_POSTFIELDS] = $request->post_data;
        }
        if ($headers) {
            $options[CURLOPT_HEADER] = 0;
            $options[CURLOPT_HTTPHEADER] = $headers;
        }

        return $options;
    }

    /**
     * @return void
     */
    public function __destruct() {
        unset($this->window_size, $this->callback, $this->options, $this->headers, $this->requests);
	}
}


?>