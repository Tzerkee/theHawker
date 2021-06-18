<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

function presentDate($date, $date_format)
{
    return Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('assets/img/not-found.png');
}

function avatarImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('assets/img/default.png');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

/**
 * custom helper functions
 */

/**
 * accept JSON string
 *
 * if the decoded string is array, find the key that match with current
 * locale (or specified $lang) and return its value
 *
 * if the string is not a valid JSON, return original string
 */
function translate($str, $lang = null) {
    if (is_null($lang)) {
        $lang = config('app.locale');
    }

    $arr = json_decode($str, true);
    if (is_null($arr) || !is_array($arr)) {
        return $str;
    }

    if ( array_key_exists($lang, $arr) ) {
        return $arr[$lang];
    }

    return reset($arr);
}

/**
 * try convert json string to array,
 * return ori string if decode fails
 */
function json_to_array($str) {
    $arr = json_decode($str, true);
    if (is_null($arr) || !is_array($arr)) {
        return $str;
    }

    return $arr;
}

/**
 * same as json_to_array,
 * but will return empty array if not valid json
 */
function json_to_array_or_empty($str)
{
    $arr = json_decode($str, true);
    if (is_null($arr) || !is_array($arr)) {
        return [];
    }

    return $arr;
}

/**
 * get array element after decode json string
 * return ''/[] if empty / invalid json
 *
 * @param boolean $onlyFirst if true, only return first image
 */
function db_image($json, $onlyFirst=true)
{
    if (empty($json)) {
        return $onlyFirst ? '' : [];
    }

    $arr = json_decode($json, true);
    if (is_array($arr) && !empty($arr[0])) {
        if($onlyFirst) {
            return $arr[0];
        } else {
            return $arr;
        }
    }

    return $onlyFirst ? '' : [];
}

function db_image_url($path, $json, $fallback = 'img/fallback.jpg')
{
    $img = db_image($json);
    if (empty($img)) {
        return $fallback;

    } else {
        $path = trim($path, ' \\\/');
        if (\File::exists($path.'/'.$img)) {
            return $path.'/'.$img;
        }
    }

    return $fallback;
}

/**
 * similar to db_image_url, but handle all images in json and support extra options
 *
 * @param array $opts see $defaultOpts for available options
 * @return void
 */
function db_images_url($path, $json, $opts=[])
{
    $defaultOpts = [
        'fallback' => 'img/fallback.jpg',
        'full_url' => true, // if true, prefix url with asset()
        'include_non_exist_image' => false, // if true, deleted image will be replaced with fallback

        /**
         * if not empty, will use the value to append to $path
         * returned array will become [
         *      [
         *          'image' => 'path/to/image.jpg',
         *          'thumb' => 'path/to/thumb_value/image.jpg'
         *      ]
         * ]
         * if thumb not found, will use ori instead
         */
        'thumb' => '' // e.g. 'thumbnail', '800x600'
    ];

    $opts = array_merge($defaultOpts, $opts);
    $fallback = $opts['fallback'];

    $imgsRaw = db_image($json, false);
    $imgs = [];

    if (empty($imgsRaw)) {
        return [];

    } else {
        $path = trim($path, ' \\\/');
        foreach($imgsRaw as $img) {
            if (\File::exists($path.'/'.$img)) {
                // $imgs[] = $path.'/'.$img;
                $imgs[] = $img;
            } else {
                if($defaultOpts['include_non_exist_image']) {
                    $imgs[] = $fallback;
                }
            }
        }
    }

    $finalUrl = function ($img) use ($opts) {
        return $opts['full_url'] ? asset($img) : $img;
    };

    $processedImgs = [];
    foreach($imgs as $img) {
        $imgPath = $img;
        if($imgPath !== $fallback) {
            $imgPath = $path.'/'.$imgPath;
        }
        $tmp = $finalUrl($imgPath);

        if($opts['thumb']) {
            $thumb = $path.'/'.$opts['thumb'].'/'.$img;
            if (!\File::exists($thumb)) {
                $thumb = $tmp;
            }

            $thumb = $finalUrl($thumb);
            $tmp = [
                'image' => $tmp,
                'thumb' => $thumb,
            ];
        }

        $processedImgs[] = $tmp;
    }

    if($opts['full_url']) {
        $tmp = [];
        $imgs = $tmp;
    }

    return $processedImgs;
}

