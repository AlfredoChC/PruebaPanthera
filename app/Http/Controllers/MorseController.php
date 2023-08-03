<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MorseController extends Controller
{

    public function morseToText(Request $request)
    {
        $textString = $request->input('morseMessage');
        $encodedMessage = $this->encodeMorseText($textString);
        return view('morse', ['encodedMessage' => $encodedMessage]);
    }

    function encodeMorseText($morseString){
    $morseToTextMap = [
        '.-'    => 'a', '-...'  => 'b', '-.-.'  => 'c', '-..'   => 'd',
        '.'     => 'e', '..-.'  => 'f', '--.'   => 'g', '....'  => 'h',
        '..'    => 'i', '.---'  => 'j', '-.-'   => 'k', '.-..'  => 'l',
        '--'    => 'm', '-.'    => 'n', '---'   => 'o', '.--.'  => 'p',
        '--.-'  => 'q', '.-.'   => 'r', '...'   => 's', '-'     => 't',
        '..-'   => 'u', '...-'  => 'v', '.--'   => 'w', '-..-'  => 'x',
        '-.--'  => 'y', '--..'  => 'z'
    ];

    $words = explode(' ', $morseString);
    $decodedMessage = '';

    foreach ($words as $word) {
        $letters = explode('/', $word);
        foreach ($letters as $letter) {
            if (isset($morseToTextMap[$letter])) {
                $decodedMessage .= $morseToTextMap[$letter];
            }
        }
        $decodedMessage .= ' ';
    }

    return trim($decodedMessage);
}

public function textToMorse(Request $request)
{
    $textString = $request->input('textMessage');
    $encodedMessage = $this->encodeTextToMorse($textString);
    return view('morse', ['encodedMessage' => $encodedMessage]);
}
function encodeTextToMorse($textString)
{
    $textToMorseMap = [
        'a' => '.-', 'b' => '-...', 'c' => '-.-.', 'd' => '-..',
        'e' => '.', 'f' => '..-.', 'g' => '--.', 'h' => '....',
        'i' => '..', 'j' => '.---', 'k' => '-.-', 'l' => '.-..',
        'm' => '--', 'n' => '-.', 'o' => '---', 'p' => '.--.',
        'q' => '--.-', 'r' => '.-.', 's' => '...', 't' => '-',
        'u' => '..-', 'v' => '...-', 'w' => '.--', 'x' => '-..-',
        'y' => '-.--', 'z' => '--..'
    ];

    $words = explode(' ', strtolower($textString));
    $encodedMessage = '';

    foreach ($words as $word) {
        $letters = str_split($word);
        foreach ($letters as $letter) {
            if (isset($textToMorseMap[$letter])) {
                $encodedMessage .= $textToMorseMap[$letter] . '/';
            }
        }
        $encodedMessage .= ' ';
    }

    return trim($encodedMessage);
}
}