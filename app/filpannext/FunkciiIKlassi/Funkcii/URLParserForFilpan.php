<?
function URLParseForFilpan($url, $excudingArray = array())
{

    $paramArray = array();
    $markedParamArray = array();

    $parsedURL = parse_url($url);
    if (!empty($parsedURL['query'])) {
        $explodedQuery = explode("&", $parsedURL['query']);
//var_dump($explodedQuery);
        foreach ($explodedQuery as $value) {
            $row = explode("=", $value);
            if (!in_array($row[0], $excudingArray)) {
                $paramArray[$row[0]] = $row[1];
            } else {
                $markedParamArray[$row[0]] = $row[1];
            }

        }
    }

    $outArray = array();
    $outArray['DefaultParams'] = $paramArray;
    $outArray['AdditionalParams'] = $markedParamArray;
    $outArray['Path'] = $parsedURL['path'];

    $query = '';
    foreach ($paramArray as $key => $value) {
        $query .= '&' . $key . '=' . $value;
    }

    $query = substr($query, 1, strlen($query) - 1);

    $AdditionalQuery = '';

    foreach ($markedParamArray as $key => $value) {
        $AdditionalQuery .= '&' . $key . '=' . $value;
    }

    $AdditionalQuery = substr($AdditionalQuery, 1, strlen($AdditionalQuery) - 1);

    if (!empty($query)) {
        $outArray['ClearedURL'] = $parsedURL['path'] . "?" . $query;
    } else {
        $outArray['ClearedURL'] = $parsedURL['path'];
    }
    $outArray['ClearedQuery'] = $query;
    $outArray['AdditionalQuery'] = $AdditionalQuery;
    return $outArray;
}

?>