<?php
namespace App\Services;

use Sunra\PhpSimple\HtmlDomParser;
use App\Services\ParsingShoppingWebInterface;

class ParsingYahooService implements ParsingShoppingWebInterface
{
    protected $query_name;

    /**
    * Get Html Content
    * @param string $name
    */
    public function setQueryName($name)
    {
        $this->query_name = urlencode($name);
    }

    /**
    * Get Html Content
    * @return array $item
    */
    public function getItemList()
    {
        $items = array();

        $query_html = 'https://tw.search.buy.yahoo.com/search/shopping/product?p=';
        $query_html .= $this->query_name;
        $query_html .= '&qt=product&cid=0&clv=0&cid_path=';
        $html = HtmlDomParser::file_get_html($query_html);
        foreach($html->find('div.srp-pdcontent') as $element)  {
            $name =  $element->find('a', 0)->plaintext;
            array_push($items,
                array(
                    "name" => $name,
                    "price" => 0,
                    "describe" => "",
                    "img" => ""
                )
            );
        }

        $i = 0;
        foreach($html->find('div.srp-pdcontent') as $element)  {
            $desc_str = '';
            foreach($element->find('li.ellipsis') as $description)  {
                $the_dsrc = $description->plaintext;
                if(mb_detect_encoding($the_dsrc, 'UTF-8', true)) {
                    $desc_str .= $the_dsrc;
                }
            }
            $items[$i]["describe"] = $desc_str;
            $i++;
        }

        $i = 0;
        foreach($html->find('div.srp-pdprice') as $element)  {
            foreach($element->find('div.srp-actprice') as $price_element)  {
                $items[$i]["price"] = intVal(str_replace("$", "", str_replace(",", "", $price_element->find('em', 0)->plaintext)));
            }

            foreach($element->find('div.srp-listprice') as $price_element)  {
                $items[$i]["price"] = intVal(str_replace("$", "", str_replace(",", "", $price_element->find('span', 1)->plaintext)));
            }

            $i++;
        }

        $i = 0;

        foreach($html->find('div.srp-pdimage') as $element)  {
            $img = $element->find('a', 0);
            if($img) {
                $items[$i]["img"] = $img->find('img', 0)->src;
                $i++;
            }
        }

        return $items;
    }
}