function getFileOrEmpty($file)
{
    if (File::exists($file)) {
        return url($file);
    }

    return '';
}

function to_angular_time($strTime)
{
    return strtotime($strTime) * 1000;
}

// append https:// to url without it
function toHttpsUrl($url)
{
    if (!empty($url) && !Str::startsWith($url, 'https://')) {
        $url = 'https://'.$url;
    }

    return $url;
}

function urlize($str) {
    $str = strtolower($str);
    $str = str_replace(['\\', '/', '+', '$', '#', '@', '.', '?'], '', $str);
    $str = str_replace(' ', '-', $str);
    return $str;
}

/**
 * remove line break & multiple white space in string
 */
function strToOneLine($str) {
    return trim(preg_replace('/\s+/', ' ', $str));
}

/**
 * move image, including its thumbnail
 * @param  string $originalPath     Path of image to be copied. Include '/' at the end of string
 * @param  string $targetPath       Target path. Include '/' at the end of string
 * @param  string $img              Image name
 * @return string                   Return new image name. Return empty string if failed to copy
 */
function moveImage($originalPath, $targetPath, $img)
{
    $newFileName = '';
    $thumbnail = 'thumbnail/';
    try {
        if ($img && File::exists($originalPath.$img) && File::exists($originalPath.$thumbnail.$img)) {
            do {
                $newFileName = Str::random(6).time().$img;
            } while (File::exists($targetPath.$newFileName) || File::exists($targetPath.$thumbnail.$newFileName));

            File::move($originalPath.$img, $targetPath.$newFileName);
            File::move($originalPath.$thumbnail.$img, $targetPath.$thumbnail.$newFileName);
            File::delete($originalPath.$img);
            File::delete($originalPath.$thumbnail.$img);
        }
    } catch (Exception $e) {
        // do nothing
    }

    return $newFileName;
}

/**
 * remove files/images uploaded via UploadHelper, like CMS upload
 * usually called when update or delete/force-delete a row from table with image/file upload
 */
function delete_db_files($path, $json)
{
    $deleted = [];
    $imageConfig = config('cms.image');
    $resizeFolder = $imageConfig['image_resize'];
    $files = db_image($json, false);
    $fullPath = public_path($path); // assume files/images are uploaded to public path

    foreach($files as $file) {
        if($file === "") { continue; }

        // remove ori file/image
        if(\File::exists($fullPath.'/'.$file)) {
            unlink($fullPath.'/'.$file);
            $deleted[] = $fullPath.'/'.$file;
        }

        // remove resized images
        if($resizeFolder && count($resizeFolder) > 0) {
            foreach ($resizeFolder as $key => $r) {
                if(\File::exists($fullPath.'/'.$key.'/'.$file)) {
                    unlink($fullPath.'/'.$key.'/'.$file);
                    $deleted[] = $fullPath.'/'.$key.'/'.$file;
                }
            }
        }

        // remove image thumbnail
        if(\File::exists($fullPath.'/thumbnail/'.$file)) {
            unlink($fullPath.'/thumbnail/'.$file);
            $deleted[] = $fullPath.'/thumbnail/'.$file;
        }
    }

    return $deleted;
}

/**
 * remove all emoji in string
 */
