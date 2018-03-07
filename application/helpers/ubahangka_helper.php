<?php

function convertNumber($number)
{
	list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " and "
                            : ", "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " point";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= " " . convertDigit($fraction{$i});
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " decillion";
        case 10:
            return " nonillion";
        case 9:
            return " octillion";
        case 8:
            return " septillion";
        case 7:
            return " sextillion";
        case 6:
            return " quintrillion";
        case 5:
            return " quadrillion";
        case 4:
            return " Triliun";
        case 3:
            return " Miliar";
        case 2:
            return " Juta";
        case 1:
            return " Ribu";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {   


        if ($digit1 == "1") {
            $buffer .=  "Seratus";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " ";
        }    # code...
        }else{
            $buffer .= convertDigit($digit1) . " Ratus";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " ";
        }
        }


        
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "Sepuluh";
            case "2":
                return "Dua puluh";
            case "3":
                return "Tiga Puluh";
            case "4":
                return "Empat Puluh";
            case "5":
                return "Lima Puluh";
            case "6":
                return "Enam Puluh";
            case "7":
                return "Tujuh Puluh";
            case "8":
                return "Delapan Puluh";
            case "9":
                return "Sembilan Puluh";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "Sebelas";
            case "2":
                return "Dua Belas";
            case "3":
                return "Tiga Belas";
            case "4":
                return "Empat Belas";
            case "5":
                return "Lima Belas";
            case "6":
                return "Enam Belas";
            case "7":
                return "Tujuh Belas";
            case "8":
                return "Delapan Belas";
            case "9":
                return "Sembilan Belas";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "Dua Puluh $temp";
            case "3":
                return "Tiga Puluh $temp";
            case "4":
                return "Empat Puluh $temp";
            case "5":
                return "Lima Puluh $temp";
            case "6":
                return "Enam Puluh $temp";
            case "7":
                return "Tujuh Puluh $temp";
            case "8":
                return "Delapan Puluh $temp";
            case "9":
                return "Sembilan Puluh $temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "Kosong";
        case "1":
            return "Satu";
        case "2":
            return "Dua";
        case "3":
            return "Tiga";
        case "4":
            return "Empat";
        case "5":
            return "Lima";
        case "6":
            return "Enam";
        case "7":
            return "Tujuh";
        case "8":
            return "Delapan";
        case "9":
            return "Sembilan";
    }
}



?>