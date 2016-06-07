<?php
$counts = file_get_contents('alice.txt');

class WordCounter
{
    public function display($counts)
    {
        $byLine = explode("\n", $counts);
        $filtered = [];
        $specialChar = [
            ',',
            '?',
            '(',
            '-',
            ')',
            '`',
            '!',
            ';',
            '.',
            '_',
            '\'',
            '"',
            '[',
            '*'
        ];

        foreach ($byLine as $line)
        {
            $line = strtolower($line);
            $line = str_replace($specialChar, "", $line);

            if ($line)
            {
                $byWord = explode(" ", $line);

                foreach ($byWord as $index => $word):
                    $word = trim($word);


                    if (array_key_exists($word, $filtered) && strlen($word) > 0)
                    {
                        ++$filtered[$word];
                    }
                    else
                    {
                        $filtered[$word] = 1;
                    }

                endforeach;
            }
        }
        return $filtered;
    }
    public function getTop($sort)
    {
        arsort($sort);
        $sort = array_slice($sort, 0, 20);
        return $sort;
    }
    public function sort($counts)
    {
        ksort($counts);
        return $counts;
    }
}

$wordCount = new WordCounter();
echo "<b>Top 20 Words: </b>". "<pre>";
var_dump($wordCount->getTop($wordCount->display($counts)));
echo "<b>String Count: </b>". "<pre>";
var_dump($wordCount->sort($wordCount->display($counts)));




// $file = file_get_contents('alice.txt');
// $byLine = explode("\n", $file);
// $dictionary = [];
// $bannedCharacters = [
//     ',',
//     '?',
//     '(',
//     '-',
//     ')',
//     '`',
//     '!',
//     ';',
//     '.',
//     '_',
//     '\'',
//     '"',
//     '[',
//     '*'
// ];


// foreach($byLine as $line)
// {
//     $line = strtolower($line);

//     // Remove all non alpha-numeric characters
    // $line = str_replace($bannedCharacters, "", $line);

    // if ($line)
    // {
    //     $byWord = explode(" ", $line);

    //     foreach ($byWord as $index => $word) {
    //         $word = trim($word);

    //         if (array_key_exists($word, $dictionary) && strlen($word) > 0)
    //         {
    //             ++$dictionary[$word];
    //         }
    //         else
    //         {
    //             $dictionary[$word] = 1;
    //         }

//         }
//     }
// }

// ksort($dictionary);
// var_dump($dictionary);

// arsort($dictionary);
// var_dump($dictionary);
?>