<?php
namespace App\Services;

use App\Services\ParsingShoppingWebInterface;

class ParsingPchomeService implements ParsingShoppingWebInterface
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
     * @return array $items
     */
    public function getItemList()
    {
        $items = array();

        $query_html = 'http://ecshweb.pchome.com.tw/search/v3.3/all/results?q='
        .$this->query_name
        .= '&page=1&sort=rnk/dc';

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($query_html , false, $context);

        if ($result !== FALSE) {
            $obj = json_decode($result , true);
            for($i = 0; $i < count($obj['prods']); $i++) {
                array_push($items,
                    array(
                        "name" => $obj['prods'][$i]['name'],
                        "img" => 'http://a.ecimg.tw'.$obj['prods'][$i]['picS'],
                        "describe" => $obj['prods'][$i]['describe'],
                        "price" => $obj['prods'][$i]['price']
                    )
                );
            }
        }

        return $items;
    }
}
