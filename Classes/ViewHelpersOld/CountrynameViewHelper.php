<?php
namespace Ferenckrausz\Attoworld\ViewHelpers;

	/*
	 *  Copyright notice
	 *
	 *  (c) 2012 Marc Hirdes <Marc_Hirdes@gmx.de>, clickstorm GmbH
	 *
	 *  All rights reserved
	 *
	 *  This script is part of the TYPO3 project. The TYPO3 project is
	 *  free software; you can redistribute it and/or modify
	 *  it under the terms of the GNU General Public License as published by
	 *  the Free Software Foundation; either version 3 of the License, or
	 *  (at your option) any later version.
	 *
	 *  The GNU General Public License can be found at
	 *  http://www.gnu.org/copyleft/gpl.html.
	 *
	 *  This script is distributed in the hope that it will be useful,
	 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *  GNU General Public License for more details.
	 *
	 *  This copyright notice MUST APPEAR in all copies of the script!
	*/

	/**
	 */

/**
 * Renders Nothing
 *
 * == Examples ==
 *
 * <code title="Default parameters">
 * <gomapsext:format.comment>'foo <b>bar</b>.'</gomapsext:format.comment>
 * </code>
 * <output>
 * </output>
 */

class CountrynameViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
        * @param string $title
        *
        * @return string
        */
	public function render($title) {
        $countries = array(
            'VA' => 'holy see (vatican city state)', 
            'CC' => 'cocos (keeling) islands', 
            'GT' => 'guatemala', 
            'JP' => 'japan', 
            'SE' => 'sweden', 
            'TZ' => 'tanzania, united republic of', 
            'CD' => 'congo, the democratic republic of the', 
            'GU' => 'guam', 
            'MM' => 'myanmar', 
            'DZ' => 'algeria', 
            'MN' => 'mongolia', 
            'PK' => 'pakistan', 
            'SG' => 'singapore', 
            'VC' => 'saint vincent and the grenadines', 
            'CF' => 'central african republic', 
            'GW' => 'guinea-bissau', 
            'MO' => 'macao', 
            'PL' => 'poland', 
            'SH' => 'saint helena', 
            'VE' => 'venezuela', 
            'CG' => 'congo', 
            'MP' => 'northern mariana islands', 
            'PM' => 'saint pierre and miquelon', 
            'SI' => 'slovenia', 
            'ZW' => 'zimbabwe', 
            'CH' => 'switzerland', 
            'GY' => 'guyana', 
            'MQ' => 'martinique', 
            'PN' => 'pitcairn', 
            'SJ' => 'svalbard and jan mayen', 
            'VG' => 'virgin islands, british', 
            'CI' => 'côte d\'ivoire', 
            'MR' => 'mauritania', 
            'SK' => 'slovakia', 
            'MS' => 'montserrat', 
            'SL' => 'sierra leone', 
            'YE' => 'yemen', 
            'VI' => 'virgin islands, u.s.', 
            'CK' => 'cook islands', 
            'ID' => 'indonesia', 
            'MT' => 'malta', 
            'SM' => 'san marino', 
            'CL' => 'chile', 
            'IE' => 'ireland', 
            'LA' => 'lao people\'s democratic republic', 
            'MU' => 'mauritius', 
            'SN' => 'senegal', 
            'CM' => 'cameroon', 
            'FI' => 'finland', 
            'LB' => 'lebanon', 
            'MV' => 'maldives', 
            'PR' => 'puerto rico', 
            'SO' => 'somalia', 
            'CN' => 'china', 
            'FJ' => 'fiji', 
            'LC' => 'saint lucia', 
            'MW' => 'malawi', 
            'PS' => 'palestinian territory, occupied', 
            'CO' => 'colombia', 
            'FK' => 'falkland islands (malvinas)', 
            'MX' => 'mexico', 
            'PT' => 'portugal', 
            'VN' => 'viet nam', 
            'MY' => 'malaysia', 
            'SR' => 'suriname', 
            'FM' => 'micronesia, federated states of', 
            'MZ' => 'mozambique', 
            'CR' => 'costa rica', 
            'PW' => 'palau', 
            'FO' => 'faroe islands', 
            'ST' => 'sao tome and principe', 
            'IL' => 'israel', 
            'LI' => 'liechtenstein', 
            'PY' => 'paraguay', 
            'BA' => 'bosnia and herzegovina', 
            'CU' => 'cuba', 
            'IM' => 'isle of man', 
            'SV' => 'el salvador', 
            'CV' => 'cape verde', 
            'FR' => 'france', 
            'IN' => 'india', 
            'LK' => 'sri lanka', 
            'VU' => 'vanuatu', 
            'BB' => 'barbados', 
            'IO' => 'british indian ocean territory', 
            'UA' => 'ukraine', 
            'CX' => 'christmas island', 
            'RE' => 'reunion', 
            'SY' => 'syrian arab republic', 
            'CY' => 'cyprus', 
            'IQ' => 'iraq', 
            'SZ' => 'swaziland', 
            'BD' => 'bangladesh', 
            'CZ' => 'czech republic', 
            'IR' => 'iran, islamic republic of', 
            'YT' => 'mayotte', 
            'BE' => 'belgium', 
            'IS' => 'iceland', 
            'BF' => 'burkina faso', 
            'EC' => 'ecuador', 
            'IT' => 'italy', 
            'OM' => 'oman', 
            'BG' => 'bulgaria', 
            'BH' => 'bahrain', 
            'UG' => 'uganda', 
            'LR' => 'liberia', 
            'BI' => 'burundi', 
            'EE' => 'estonia', 
            'LS' => 'lesotho', 
            'BJ' => 'benin', 
            'LT' => 'lithuania', 
            'EG' => 'egypt', 
            'EH' => 'western sahara', 
            'BL' => 'saint barthélemy', 
            'LU' => 'luxembourg', 
            'RO' => 'romania', 
            'BM' => 'bermuda', 
            'LV' => 'latvia', 
            'BN' => 'brunei darussalam', 
            'UM' => 'united states minor outlying islands', 
            'BO' => 'bolivia', 
            'KE' => 'kenya', 
            'NA' => 'namibia', 
            'LY' => 'libyan arab jamahiriya', 
            'BR' => 'brazil', 
            'KG' => 'kyrgyzstan', 
            'NC' => 'new caledonia', 
            'RS' => 'serbia', 
            'BS' => 'bahamas', 
            'HK' => 'hong kong', 
            'KH' => 'cambodia', 
            'BT' => 'bhutan', 
            'KI' => 'kiribati', 
            'NE' => 'niger', 
            'QA' => 'qatar', 
            'RU' => 'russian federation', 
            'US' => 'united states', 
            'HM' => 'heard island and mcdonald islands', 
            'NF' => 'norfolk island', 
            'BV' => 'bouvet island', 
            'ER' => 'eritrea', 
            'HN' => 'honduras', 
            'NG' => 'nigeria', 
            'RW' => 'rwanda', 
            'BW' => 'botswana', 
            'ES' => 'spain', 
            'ET' => 'ethiopia', 
            'NI' => 'nicaragua', 
            'AD' => 'andorra', 
            'BY' => 'belarus', 
            'KM' => 'comoros', 
            'AE' => 'united arab emirates', 
            'TC' => 'turks and caicos islands', 
            'BZ' => 'belize', 
            'HR' => 'croatia', 
            'KN' => 'saint kitts and nevis', 
            'AF' => 'afghanistan', 
            'NL' => 'netherlands', 
            'TD' => 'chad', 
            'UY' => 'uruguay', 
            'AG' => 'antigua and barbuda', 
            'HT' => 'haiti', 
            'KP' => 'korea, democratic people\'s republic of', 
            'UZ' => 'uzbekistan', 
            'GA' => 'gabon', 
            'HU' => 'hungary', 
            'TF' => 'french southern territories', 
            'GB' => 'united kingdom', 
            'AI' => 'anguilla', 
            'DE' => 'germany', 
            'KR' => 'korea, republic of', 
            'TG' => 'togo', 
            'NO' => 'norway', 
            'TH' => 'thailand', 
            'GD' => 'grenada', 
            'NP' => 'nepal', 
            'ZA' => 'south africa', 
            'WF' => 'wallis and futuna', 
            'AL' => 'albania', 
            'GE' => 'georgia', 
            'TJ' => 'tajikistan', 
            'AM' => 'armenia', 
            'GF' => 'french guiana', 
            'NR' => 'nauru', 
            'TK' => 'tokelau', 
            'AN' => 'netherlands antilles', 
            'DJ' => 'djibouti', 
            'KW' => 'kuwait', 
            'TL' => 'timor-leste', 
            'TM' => 'turkmenistan', 
            'AO' => 'angola', 
            'DK' => 'denmark', 
            'GG' => 'guernsey', 
            'TN' => 'tunisia', 
            'GH' => 'ghana', 
            'JE' => 'jersey', 
            'MA' => 'morocco', 
            'KY' => 'cayman islands', 
            'NU' => 'niue', 
            'DM' => 'dominica', 
            'GI' => 'gibraltar', 
            'KZ' => 'kazakhstan', 
            'TO' => 'tonga', 
            'AQ' => 'antarctica', 
            'MC' => 'monaco', 
            'AR' => 'argentina', 
            'MD' => 'moldova, republic of', 
            'AS' => 'american samoa', 
            'DO' => 'dominican republic', 
            'TR' => 'turkey', 
            'ME' => 'montenegro', 
            'PA' => 'panama', 
            'AT' => 'austria', 
            'GL' => 'greenland', 
            'MF' => 'saint martin', 
            'NZ' => 'new zealand', 
            'AU' => 'australia', 
            'GM' => 'gambia', 
            'MG' => 'madagascar', 
            'GN' => 'guinea', 
            'ZM' => 'zambia', 
            'TT' => 'trinidad and tobago', 
            'MH' => 'marshall islands', 
            'AW' => 'aruba', 
            'PE' => 'peru', 
            'SA' => 'saudi arabia', 
            'AX' => 'åland islands', 
            'GP' => 'guadeloupe', 
            'TV' => 'tuvalu', 
            'PF' => 'french polynesia', 
            'SB' => 'solomon islands', 
            'WS' => 'samoa', 
            'CA' => 'canada', 
            'GQ' => 'equatorial guinea', 
            'JM' => 'jamaica', 
            'SC' => 'seychelles', 
            'TW' => 'taiwan, province of china', 
            'AZ' => 'azerbaijan', 
            'GR' => 'greece', 
            'MK' => 'macedonia, the former yugoslav republic of', 
            'PG' => 'papua new guinea', 
            'SD' => 'sudan', 
            'GS' => 'south georgia and the south sandwich islands', 
            'JO' => 'jordan', 
            'ML' => 'mali', 
            'PH' => 'philippines',
        );
        
        foreach($countries as $index => $country) {
            $title = str_replace($index,$country,$title);
        }
        
        return $title;
    }
}

?>