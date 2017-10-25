<?php
namespace App\Services;

use Sunra\PhpSimple\HtmlDomParser;
use App\Services\ParsingShoppingWebInterface;

class ParsingMomoService implements ParsingShoppingWebInterface
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
        $query_html = 'https://www.momoshop.com.tw/search/searchShop.jsp?keyword=';
        $query_html .= $this->query_name;
        $query_html .= '&searchType=1&curPage=1&_isFuzzy=0';
        $html = HtmlDomParser::file_get_html($query_html);

        return $html->plaintext;
    }
}