function removeEmoji($string)
{
    return preg_replace('/([0-9#][\x{20E3}])|[\x{00ae}\x{00a9}\x{203C}\x{2047}\x{2048}\x{2049}\x{3030}\x{303D}\x{2139}\x{2122}\x{3297}\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $string);
}

function embeddedYoutubeAddResponsive($text)
{
    return preg_replace(
        '/<iframe.*?<\/iframe>/',
        "<div class=\"embed-responsive embed-responsive-16by9\">$0</div>",
        $text
    );
}

/**
 * ## START ## Convert the hex to rgba color code
 */
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

function calc_brightness($color) {
    $rgb = hex2RGB($color);
    return sqrt(
        $rgb["red"] * $rgb["red"] * .299 +
        $rgb["green"] * $rgb["green"] * .587 +
        $rgb["blue"] * $rgb["blue"] * .114);
}

function textColorByBg($color) {
    $brightness = calc_brightness($color);
    return ($brightness < 140) ? "#FFF" : "#000";
}

function cutstr($str, $limit=100, $tail='...') {
    if(!isset($str[$limit])) return $str;

    $newLimit = $limit;
    while(isset($str[$newLimit]) && preg_match('/^[0-9a-zA-Z]+/', $str[$newLimit])) {
        $newLimit++;
    }
    if(isset($str[$newLimit])) {
        $limit = $newLimit;
    }
    return substr($str, 0, $limit).'...';
    // return substr($str, 0, 100).'...';
    // if($str[$limit]=preg_match($str))
}

function bg_hex2rgba($color, $opacity) {
    $rgb = hex2RGB($color,true,',');
    return "background-color:rgba({$rgb},$opacity)";
}

/**
 * ## END ## Convert the hex to rgba color code
 */

function normalizeLang($prefix, $gtMalay=null) {
    //purposely do so, because most of the malay content is not filled
    if(is_null($gtMalay))
        $lang  = \App::getLocale() === 'my'? 'en' : \App::getLocale();
    else
        $lang = \App::getLocale();

    $title = $prefix.$lang;
    return $title;
}

function getCurrentLanguange()
{
    $exclude = ['app', config('cms.cmsMainUrl'), config('cms.cmsMainApiUrl')];
    $segments = \Request::segments();

    if($segments) {

        $segment = $segments[0];

        if(!in_array($segment, $exclude)) {
            $lang = $segment;

        // currently accessed by app/cms
        } else {
            $lang = App::getLocale();
        }

    // default
    } else {
        $lang = App::getLocale();
    }

    return $lang;
}

/**
 * Chain extra queries via array
 * @param  Mixed   $builder Query builder/relationships to be chained
 * @param  array   $chains  Query chain
 * @return Builder
 */
function builderChains($builder, $chains = []) {
    /* remove block comment to see usage more clearly

    // USAGE
    $chains = [
        // format: constraint_name => array of (array of constraint args)
        'where' => [
            // this will produce multiple 'where'
            ['deal_type', $dealType],    // where->('deal_type', $dealType)
            ['another_col', '!=', $val]  // where->('another_col', '!=', $val)
        ],
        'whereIn' => [
            ['restaurant_id', $restaurantIds]
        ],

        // trigger scope function - $model->isHome()
        'isHome' => '()',

        // special case. this constrain accepts array as arg
        // format: constraint_name => array of constraint arg
        'with' => [
            [
                'relationship' => function($q) {
                    $q->select('id');
                },
                'relationship_2'
            ]
        ],
    ];
    // initial query
    $q = model::where('id', $id);

    // insert additional constraints in $chain
    $q = SharedHelper::builderChains($q, $chains);

    */

    if(empty($chains)) {
        return $builder;
    }

    $chainToRetainArr = ['with'];

    foreach($chains as $chain => $values) {
        if ($values === '()') {
            $builder->$chain();
            continue;
        }

        foreach ($values as $args) {
            if(in_array($chain, $chainToRetainArr)) {
                $builder->$chain($args);
            }
            else {
                $builder->$chain(...$args);
            }
        }
    }

    return $builder;
}

/**
 * merge n chains recursively
 * @param  array $chains query chain
 * @return array         merged chains
 */
function mergeChains(...$chains) {
    $mergedChains = [];
    foreach($chains as $chain) {
        $mergedChains = array_merge_recursive($mergedChains, $chain);
    }

    return $mergedChains;
}

function enableQueryLog() {
    DB::enableQueryLog();
}

function getQueryLog() {
    $logs = DB::getQueryLog();
    $totalTime = 0;
    $longestTime = 0;
    $longestQuery = [];

    foreach($logs as $log) {
        $totalTime += $log['time'];
        if($log['time'] > $longestTime) {
            $longestTime = $log['time'];
            $longestQuery = $log;
        }
    }

    return [
        'size' =>sizeof($logs),
        'total_time' => $totalTime,
        'longest_time_query' => $longestQuery,
        'logs'  => $logs,
    ];
}

function isWeb()
{
    return config('app.isWeb');
}

function setIsWeb()
{
    config(['app.isWeb' => true]);
}

/**
 * append current locale to $key
 * e.g. desc become desc_en if current locale is en
 *
 * @param [string] $key
 * @return void
 */
function toLocaleKey($key)
{
return $key.'_'.App::getLocale();
}

function is404($exception)
{
    return $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException
            || $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
}
