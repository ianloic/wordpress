<?php

/*
Plugin Name: All in One SEO Pack
Plugin URI: http://semperfiwebdesign.com
Description: Out-of-the-box SEO for your Wordpress blog. <a href="options-general.php?page=all-in-one-seo-pack/all_in_one_seo_pack.php">Options configuration panel</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mrtorbert%40gmail%2ecom&item_name=All%20In%20One%20SEO%20Pack&item_number=Support%20Open%20Source&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8">Donate</a> | <a href="http://semperfiwebdesign.com/documentation/all-in-one-seo-pack/all-in-one-seo-faq/" >Support</a> 
Version: 1.4.7.4
Author: Michael Torbert
Author URI: http://semperfiwebdesign.com
*/

/*
Copyright (C) 2008-2009 Michael Torbert, semperfiwebdesign.com (michael AT semperfiwebdesign DOT com)
Original code by uberdose of uberdose.com

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/*******************************************************************************************************/

$UTF8_TABLES['strtolower'] = array(
	"Ｚ" => "ｚ",	"Ｙ" => "ｙ",	"Ｘ" => "ｘ",
	"Ｗ" => "ｗ",	"Ｖ" => "ｖ",	"Ｕ" => "ｕ",
	"Ｔ" => "ｔ",	"Ｓ" => "ｓ",	"Ｒ" => "ｒ",
	"Ｑ" => "ｑ",	"Ｐ" => "ｐ",	"Ｏ" => "ｏ",
	"Ｎ" => "ｎ",	"Ｍ" => "ｍ",	"Ｌ" => "ｌ",
	"Ｋ" => "ｋ",	"Ｊ" => "ｊ",	"Ｉ" => "ｉ",
	"Ｈ" => "ｈ",	"Ｇ" => "ｇ",	"Ｆ" => "ｆ",
	"Ｅ" => "ｅ",	"Ｄ" => "ｄ",	"Ｃ" => "ｃ",
	"Ｂ" => "ｂ",	"Ａ" => "ａ",	"Å" => "å",
	"K" => "k",	"Ω" => "ω",	"Ώ" => "ώ",
	"Ὼ" => "ὼ",	"Ό" => "ό",	"Ὸ" => "ὸ",
	"Ῥ" => "ῥ",	"Ύ" => "ύ",	"Ὺ" => "ὺ",
	"Ῡ" => "ῡ",	"Ῠ" => "� ",	"Ί" => "ί",
	"Ὶ" => "ὶ",	"Ῑ" => "ῑ",	"Ῐ" => "ῐ",
	"Ή" => "ή",	"Ὴ" => "ὴ",	"Έ" => "έ",
	"Ὲ" => "ὲ",	"Ά" => "ά",	"Ὰ" => "ὰ",
	"Ᾱ" => "ᾱ",	"Ᾰ" => "ᾰ",	"Ὧ" => "ὧ",
	"Ὦ" => "ὦ",	"Ὥ" => "ὥ",	"Ὤ" => "ὤ",
	"Ὣ" => "ὣ",	"Ὢ" => "ὢ",	"Ὡ" => "ὡ",
	"Ὠ" => "� ",	"Ὗ" => "ὗ",	"Ὕ" => "ὕ",
	"Ὓ" => "ὓ",	"Ὑ" => "ὑ",	"Ὅ" => "ὅ",
	"Ὄ" => "ὄ",	"Ὃ" => "ὃ",	"Ὂ" => "ὂ",
	"Ὁ" => "ὁ",	"Ὀ" => "ὀ",	"Ἷ" => "ἷ",
	"Ἶ" => "ἶ",	"Ἵ" => "ἵ",	"Ἴ" => "ἴ",
	"Ἳ" => "ἳ",	"Ἲ" => "ἲ",	"Ἱ" => "ἱ",
	"Ἰ" => "ἰ",	"Ἧ" => "ἧ",	"Ἦ" => "ἦ",
	"Ἥ" => "ἥ",	"Ἤ" => "ἤ",	"Ἣ" => "ἣ",
	"Ἢ" => "ἢ",	"Ἡ" => "ἡ",	"Ἠ" => "� ",
	"Ἕ" => "ἕ",	"Ἔ" => "ἔ",	"Ἓ" => "ἓ",
	"Ἒ" => "ἒ",	"Ἑ" => "ἑ",	"Ἐ" => "ἐ",
	"Ἇ" => "ἇ",	"Ἆ" => "ἆ",	"Ἅ" => "ἅ",
	"Ἄ" => "ἄ",	"Ἃ" => "ἃ",	"Ἂ" => "ἂ",
	"Ἁ" => "ἁ",	"Ἀ" => "ἀ",	"Ỹ" => "ỹ",
	"Ỷ" => "ỷ",	"Ỵ" => "ỵ",	"Ỳ" => "ỳ",
	"Ự" => "ự",	"Ữ" => "ữ",	"Ử" => "ử",
	"Ừ" => "ừ",	"Ứ" => "ứ",	"Ủ" => "ủ",
	"Ụ" => "ụ",	"Ợ" => "ợ",	"� " => "ỡ",
	"Ở" => "ở",	"Ờ" => "ờ",	"Ớ" => "ớ",
	"Ộ" => "ộ",	"Ỗ" => "ỗ",	"Ổ" => "ổ",
	"Ồ" => "ồ",	"Ố" => "ố",	"Ỏ" => "ỏ",
	"Ọ" => "ọ",	"Ị" => "ị",	"Ỉ" => "ỉ",
	"Ệ" => "ệ",	"Ễ" => "ễ",	"Ể" => "ể",
	"Ề" => "ề",	"Ế" => "ế",	"Ẽ" => "ẽ",
	"Ẻ" => "ẻ",	"Ẹ" => "ẹ",	"Ặ" => "ặ",
	"Ẵ" => "ẵ",	"Ẳ" => "ẳ",	"Ằ" => "ằ",
	"Ắ" => "ắ",	"Ậ" => "ậ",	"Ẫ" => "ẫ",
	"Ẩ" => "ẩ",	"Ầ" => "ầ",	"Ấ" => "ấ",
	"Ả" => "ả",	"� " => "ạ",	"Ẕ" => "ẕ",
	"Ẓ" => "ẓ",	"Ẑ" => "ẑ",	"Ẏ" => "ẏ",
	"Ẍ" => "ẍ",	"Ẋ" => "ẋ",	"Ẉ" => "ẉ",
	"Ẇ" => "ẇ",	"Ẅ" => "ẅ",	"Ẃ" => "ẃ",
	"Ẁ" => "ẁ",	"Ṿ" => "ṿ",	"Ṽ" => "ṽ",
	"Ṻ" => "ṻ",	"Ṹ" => "ṹ",	"Ṷ" => "ṷ",
	"Ṵ" => "ṵ",	"Ṳ" => "ṳ",	"Ṱ" => "ṱ",
	"Ṯ" => "ṯ",	"Ṭ" => "ṭ",	"Ṫ" => "ṫ",
	"Ṩ" => "ṩ",	"Ṧ" => "ṧ",	"Ṥ" => "ṥ",
	"Ṣ" => "ṣ",	"� " => "ṡ",	"Ṟ" => "ṟ",
	"Ṝ" => "ṝ",	"Ṛ" => "ṛ",	"Ṙ" => "ṙ",
	"Ṗ" => "ṗ",	"Ṕ" => "ṕ",	"Ṓ" => "ṓ",
	"Ṑ" => "ṑ",	"Ṏ" => "ṏ",	"Ṍ" => "ṍ",
	"Ṋ" => "ṋ",	"Ṉ" => "ṉ",	"Ṇ" => "ṇ",
	"Ṅ" => "ṅ",	"Ṃ" => "ṃ",	"Ṁ" => "ṁ",
	"Ḿ" => "ḿ",	"Ḽ" => "ḽ",	"Ḻ" => "ḻ",
	"Ḹ" => "ḹ",	"Ḷ" => "ḷ",	"Ḵ" => "ḵ",
	"Ḳ" => "ḳ",	"Ḱ" => "ḱ",	"Ḯ" => "ḯ",
	"Ḭ" => "ḭ",	"Ḫ" => "ḫ",	"Ḩ" => "ḩ",
	"Ḧ" => "ḧ",	"Ḥ" => "ḥ",	"Ḣ" => "ḣ",
	"� " => "ḡ",	"Ḟ" => "ḟ",	"Ḝ" => "ḝ",
	"Ḛ" => "ḛ",	"Ḙ" => "ḙ",	"Ḗ" => "ḗ",
	"Ḕ" => "ḕ",	"Ḓ" => "ḓ",	"Ḑ" => "ḑ",
	"Ḏ" => "ḏ",	"Ḍ" => "ḍ",	"Ḋ" => "ḋ",
	"Ḉ" => "ḉ",	"Ḇ" => "ḇ",	"Ḅ" => "ḅ",
	"Ḃ" => "ḃ",	"Ḁ" => "ḁ",	"Ֆ" => "ֆ",
	"Օ" => "օ",	"Ք" => "ք",	"Փ" => "փ",
	"Ւ" => "ւ",	"Ց" => "ց",	"Ր" => "ր",
	"Տ" => "տ",	"Վ" => "վ",	"Ս" => "ս",
	"Ռ" => "ռ",	"Ջ" => "ջ",	"Պ" => "պ",
	"Չ" => "չ",	"Ո" => "ո",	"Շ" => "շ",
	"Ն" => "ն",	"Յ" => "յ",	"Մ" => "մ",
	"Ճ" => "ճ",	"Ղ" => "ղ",	"Ձ" => "ձ",
	"Հ" => "հ",	"Կ" => "կ",	"Ծ" => "ծ",
	"Խ" => "խ",	"Լ" => "լ",	"Ի" => "ի",
	"Ժ" => "ժ",	"Թ" => "թ",	"Ը" => "ը",
	"Է" => "է",	"Զ" => "զ",	"Ե" => "ե",
	"Դ" => "դ",	"Գ" => "գ",	"Բ" => "բ",
	"Ա" => "ա",	"Ԏ" => "ԏ",	"Ԍ" => "ԍ",
	"Ԋ" => "ԋ",	"Ԉ" => "ԉ",	"Ԇ" => "ԇ",
	"Ԅ" => "ԅ",	"Ԃ" => "ԃ",	"Ԁ" => "ԁ",
	"Ӹ" => "ӹ",	"Ӵ" => "ӵ",	"Ӳ" => "ӳ",
	"Ӱ" => "ӱ",	"Ӯ" => "ӯ",	"Ӭ" => "ӭ",
	"Ӫ" => "ӫ",	"Ө" => "ө",	"Ӧ" => "ӧ",
	"Ӥ" => "ӥ",	"Ӣ" => "ӣ",	"� " => "ӡ",
	"Ӟ" => "ӟ",	"Ӝ" => "ӝ",	"Ӛ" => "ӛ",
	"Ә" => "ә",	"Ӗ" => "ӗ",	"Ӕ" => "ӕ",
	"Ӓ" => "ӓ",	"Ӑ" => "ӑ",	"Ӎ" => "ӎ",
	"Ӌ" => "ӌ",	"Ӊ" => "ӊ",	"Ӈ" => "ӈ",
	"Ӆ" => "ӆ",	"Ӄ" => "ӄ",	"Ӂ" => "ӂ",
	"Ҿ" => "ҿ",	"Ҽ" => "ҽ",	"Һ" => "һ",
	"Ҹ" => "ҹ",	"Ҷ" => "ҷ",	"Ҵ" => "ҵ",
	"Ҳ" => "ҳ",	"Ұ" => "ұ",	"Ү" => "ү",
	"Ҭ" => "ҭ",	"Ҫ" => "ҫ",	"Ҩ" => "ҩ",
	"Ҧ" => "ҧ",	"Ҥ" => "ҥ",	"Ң" => "ң",
	"� " => "ҡ",	"Ҟ" => "ҟ",	"Ҝ" => "ҝ",
	"Қ" => "қ",	"Ҙ" => "ҙ",	"Җ" => "җ",
	"Ҕ" => "ҕ",	"Ғ" => "ғ",	"Ґ" => "ґ",
	"Ҏ" => "ҏ",	"Ҍ" => "ҍ",	"Ҋ" => "ҋ",
	"Ҁ" => "ҁ",	"Ѿ" => "ѿ",	"Ѽ" => "ѽ",
	"Ѻ" => "ѻ",	"Ѹ" => "ѹ",	"Ѷ" => "ѷ",
	"Ѵ" => "ѵ",	"Ѳ" => "ѳ",	"Ѱ" => "ѱ",
	"Ѯ" => "ѯ",	"Ѭ" => "ѭ",	"Ѫ" => "ѫ",
	"Ѩ" => "ѩ",	"Ѧ" => "ѧ",	"Ѥ" => "ѥ",
	"Ѣ" => "ѣ",	"� " => "ѡ",	"Я" => "я",
	"Ю" => "ю",	"Э" => "э",	"Ь" => "ь",
	"Ы" => "ы",	"Ъ" => "ъ",	"Щ" => "щ",
	"Ш" => "ш",	"Ч" => "ч",	"Ц" => "ц",
	"Х" => "х",	"Ф" => "ф",	"У" => "у",
	"Т" => "т",	"С" => "с",	"� " => "р",
	"П" => "п",	"О" => "о",	"Н" => "н",
	"М" => "м",	"Л" => "л",	"К" => "к",
	"Й" => "й",	"И" => "и",	"З" => "з",
	"Ж" => "ж",	"Е" => "е",	"Д" => "д",
	"Г" => "г",	"В" => "в",	"Б" => "б",
	"А" => "а",	"Џ" => "џ",	"Ў" => "ў",
	"Ѝ" => "ѝ",	"Ќ" => "ќ",	"Ћ" => "ћ",
	"Њ" => "њ",	"Љ" => "љ",	"Ј" => "ј",
	"Ї" => "ї",	"І" => "і",	"Ѕ" => "ѕ",
	"Є" => "є",	"Ѓ" => "ѓ",	"Ђ" => "ђ",
	"Ё" => "ё",	"Ѐ" => "ѐ",	"ϴ" => "θ",
	"Ϯ" => "ϯ",	"Ϭ" => "ϭ",	"Ϫ" => "ϫ",
	"Ϩ" => "ϩ",	"Ϧ" => "ϧ",	"Ϥ" => "ϥ",
	"Ϣ" => "ϣ",	"� " => "ϡ",	"Ϟ" => "ϟ",
	"Ϝ" => "ϝ",	"Ϛ" => "ϛ",	"Ϙ" => "ϙ",
	"Ϋ" => "ϋ",	"Ϊ" => "ϊ",	"Ω" => "ω",
	"Ψ" => "ψ",	"Χ" => "χ",	"Φ" => "φ",
	"Υ" => "υ",	"Τ" => "τ",	"Σ" => "σ",
	"Ρ" => "ρ",	"� " => "π",	"Ο" => "ο",
	"Ξ" => "ξ",	"Ν" => "ν",	"Μ" => "μ",
	"Λ" => "λ",	"Κ" => "κ",	"Ι" => "ι",
	"Θ" => "θ",	"Η" => "η",	"Ζ" => "ζ",
	"Ε" => "ε",	"Δ" => "δ",	"Γ" => "γ",
	"Β" => "β",	"Α" => "α",	"Ώ" => "ώ",
	"Ύ" => "ύ",	"Ό" => "ό",	"Ί" => "ί",
	"Ή" => "ή",	"Έ" => "έ",	"Ά" => "ά",
	"Ȳ" => "ȳ",	"Ȱ" => "ȱ",	"Ȯ" => "ȯ",
	"Ȭ" => "ȭ",	"Ȫ" => "ȫ",	"Ȩ" => "ȩ",
	"Ȧ" => "ȧ",	"Ȥ" => "ȥ",	"Ȣ" => "ȣ",
	"� " => "ƞ",	"Ȟ" => "ȟ",	"Ȝ" => "ȝ",
	"Ț" => "ț",	"Ș" => "ș",	"Ȗ" => "ȗ",
	"Ȕ" => "ȕ",	"Ȓ" => "ȓ",	"Ȑ" => "ȑ",
	"Ȏ" => "ȏ",	"Ȍ" => "ȍ",	"Ȋ" => "ȋ",
	"Ȉ" => "ȉ",	"Ȇ" => "ȇ",	"Ȅ" => "ȅ",
	"Ȃ" => "ȃ",	"Ȁ" => "ȁ",	"Ǿ" => "ǿ",
	"Ǽ" => "ǽ",	"Ǻ" => "ǻ",	"Ǹ" => "ǹ",
	"Ƿ" => "ƿ",	"Ƕ" => "ƕ",	"Ǵ" => "ǵ",
	"Ǳ" => "ǳ",	"Ǯ" => "ǯ",	"Ǭ" => "ǭ",
	"Ǫ" => "ǫ",	"Ǩ" => "ǩ",	"Ǧ" => "ǧ",
	"Ǥ" => "ǥ",	"Ǣ" => "ǣ",	"� " => "ǡ",
	"Ǟ" => "ǟ",	"Ǜ" => "ǜ",	"Ǚ" => "ǚ",
	"Ǘ" => "ǘ",	"Ǖ" => "ǖ",	"Ǔ" => "ǔ",
	"Ǒ" => "ǒ",	"Ǐ" => "ǐ",	"Ǎ" => "ǎ",
	"Ǌ" => "ǌ",	"Ǉ" => "ǉ",	"Ǆ" => "ǆ",
	"Ƽ" => "ƽ",	"Ƹ" => "ƹ",	"Ʒ" => "ʒ",
	"Ƶ" => "ƶ",	"Ƴ" => "ƴ",	"Ʋ" => "ʋ",
	"Ʊ" => "ʊ",	"Ư" => "ư",	"Ʈ" => "ʈ",
	"Ƭ" => "ƭ",	"Ʃ" => "ʃ",	"Ƨ" => "ƨ",
	"Ʀ" => "ʀ",	"Ƥ" => "ƥ",	"Ƣ" => "ƣ",
	"� " => "ơ",	"Ɵ" => "ɵ",	"Ɲ" => "ɲ",
	"Ɯ" => "ɯ",	"Ƙ" => "ƙ",	"Ɨ" => "ɨ",
	"Ɩ" => "ɩ",	"Ɣ" => "ɣ",	"Ɠ" => "� ",
	"Ƒ" => "ƒ",	"Ɛ" => "ɛ",	"Ə" => "ə",
	"Ǝ" => "ǝ",	"Ƌ" => "ƌ",	"Ɗ" => "ɗ",
	"Ɖ" => "ɖ",	"Ƈ" => "ƈ",	"Ɔ" => "ɔ",
	"Ƅ" => "ƅ",	"Ƃ" => "ƃ",	"Ɓ" => "ɓ",
	"Ž" => "ž",	"Ż" => "ż",	"Ź" => "ź",
	"Ÿ" => "ÿ",	"Ŷ" => "ŷ",	"Ŵ" => "ŵ",
	"Ų" => "ų",	"Ű" => "ű",	"Ů" => "ů",
	"Ŭ" => "ŭ",	"Ū" => "ū",	"Ũ" => "ũ",
	"Ŧ" => "ŧ",	"Ť" => "ť",	"Ţ" => "ţ",
	"� " => "š",	"Ş" => "ş",	"Ŝ" => "ŝ",
	"Ś" => "ś",	"Ř" => "ř",	"Ŗ" => "ŗ",
	"Ŕ" => "ŕ",	"Œ" => "œ",	"Ő" => "ő",
	"Ŏ" => "ŏ",	"Ō" => "ō",	"Ŋ" => "ŋ",
	"Ň" => "ň",	"Ņ" => "ņ",	"Ń" => "ń",
	"Ł" => "ł",	"Ŀ" => "ŀ",	"Ľ" => "ľ",
	"Ļ" => "ļ",	"Ĺ" => "ĺ",	"Ķ" => "ķ",
	"Ĵ" => "ĵ",	"Ĳ" => "ĳ",	"İ" => "i",
	"Į" => "į",	"Ĭ" => "ĭ",	"Ī" => "ī",
	"Ĩ" => "ĩ",	"Ħ" => "ħ",	"Ĥ" => "ĥ",
	"Ģ" => "ģ",	"� " => "ġ",	"Ğ" => "ğ",
	"Ĝ" => "ĝ",	"Ě" => "ě",	"Ę" => "ę",
	"Ė" => "ė",	"Ĕ" => "ĕ",	"Ē" => "ē",
	"Đ" => "đ",	"Ď" => "ď",	"Č" => "č",
	"Ċ" => "ċ",	"Ĉ" => "ĉ",	"Ć" => "ć",
	"Ą" => "ą",	"Ă" => "ă",	"Ā" => "ā",
	"Þ" => "þ",	"Ý" => "ý",	"Ü" => "ü",
	"Û" => "û",	"Ú" => "ú",	"Ù" => "ù",
	"Ø" => "ø",	"Ö" => "ö",	"Õ" => "õ",
	"Ô" => "ô",	"Ó" => "ó",	"Ò" => "ò",
	"Ñ" => "ñ",	"Ð" => "ð",	"Ï" => "ï",
	"Î" => "î",	"Í" => "í",	"Ì" => "ì",
	"Ë" => "ë",	"Ê" => "ê",	"É" => "é",
	"È" => "è",	"Ç" => "ç",	"Æ" => "æ",
	"Å" => "å",	"Ä" => "ä",	"Ã" => "ã",
	"Â" => "â",	"Á" => "á",	"À" => "� ",
	"Z" => "z",		"Y" => "y",		"X" => "x",
	"W" => "w",		"V" => "v",		"U" => "u",
	"T" => "t",		"S" => "s",		"R" => "r",
	"Q" => "q",		"P" => "p",		"O" => "o",
	"N" => "n",		"M" => "m",		"L" => "l",
	"K" => "k",		"J" => "j",		"I" => "i",
	"H" => "h",		"G" => "g",		"F" => "f",
	"E" => "e",		"D" => "d",		"C" => "c",
	"B" => "b",		"A" => "a",
);


$UTF8_TABLES['strtoupper'] = array(
	"ｚ" => "Ｚ",	"ｙ" => "Ｙ",	"ｘ" => "Ｘ",
	"ｗ" => "Ｗ",	"ｖ" => "Ｖ",	"ｕ" => "Ｕ",
	"ｔ" => "Ｔ",	"ｓ" => "Ｓ",	"ｒ" => "Ｒ",
	"ｑ" => "Ｑ",	"ｐ" => "Ｐ",	"ｏ" => "Ｏ",
	"ｎ" => "Ｎ",	"ｍ" => "Ｍ",	"ｌ" => "Ｌ",
	"ｋ" => "Ｋ",	"ｊ" => "Ｊ",	"ｉ" => "Ｉ",
	"ｈ" => "Ｈ",	"ｇ" => "Ｇ",	"ｆ" => "Ｆ",
	"ｅ" => "Ｅ",	"ｄ" => "Ｄ",	"ｃ" => "Ｃ",
	"ｂ" => "Ｂ",	"ａ" => "Ａ",	"ῳ" => "ῼ",
	"ῥ" => "Ῥ",	"ῡ" => "Ῡ",	"� " => "Ῠ",
	"ῑ" => "Ῑ",	"ῐ" => "Ῐ",	"ῃ" => "ῌ",
	"ι" => "Ι",	"ᾳ" => "ᾼ",	"ᾱ" => "Ᾱ",
	"ᾰ" => "Ᾰ",	"ᾧ" => "ᾯ",	"ᾦ" => "ᾮ",
	"ᾥ" => "ᾭ",	"ᾤ" => "ᾬ",	"ᾣ" => "ᾫ",
	"ᾢ" => "ᾪ",	"ᾡ" => "ᾩ",	"� " => "ᾨ",
	"ᾗ" => "ᾟ",	"ᾖ" => "ᾞ",	"ᾕ" => "ᾝ",
	"ᾔ" => "ᾜ",	"ᾓ" => "ᾛ",	"ᾒ" => "ᾚ",
	"ᾑ" => "ᾙ",	"ᾐ" => "ᾘ",	"ᾇ" => "ᾏ",
	"ᾆ" => "ᾎ",	"ᾅ" => "ᾍ",	"ᾄ" => "ᾌ",
	"ᾃ" => "ᾋ",	"ᾂ" => "ᾊ",	"ᾁ" => "ᾉ",
	"ᾀ" => "ᾈ",	"ώ" => "Ώ",	"ὼ" => "Ὼ",
	"ύ" => "Ύ",	"ὺ" => "Ὺ",	"ό" => "Ό",
	"ὸ" => "Ὸ",	"ί" => "Ί",	"ὶ" => "Ὶ",
	"ή" => "Ή",	"ὴ" => "Ὴ",	"έ" => "Έ",
	"ὲ" => "Ὲ",	"ά" => "Ά",	"ὰ" => "Ὰ",
	"ὧ" => "Ὧ",	"ὦ" => "Ὦ",	"ὥ" => "Ὥ",
	"ὤ" => "Ὤ",	"ὣ" => "Ὣ",	"ὢ" => "Ὢ",
	"ὡ" => "Ὡ",	"� " => "Ὠ",	"ὗ" => "Ὗ",
	"ὕ" => "Ὕ",	"ὓ" => "Ὓ",	"ὑ" => "Ὑ",
	"ὅ" => "Ὅ",	"ὄ" => "Ὄ",	"ὃ" => "Ὃ",
	"ὂ" => "Ὂ",	"ὁ" => "Ὁ",	"ὀ" => "Ὀ",
	"ἷ" => "Ἷ",	"ἶ" => "Ἶ",	"ἵ" => "Ἵ",
	"ἴ" => "Ἴ",	"ἳ" => "Ἳ",	"ἲ" => "Ἲ",
	"ἱ" => "Ἱ",	"ἰ" => "Ἰ",	"ἧ" => "Ἧ",
	"ἦ" => "Ἦ",	"ἥ" => "Ἥ",	"ἤ" => "Ἤ",
	"ἣ" => "Ἣ",	"ἢ" => "Ἢ",	"ἡ" => "Ἡ",
	"� " => "Ἠ",	"ἕ" => "Ἕ",	"ἔ" => "Ἔ",
	"ἓ" => "Ἓ",	"ἒ" => "Ἒ",	"ἑ" => "Ἑ",
	"ἐ" => "Ἐ",	"ἇ" => "Ἇ",	"ἆ" => "Ἆ",
	"ἅ" => "Ἅ",	"ἄ" => "Ἄ",	"ἃ" => "Ἃ",
	"ἂ" => "Ἂ",	"ἁ" => "Ἁ",	"ἀ" => "Ἀ",
	"ỹ" => "Ỹ",	"ỷ" => "Ỷ",	"ỵ" => "Ỵ",
	"ỳ" => "Ỳ",	"ự" => "Ự",	"ữ" => "Ữ",
	"ử" => "Ử",	"ừ" => "Ừ",	"ứ" => "Ứ",
	"ủ" => "Ủ",	"ụ" => "Ụ",	"ợ" => "Ợ",
	"ỡ" => "� ",	"ở" => "Ở",	"ờ" => "Ờ",
	"ớ" => "Ớ",	"ộ" => "Ộ",	"ỗ" => "Ỗ",
	"ổ" => "Ổ",	"ồ" => "Ồ",	"ố" => "Ố",
	"ỏ" => "Ỏ",	"ọ" => "Ọ",	"ị" => "Ị",
	"ỉ" => "Ỉ",	"ệ" => "Ệ",	"ễ" => "Ễ",
	"ể" => "Ể",	"ề" => "Ề",	"ế" => "Ế",
	"ẽ" => "Ẽ",	"ẻ" => "Ẻ",	"ẹ" => "Ẹ",
	"ặ" => "Ặ",	"ẵ" => "Ẵ",	"ẳ" => "Ẳ",
	"ằ" => "Ằ",	"ắ" => "Ắ",	"ậ" => "Ậ",
	"ẫ" => "Ẫ",	"ẩ" => "Ẩ",	"ầ" => "Ầ",
	"ấ" => "Ấ",	"ả" => "Ả",	"ạ" => "� ",
	"ẛ" => "� ",	"ẕ" => "Ẕ",	"ẓ" => "Ẓ",
	"ẑ" => "Ẑ",	"ẏ" => "Ẏ",	"ẍ" => "Ẍ",
	"ẋ" => "Ẋ",	"ẉ" => "Ẉ",	"ẇ" => "Ẇ",
	"ẅ" => "Ẅ",	"ẃ" => "Ẃ",	"ẁ" => "Ẁ",
	"ṿ" => "Ṿ",	"ṽ" => "Ṽ",	"ṻ" => "Ṻ",
	"ṹ" => "Ṹ",	"ṷ" => "Ṷ",	"ṵ" => "Ṵ",
	"ṳ" => "Ṳ",	"ṱ" => "Ṱ",	"ṯ" => "Ṯ",
	"ṭ" => "Ṭ",	"ṫ" => "Ṫ",	"ṩ" => "Ṩ",
	"ṧ" => "Ṧ",	"ṥ" => "Ṥ",	"ṣ" => "Ṣ",
	"ṡ" => "� ",	"ṟ" => "Ṟ",	"ṝ" => "Ṝ",
	"ṛ" => "Ṛ",	"ṙ" => "Ṙ",	"ṗ" => "Ṗ",
	"ṕ" => "Ṕ",	"ṓ" => "Ṓ",	"ṑ" => "Ṑ",
	"ṏ" => "Ṏ",	"ṍ" => "Ṍ",	"ṋ" => "Ṋ",
	"ṉ" => "Ṉ",	"ṇ" => "Ṇ",	"ṅ" => "Ṅ",
	"ṃ" => "Ṃ",	"ṁ" => "Ṁ",	"ḿ" => "Ḿ",
	"ḽ" => "Ḽ",	"ḻ" => "Ḻ",	"ḹ" => "Ḹ",
	"ḷ" => "Ḷ",	"ḵ" => "Ḵ",	"ḳ" => "Ḳ",
	"ḱ" => "Ḱ",	"ḯ" => "Ḯ",	"ḭ" => "Ḭ",
	"ḫ" => "Ḫ",	"ḩ" => "Ḩ",	"ḧ" => "Ḧ",
	"ḥ" => "Ḥ",	"ḣ" => "Ḣ",	"ḡ" => "� ",
	"ḟ" => "Ḟ",	"ḝ" => "Ḝ",	"ḛ" => "Ḛ",
	"ḙ" => "Ḙ",	"ḗ" => "Ḗ",	"ḕ" => "Ḕ",
	"ḓ" => "Ḓ",	"ḑ" => "Ḑ",	"ḏ" => "Ḏ",
	"ḍ" => "Ḍ",	"ḋ" => "Ḋ",	"ḉ" => "Ḉ",
	"ḇ" => "Ḇ",	"ḅ" => "Ḅ",	"ḃ" => "Ḃ",
	"ḁ" => "Ḁ",	"ֆ" => "Ֆ",	"օ" => "Օ",
	"ք" => "Ք",	"փ" => "Փ",	"ւ" => "Ւ",
	"ց" => "Ց",	"ր" => "Ր",	"տ" => "Տ",
	"վ" => "Վ",	"ս" => "Ս",	"ռ" => "Ռ",
	"ջ" => "Ջ",	"պ" => "Պ",	"չ" => "Չ",
	"ո" => "Ո",	"շ" => "Շ",	"ն" => "Ն",
	"յ" => "Յ",	"մ" => "Մ",	"ճ" => "Ճ",
	"ղ" => "Ղ",	"ձ" => "Ձ",	"հ" => "Հ",
	"կ" => "Կ",	"ծ" => "Ծ",	"խ" => "Խ",
	"լ" => "Լ",	"ի" => "Ի",	"ժ" => "Ժ",
	"թ" => "Թ",	"ը" => "Ը",	"է" => "Է",
	"զ" => "Զ",	"ե" => "Ե",	"դ" => "Դ",
	"գ" => "Գ",	"բ" => "Բ",	"ա" => "Ա",
	"ԏ" => "Ԏ",	"ԍ" => "Ԍ",	"ԋ" => "Ԋ",
	"ԉ" => "Ԉ",	"ԇ" => "Ԇ",	"ԅ" => "Ԅ",
	"ԃ" => "Ԃ",	"ԁ" => "Ԁ",	"ӹ" => "Ӹ",
	"ӵ" => "Ӵ",	"ӳ" => "Ӳ",	"ӱ" => "Ӱ",
	"ӯ" => "Ӯ",	"ӭ" => "Ӭ",	"ӫ" => "Ӫ",
	"ө" => "Ө",	"ӧ" => "Ӧ",	"ӥ" => "Ӥ",
	"ӣ" => "Ӣ",	"ӡ" => "� ",	"ӟ" => "Ӟ",
	"ӝ" => "Ӝ",	"ӛ" => "Ӛ",	"ә" => "Ә",
	"ӗ" => "Ӗ",	"ӕ" => "Ӕ",	"ӓ" => "Ӓ",
	"ӑ" => "Ӑ",	"ӎ" => "Ӎ",	"ӌ" => "Ӌ",
	"ӊ" => "Ӊ",	"ӈ" => "Ӈ",	"ӆ" => "Ӆ",
	"ӄ" => "Ӄ",	"ӂ" => "Ӂ",	"ҿ" => "Ҿ",
	"ҽ" => "Ҽ",	"һ" => "Һ",	"ҹ" => "Ҹ",
	"ҷ" => "Ҷ",	"ҵ" => "Ҵ",	"ҳ" => "Ҳ",
	"ұ" => "Ұ",	"ү" => "Ү",	"ҭ" => "Ҭ",
	"ҫ" => "Ҫ",	"ҩ" => "Ҩ",	"ҧ" => "Ҧ",
	"ҥ" => "Ҥ",	"ң" => "Ң",	"ҡ" => "� ",
	"ҟ" => "Ҟ",	"ҝ" => "Ҝ",	"қ" => "Қ",
	"ҙ" => "Ҙ",	"җ" => "Җ",	"ҕ" => "Ҕ",
	"ғ" => "Ғ",	"ґ" => "Ґ",	"ҏ" => "Ҏ",
	"ҍ" => "Ҍ",	"ҋ" => "Ҋ",	"ҁ" => "Ҁ",
	"ѿ" => "Ѿ",	"ѽ" => "Ѽ",	"ѻ" => "Ѻ",
	"ѹ" => "Ѹ",	"ѷ" => "Ѷ",	"ѵ" => "Ѵ",
	"ѳ" => "Ѳ",	"ѱ" => "Ѱ",	"ѯ" => "Ѯ",
	"ѭ" => "Ѭ",	"ѫ" => "Ѫ",	"ѩ" => "Ѩ",
	"ѧ" => "Ѧ",	"ѥ" => "Ѥ",	"ѣ" => "Ѣ",
	"ѡ" => "� ",	"џ" => "Џ",	"ў" => "Ў",
	"ѝ" => "Ѝ",	"ќ" => "Ќ",	"ћ" => "Ћ",
	"њ" => "Њ",	"љ" => "Љ",	"ј" => "Ј",
	"ї" => "Ї",	"і" => "І",	"ѕ" => "Ѕ",
	"є" => "Є",	"ѓ" => "Ѓ",	"ђ" => "Ђ",
	"ё" => "Ё",	"ѐ" => "Ѐ",	"я" => "Я",
	"ю" => "Ю",	"э" => "Э",	"ь" => "Ь",
	"ы" => "Ы",	"ъ" => "Ъ",	"щ" => "Щ",
	"ш" => "Ш",	"ч" => "Ч",	"ц" => "Ц",
	"х" => "Х",	"ф" => "Ф",	"у" => "У",
	"т" => "Т",	"с" => "С",	"р" => "� ",
	"п" => "П",	"о" => "О",	"н" => "Н",
	"м" => "М",	"л" => "Л",	"к" => "К",
	"й" => "Й",	"и" => "И",	"з" => "З",
	"ж" => "Ж",	"е" => "Е",	"д" => "Д",
	"г" => "Г",	"в" => "В",	"б" => "Б",
	"а" => "А",	"ϵ" => "Ε",	"ϲ" => "Σ",
	"ϱ" => "Ρ",	"ϰ" => "Κ",	"ϯ" => "Ϯ",
	"ϭ" => "Ϭ",	"ϫ" => "Ϫ",	"ϩ" => "Ϩ",
	"ϧ" => "Ϧ",	"ϥ" => "Ϥ",	"ϣ" => "Ϣ",
	"ϡ" => "� ",	"ϟ" => "Ϟ",	"ϝ" => "Ϝ",
	"ϛ" => "Ϛ",	"ϙ" => "Ϙ",	"ϖ" => "� ",
	"ϕ" => "Φ",	"ϑ" => "Θ",	"ϐ" => "Β",
	"ώ" => "Ώ",	"ύ" => "Ύ",	"ό" => "Ό",
	"ϋ" => "Ϋ",	"ϊ" => "Ϊ",	"ω" => "Ω",
	"ψ" => "Ψ",	"χ" => "Χ",	"φ" => "Φ",
	"υ" => "Υ",	"τ" => "Τ",	"σ" => "Σ",
	"ς" => "Σ",	"ρ" => "Ρ",	"π" => "� ",
	"ο" => "Ο",	"ξ" => "Ξ",	"ν" => "Ν",
	"μ" => "Μ",	"λ" => "Λ",	"κ" => "Κ",
	"ι" => "Ι",	"θ" => "Θ",	"η" => "Η",
	"ζ" => "Ζ",	"ε" => "Ε",	"δ" => "Δ",
	"γ" => "Γ",	"β" => "Β",	"α" => "Α",
	"ί" => "Ί",	"ή" => "Ή",	"έ" => "Έ",
	"ά" => "Ά",	"ʒ" => "Ʒ",	"ʋ" => "Ʋ",
	"ʊ" => "Ʊ",	"ʈ" => "Ʈ",	"ʃ" => "Ʃ",
	"ʀ" => "Ʀ",	"ɵ" => "Ɵ",	"ɲ" => "Ɲ",
	"ɯ" => "Ɯ",	"ɩ" => "Ɩ",	"ɨ" => "Ɨ",
	"ɣ" => "Ɣ",	"� " => "Ɠ",	"ɛ" => "Ɛ",
	"ə" => "Ə",	"ɗ" => "Ɗ",	"ɖ" => "Ɖ",
	"ɔ" => "Ɔ",	"ɓ" => "Ɓ",	"ȳ" => "Ȳ",
	"ȱ" => "Ȱ",	"ȯ" => "Ȯ",	"ȭ" => "Ȭ",
	"ȫ" => "Ȫ",	"ȩ" => "Ȩ",	"ȧ" => "Ȧ",
	"ȥ" => "Ȥ",	"ȣ" => "Ȣ",	"ȟ" => "Ȟ",
	"ȝ" => "Ȝ",	"ț" => "Ț",	"ș" => "Ș",
	"ȗ" => "Ȗ",	"ȕ" => "Ȕ",	"ȓ" => "Ȓ",
	"ȑ" => "Ȑ",	"ȏ" => "Ȏ",	"ȍ" => "Ȍ",
	"ȋ" => "Ȋ",	"ȉ" => "Ȉ",	"ȇ" => "Ȇ",
	"ȅ" => "Ȅ",	"ȃ" => "Ȃ",	"ȁ" => "Ȁ",
	"ǿ" => "Ǿ",	"ǽ" => "Ǽ",	"ǻ" => "Ǻ",
	"ǹ" => "Ǹ",	"ǵ" => "Ǵ",	"ǳ" => "ǲ",
	"ǯ" => "Ǯ",	"ǭ" => "Ǭ",	"ǫ" => "Ǫ",
	"ǩ" => "Ǩ",	"ǧ" => "Ǧ",	"ǥ" => "Ǥ",
	"ǣ" => "Ǣ",	"ǡ" => "� ",	"ǟ" => "Ǟ",
	"ǝ" => "Ǝ",	"ǜ" => "Ǜ",	"ǚ" => "Ǚ",
	"ǘ" => "Ǘ",	"ǖ" => "Ǖ",	"ǔ" => "Ǔ",
	"ǒ" => "Ǒ",	"ǐ" => "Ǐ",	"ǎ" => "Ǎ",
	"ǌ" => "ǋ",	"ǉ" => "ǈ",	"ǆ" => "ǅ",
	"ƿ" => "Ƿ",	"ƽ" => "Ƽ",	"ƹ" => "Ƹ",
	"ƶ" => "Ƶ",	"ƴ" => "Ƴ",	"ư" => "Ư",
	"ƭ" => "Ƭ",	"ƨ" => "Ƨ",	"ƥ" => "Ƥ",
	"ƣ" => "Ƣ",	"ơ" => "� ",	"ƞ" => "� ",
	"ƙ" => "Ƙ",	"ƕ" => "Ƕ",	"ƒ" => "Ƒ",
	"ƌ" => "Ƌ",	"ƈ" => "Ƈ",	"ƅ" => "Ƅ",
	"ƃ" => "Ƃ",	"ſ" => "S",	"ž" => "Ž",
	"ż" => "Ż",	"ź" => "Ź",	"ŷ" => "Ŷ",
	"ŵ" => "Ŵ",	"ų" => "Ų",	"ű" => "Ű",
	"ů" => "Ů",	"ŭ" => "Ŭ",	"ū" => "Ū",
	"ũ" => "Ũ",	"ŧ" => "Ŧ",	"ť" => "Ť",
	"ţ" => "Ţ",	"š" => "� ",	"ş" => "Ş",
	"ŝ" => "Ŝ",	"ś" => "Ś",	"ř" => "Ř",
	"ŗ" => "Ŗ",	"ŕ" => "Ŕ",	"œ" => "Œ",
	"ő" => "Ő",	"ŏ" => "Ŏ",	"ō" => "Ō",
	"ŋ" => "Ŋ",	"ň" => "Ň",	"ņ" => "Ņ",
	"ń" => "Ń",	"ł" => "Ł",	"ŀ" => "Ŀ",
	"ľ" => "Ľ",	"ļ" => "Ļ",	"ĺ" => "Ĺ",
	"ķ" => "Ķ",	"ĵ" => "Ĵ",	"ĳ" => "Ĳ",
	"ı" => "I",	"į" => "Į",	"ĭ" => "Ĭ",
	"ī" => "Ī",	"ĩ" => "Ĩ",	"ħ" => "Ħ",
	"ĥ" => "Ĥ",	"ģ" => "Ģ",	"ġ" => "� ",
	"ğ" => "Ğ",	"ĝ" => "Ĝ",	"ě" => "Ě",
	"ę" => "Ę",	"ė" => "Ė",	"ĕ" => "Ĕ",
	"ē" => "Ē",	"đ" => "Đ",	"ď" => "Ď",
	"č" => "Č",	"ċ" => "Ċ",	"ĉ" => "Ĉ",
	"ć" => "Ć",	"ą" => "Ą",	"ă" => "Ă",
	"ā" => "Ā",	"ÿ" => "Ÿ",	"þ" => "Þ",
	"ý" => "Ý",	"ü" => "Ü",	"û" => "Û",
	"ú" => "Ú",	"ù" => "Ù",	"ø" => "Ø",
	"ö" => "Ö",	"õ" => "Õ",	"ô" => "Ô",
	"ó" => "Ó",	"ò" => "Ò",	"ñ" => "Ñ",
	"ð" => "Ð",	"ï" => "Ï",	"î" => "Î",
	"í" => "Í",	"ì" => "Ì",	"ë" => "Ë",
	"ê" => "Ê",	"é" => "É",	"è" => "È",
	"ç" => "Ç",	"æ" => "Æ",	"å" => "Å",
	"ä" => "Ä",	"ã" => "Ã",	"â" => "Â",
	"á" => "Á",	"� " => "À",	"µ" => "Μ",
	"z" => "Z",		"y" => "Y",		"x" => "X",
	"w" => "W",		"v" => "V",		"u" => "U",
	"t" => "T",		"s" => "S",		"r" => "R",
	"q" => "Q",		"p" => "P",		"o" => "O",
	"n" => "N",		"m" => "M",		"l" => "L",
	"k" => "K",		"j" => "J",		"i" => "I",
	"h" => "H",		"g" => "G",		"f" => "F",
	"e" => "E",		"d" => "D",		"c" => "C",
	"b" => "B",		"a" => "A",
);

class All_in_One_SEO_Pack {
	
 	var $version = "1.4.7.4";
 	
 	/** Max numbers of chars in auto-generated description */
 	var $maximum_description_length = 160;
 	
 	/** Minimum number of chars an excerpt should be so that it can be used
 	 * as description. Touch only if you know what you're doing
 	 */
 	var $minimum_description_length = 1;
 	
 	var $ob_start_detected = false;
 	
 	var $title_start = -1;
 	
 	var $title_end = -1;
 	
 	/** The title before rewriting */
 	var $orig_title = '';
 	
 	/** Temp filename for the latest version. */
 	var $upgrade_filename = 'temp.zip';
 	
 	/** Where to extract the downloaded newest version. */
 	var $upgrade_folder;
 	
 	/** Any error in upgrading. */
 	var $upgrade_error;
 	
 	/** Which zip to download in order to upgrade .*/
 	var $upgrade_url = 'http://downloads.wordpress.org/plugin/all-in-one-seo-pack.zip';
 	
 	/** Filename of log file. */
 	var $log_file;
 	
 	/** Flag whether there should be logging. */
 	var $do_log;
 	
 	var $wp_version;
 	
	function All_in_One_SEO_Pack() {
		global $wp_version;
		$this->wp_version = $wp_version;
		
		$this->log_file = dirname(__FILE__) . '/all_in_one_seo_pack.log';
		if (get_option('aiosp_do_log')) {
			$this->do_log = true;
		} else {
			$this->do_log = false;
		}

		$this->upgrade_filename = dirname(__FILE__) . '/' . $this->upgrade_filename;
		$this->upgrade_folder = dirname(__FILE__);
	}
	
	/**      
	 * Convert a string to lower case
	 * Compatible with mb_strtolower(), an UTF-8 friendly replacement for strtolower()
	 */
	function strtolower($str) {
		global $UTF8_TABLES;
		return strtr($str, $UTF8_TABLES['strtolower']);
	}
	
	/**      
	 * Convert a string to upper case
	 * Compatible with mb_strtoupper(), an UTF-8 friendly replacement for strtoupper()
	 */
	function strtoupper($str) {
		global $UTF8_TABLES;
		return strtr($str, $UTF8_TABLES['strtoupper']);
	}	
	
	
	function template_redirect() {
		global $wp_query;
		$post = $wp_query->get_queried_object();

		if (is_feed()) {
			return;
		}

		if (is_single() || is_page()) {
		    $aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, 'aiosp_disable', true)));
		    if ($aiosp_disable) {
		    	return;
		    }
		}

		if (get_option('aiosp_rewrite_titles')) {
			ob_start(array($this, 'output_callback_for_title'));
		}
	}
	
	function output_callback_for_title($content) {
		return $this->rewrite_title($content);
	}

	function init() {
		if (function_exists('load_plugin_textdomain')) {
			load_plugin_textdomain('all_in_one_seo_pack', 'wp-content/plugins/all-in-one-seo-pack');
		}
	}

	function is_static_front_page() {
		global $wp_query;
		$post = $wp_query->get_queried_object();
		return get_option('show_on_front') == 'page' && is_page() && $post->ID == get_option('page_on_front');
	}
	
	function is_static_posts_page() {
		global $wp_query;
		$post = $wp_query->get_queried_object();
		return get_option('show_on_front') == 'page' && is_home() && $post->ID == get_option('page_for_posts');
	}
	
	function get_base() {
   		 return '/'.end(explode('/', str_replace(array('\\','/all_in_one_seo_pack.php'),array('/',''),__FILE__)));
	}

	function admin_head() {
		$home = get_settings('siteurl');
		$stylesheet = $home.'/wp-content/plugins' . $this->get_base() . '/css/all_in_one_seo_pack.css';
		echo('<link rel="stylesheet" href="' . $stylesheet . '" type="text/css" media="screen" />');
	}
	
	function wp_head() {
		if (is_feed()) {
			return;
		}
		
		global $wp_query;
		$post = $wp_query->get_queried_object();
		$meta_string = null;
		
		//echo("wp_head() " . wp_title('', false) . " is_home() => " . is_home() . ", is_page() => " . is_page() . ", is_single() => " . is_single() . ", is_static_front_page() => " . $this->is_static_front_page() . ", is_static_posts_page() => " . $this->is_static_posts_page());

		if (is_single() || is_page()) {
		    $aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post->ID, 'aiosp_disable', true)));
		    if ($aiosp_disable) {
		    	return;
		    }
		}
		
		if (get_option('aiosp_rewrite_titles')) {
			// make the title rewrite as short as possible
			if (function_exists('ob_list_handlers')) {
				$active_handlers = ob_list_handlers();
			} else {
				$active_handlers = array();
			}
			if (sizeof($active_handlers) > 0 &&
				strtolower($active_handlers[sizeof($active_handlers) - 1]) ==
				strtolower('All_in_One_SEO_Pack::output_callback_for_title')) {
				ob_end_flush();
			} else {
				$this->log("another plugin interfering?");
				// if we get here there *could* be trouble with another plugin :(
				$this->ob_start_detected = true;
				if (function_exists('ob_list_handlers')) {
					foreach (ob_list_handlers() as $handler) {
						$this->log("detected output handler $handler");
					}
				}
			}
		}
		
		echo "\n<!-- all in one seo pack $this->version ";
		if ($this->ob_start_detected) {
			echo "ob_start_detected ";
		}
		echo "[$this->title_start,$this->title_end] ";
		echo "-->\n";
		
		if ((is_home() && get_option('aiosp_home_keywords')) || $this->is_static_front_page()) {
			$keywords = trim($this->internationalize(get_option('aiosp_home_keywords')));
		} else {
			$keywords = $this->get_all_keywords();
		}
		if (is_single() || is_page()) {
            if ($this->is_static_front_page()) {
				$description = trim(stripcslashes($this->internationalize(get_option('aiosp_home_description'))));
            } else {
            	$description = $this->get_post_description($post);
            }
		} else if (is_home()) {
			$description = trim(stripcslashes($this->internationalize(get_option('aiosp_home_description'))));
		} else if (is_category()) {
			$description = $this->internationalize(category_description());
		}
		
		if (isset($description) && (strlen($description) > $this->minimum_description_length) && !(is_home() && is_paged())) {
			$description = trim(strip_tags($description));
			$description = str_replace('"', '', $description);
			
			// replace newlines on mac / windows?
			$description = str_replace("\r\n", ' ', $description);
			
			// maybe linux uses this alone
			$description = str_replace("\n", ' ', $description);
			
			if (isset($meta_string)) {
				//$meta_string .= "\n";
			} else {
				$meta_string = '';
			}
			
			// description format
            $description_format = get_option('aiosp_description_format');
            if (!isset($description_format) || empty($description_format)) {
            	$description_format = "%description%";
            }
            $description = str_replace('%description%', $description, $description_format);
            $description = str_replace('%blog_title%', get_bloginfo('name'), $description);
            $description = str_replace('%blog_description%', get_bloginfo('description'), $description);
            $description = str_replace('%wp_title%', $this->get_original_title(), $description);
            
            $meta_string .= sprintf("<meta name=\"description\" content=\"%s\" />", $description);
		}

		if (isset ($keywords) && !empty($keywords) && !(is_home() && is_paged())) {
			if (isset($meta_string)) {
				$meta_string .= "\n";
			}
			$meta_string .= sprintf("<meta name=\"keywords\" content=\"%s\" />", $keywords);
		}

		if (function_exists('is_tag')) {
			$is_tag = is_tag();
		}
		
		if ((is_category() && get_option('aiosp_category_noindex')) ||
			(!is_category() && is_archive() &&!$is_tag && get_option('aiosp_archive_noindex')) ||
			(get_option('aiosp_tags_noindex') && $is_tag)) {
			if (isset($meta_string)) {
				$meta_string .= "\n";
			}
			$meta_string .= '<meta name="robots" content="noindex,follow" />';
		}
		
		$page_meta = stripcslashes(get_option('aiosp_page_meta_tags'));
		$post_meta = stripcslashes(get_option('aiosp_post_meta_tags'));
		$home_meta = stripcslashes(get_option('aiosp_home_meta_tags'));
		if (is_page() && isset($page_meta) && !empty($page_meta)) {
			if (isset($meta_string)) {
				$meta_string .= "\n";
			}
			echo "\n$page_meta";
		}
		
		if (is_single() && isset($post_meta) && !empty($post_meta)) {
			if (isset($meta_string)) {
				$meta_string .= "\n";
			}
			$meta_string .= "$post_meta";
		}
		
		if (is_home() && !empty($home_meta)) {
			if (isset($meta_string)) {
				$meta_string .= "\n";
			}
			$meta_string .= "$home_meta";
		}
		
		if ($meta_string != null) {
			echo "$meta_string\n";
		}
		
		echo "<!-- /all in one seo pack -->\n";
	}
	
	function get_post_description($post) {
	    $description = trim(stripcslashes($this->internationalize(get_post_meta($post->ID, "description", true))));
		if (!$description) {
			$description = $this->trim_excerpt_without_filters_full_length($this->internationalize($post->post_excerpt));
			if (!$description && get_option("aiosp_generate_descriptions")) {
				$description = $this->trim_excerpt_without_filters($this->internationalize($post->post_content));
			}				
		}
		
		// "internal whitespace trim"
		$description = preg_replace("/\s\s+/", " ", $description);
		
		return $description;
	}
	
	function replace_title($content, $title) {
		$title = trim(strip_tags($title));
		
		$title_tag_start = "<title>";
		$title_tag_end = "</title>";
		$len_start = strlen($title_tag_start);
		$len_end = strlen($title_tag_end);
		$title = stripcslashes(trim($title));
		$start = strpos($content, $title_tag_start);
		$end = strpos($content, $title_tag_end);
		
		$this->title_start = $start;
		$this->title_end = $end;
		$this->orig_title = $title;
		
		if ($start && $end) {
			$header = substr($content, 0, $start + $len_start) . $title .  substr($content, $end);
		} else {
			// this breaks some sitemap plugins (like wpg2)
			//$header = $content . "<title>$title</title>";
			
			$header = $content;
		}
		
		return $header;
	}
	
	function internationalize($in) {
		if (function_exists('langswitch_filter_langs_with_message')) {
			$in = langswitch_filter_langs_with_message($in);
		}
		if (function_exists('polyglot_filter')) {
			$in = polyglot_filter($in);
		}
		if (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage')) {
			$in = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($in);
		}
		$in = apply_filters('localization', $in);
		return $in;
	}
	
	/** @return The original title as delivered by WP (well, in most cases) */
	function get_original_title() {
		global $wp_query;
		if (!$wp_query) {
			return null;	
		}
		
		$post = $wp_query->get_queried_object();
		
		// the_search_query() is not suitable, it cannot just return
		global $s;
		
		$title = null;
		
		if (is_home()) {
			$title = get_option('blogname');
		} else if (is_single()) {
			$title = $this->internationalize(wp_title('', false));
		} else if (is_search() && isset($s) && !empty($s)) {
			if (function_exists('attribute_escape')) {
				$search = attribute_escape(stripcslashes($s));
			} else {
				$search = wp_specialchars(stripcslashes($s), true);
			}
			$search = $this->capitalize($search);
			$title = $search;
		} else if (is_category() && !is_feed()) {
			$category_description = $this->internationalize(category_description());
			$category_name = ucwords($this->internationalize(single_cat_title('', false)));
			$title = $category_name;
		} else if (is_page()) {
			$title = $this->internationalize(wp_title('', false));
		} else if (function_exists('is_tag') && is_tag()) {
			global $utw;
			if ($utw) {
				$tags = $utw->GetCurrentTagSet();
				$tag = $tags[0]->tag;
		        $tag = str_replace('-', ' ', $tag);
			} else {
				// wordpress > 2.3
				$tag = $this->internationalize(wp_title('', false));
			}
			if ($tag) {
				$title = $tag;
			}
		} else if (is_archive()) {
			$title = $this->internationalize(wp_title('', false));
		} else if (is_404()) {
		    $title_format = get_option('aiosp_404_title_format');
		    $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
		    $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
		    $new_title = str_replace('%request_url%', $_SERVER['REQUEST_URI'], $new_title);
		    $new_title = str_replace('%request_words%', $this->request_as_words($_SERVER['REQUEST_URI']), $new_title);
				$title = $new_title;
			}
			
			return trim($title);
		}
	
	function paged_title($title) {
		// the page number if paged
		global $paged;
		
		// simple tagging support
		global $STagging;

		if (is_paged() || (isset($STagging) && $STagging->is_tag_view() && $paged)) {
			$part = $this->internationalize(get_option('aiosp_paged_format'));
			if (isset($part) || !empty($part)) {
				$part = " " . trim($part);
				$part = str_replace('%page%', $paged, $part);
				$this->log("paged_title() [$title] [$part]");
				$title .= $part;
			}
		}
		return $title;
	}

	function rewrite_title($header) {
		global $wp_query;
		if (!$wp_query) {
			$header .= "<!-- no wp_query found! -->\n";
			return $header;	
		}
		
		$post = $wp_query->get_queried_object();
		
		// the_search_query() is not suitable, it cannot just return
		global $s;
		
		// simple tagging support
		global $STagging;

		if (is_home()) {
			$title = $this->internationalize(get_option('aiosp_home_title'));
			if (empty($title)) {
				$title = $this->internationalize(get_option('blogname'));
			}
			$title = $this->paged_title($title);
			$header = $this->replace_title($header, $title);
		} else if (is_single()) {
			// we're not in the loop :(
			$authordata = get_userdata($post->post_author);
			$categories = get_the_category();
			$category = '';
			if (count($categories) > 0) {
				$category = $categories[0]->cat_name;
			}
			$title = $this->internationalize(get_post_meta($post->ID, "title", true));
			if (!$title) {
				$title = $this->internationalize(get_post_meta($post->ID, "title_tag", true));
				if (!$title) {
					$title = $this->internationalize(wp_title('', false));
				}
			}
            $title_format = get_option('aiosp_post_title_format');
            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
            $new_title = str_replace('%post_title%', $title, $new_title);
            $new_title = str_replace('%category%', $category, $new_title);
            $new_title = str_replace('%category_title%', $category, $new_title);
            $new_title = str_replace('%post_author_login%', $authordata->user_login, $new_title);
            $new_title = str_replace('%post_author_nicename%', $authordata->user_nicename, $new_title);
            $new_title = str_replace('%post_author_firstname%', ucwords($authordata->first_name), $new_title);
            $new_title = str_replace('%post_author_lastname%', ucwords($authordata->last_name), $new_title);
			$title = $new_title;
			$title = trim($title);
			$header = $this->replace_title($header, $title);
		} else if (is_search() && isset($s) && !empty($s)) {
			if (function_exists('attribute_escape')) {
				$search = attribute_escape(stripcslashes($s));
			} else {
				$search = wp_specialchars(stripcslashes($s), true);
			}
			$search = $this->capitalize($search);
            $title_format = get_option('aiosp_search_title_format');
            $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
            $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
            $title = str_replace('%search%', $search, $title);
			$header = $this->replace_title($header, $title);
		} else if (is_category() && !is_feed()) {
			$category_description = $this->internationalize(category_description());
			$category_name = ucwords($this->internationalize(single_cat_title('', false)));
            $title_format = get_option('aiosp_category_title_format');
            $title = str_replace('%category_title%', $category_name, $title_format);
            $title = str_replace('%category_description%', $category_description, $title);
            $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title);
            $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
            $title = $this->paged_title($title);
			$header = $this->replace_title($header, $title);
		} else if (is_page()) {
			// we're not in the loop :(
			$authordata = get_userdata($post->post_author);
			if ($this->is_static_front_page()) {
				if ($this->internationalize(get_option('aiosp_home_title'))) {
					$header = $this->replace_title($header, $this->internationalize(get_option('aiosp_home_title')));
				}
			} else {
				$title = $this->internationalize(get_post_meta($post->ID, "title", true));
				if (!$title) {
					$title = $this->internationalize(wp_title('', false));
				}
	            $title_format = get_option('aiosp_page_title_format');
	            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
	            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
	            $new_title = str_replace('%page_title%', $title, $new_title);
	            $new_title = str_replace('%page_author_login%', $authordata->user_login, $new_title);
	            $new_title = str_replace('%page_author_nicename%', $authordata->user_nicename, $new_title);
	            $new_title = str_replace('%page_author_firstname%', ucwords($authordata->first_name), $new_title);
	            $new_title = str_replace('%page_author_lastname%', ucwords($authordata->last_name), $new_title);
				$title = trim($new_title);
				$header = $this->replace_title($header, $title);
			}
		} else if (function_exists('is_tag') && is_tag()) {
			global $utw;
			if ($utw) {
				$tags = $utw->GetCurrentTagSet();
				$tag = $tags[0]->tag;
	            $tag = str_replace('-', ' ', $tag);
			} else {
				// wordpress > 2.3
				$tag = $this->internationalize(wp_title('', false));
			}
			if ($tag) {
	            $tag = $this->capitalize($tag);
	            $title_format = get_option('aiosp_tag_title_format');
	            $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
	            $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
	            $title = str_replace('%tag%', $tag, $title);
	            $title = $this->paged_title($title);
				$header = $this->replace_title($header, $title);
			}
		} else if (isset($STagging) && $STagging->is_tag_view()) { // simple tagging support
			$tag = $STagging->search_tag;
			if ($tag) {
	            $tag = $this->capitalize($tag);
	            $title_format = get_option('aiosp_tag_title_format');
	            $title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
	            $title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $title);
	            $title = str_replace('%tag%', $tag, $title);
	            $title = $this->paged_title($title);
				$header = $this->replace_title($header, $title);
			}
		} else if (is_archive()) {
			$date = $this->internationalize(wp_title('', false));
            $title_format = get_option('aiosp_archive_title_format');
            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
            $new_title = str_replace('%date%', $date, $new_title);
			$title = trim($new_title);
            $title = $this->paged_title($title);
			$header = $this->replace_title($header, $title);
		} else if (is_404()) {
            $title_format = get_option('aiosp_404_title_format');
            $new_title = str_replace('%blog_title%', $this->internationalize(get_bloginfo('name')), $title_format);
            $new_title = str_replace('%blog_description%', $this->internationalize(get_bloginfo('description')), $new_title);
            $new_title = str_replace('%request_url%', $_SERVER['REQUEST_URI'], $new_title);
            $new_title = str_replace('%request_words%', $this->request_as_words($_SERVER['REQUEST_URI']), $new_title);
			$header = $this->replace_title($header, $new_title);
		}
		
		return $header;

	}
	
	/**
	 * @return User-readable nice words for a given request.
	 */
	function request_as_words($request) {
		$request = htmlspecialchars($request);
		$request = str_replace('.html', ' ', $request);
		$request = str_replace('.htm', ' ', $request);
		$request = str_replace('.', ' ', $request);
		$request = str_replace('/', ' ', $request);
		$request_a = explode(' ', $request);
		$request_new = array();
		foreach ($request_a as $token) {
			$request_new[] = ucwords(trim($token));
		}
		$request = implode(' ', $request_new);
		return $request;
	}
	
	function capitalize($s) {
		$s = trim($s);
		$tokens = explode(' ', $s);
		while (list($key, $val) = each($tokens)) {
			$tokens[$key] = trim($tokens[$key]);
			$tokens[$key] = strtoupper(substr($tokens[$key], 0, 1)) . substr($tokens[$key], 1);
		}
		$s = implode(' ', $tokens);
		return $s;
	}
	
	function trim_excerpt_without_filters($text) {
		$text = str_replace(']]>', ']]&gt;', $text);
                $text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
		$text = strip_tags($text);
		$max = $this->maximum_description_length;
		
		if ($max < strlen($text)) {
			while($text[$max] != ' ' && $max > $this->minimum_description_length) {
				$max--;
			}
		}
		$text = substr($text, 0, $max);
		return trim(stripcslashes($text));
	}
	
	function trim_excerpt_without_filters_full_length($text) {
		$text = str_replace(']]>', ']]&gt;', $text);
                $text = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $text );
		$text = strip_tags($text);
		return trim(stripcslashes($text));
	}
	
	/**
	 * @return comma-separated list of unique keywords
	 */
	function get_all_keywords() {
		global $posts;

		if (is_404()) {
			return null;
		}
		
		// if we are on synthetic pages
		if (!is_home() && !is_page() && !is_single() &&!$this->is_static_front_page() && !$this->is_static_posts_page()) {
			return null;
		}

	    $keywords = array();
	    if (is_array($posts)) {
	        foreach ($posts as $post) {
	            if ($post) {

	                // custom field keywords
	                $keywords_a = $keywords_i = null;
	                $description_a = $description_i = null;
	                $id = $post->ID;
		            $keywords_i = stripcslashes($this->internationalize(get_post_meta($post->ID, "keywords", true)));
	                $keywords_i = str_replace('"', '', $keywords_i);
	                if (isset($keywords_i) && !empty($keywords_i)) {
	                	$traverse = explode(',', $keywords_i);
	                	foreach ($traverse as $keyword) {
	                		$keywords[] = $keyword;
	                	}
	                }
	                
	                // WP 2.3 tags
	                if (function_exists('get_the_tags')) {
	                	$tags = get_the_tags($post->ID);
	                	if ($tags && is_array($tags)) {
		                	foreach ($tags as $tag) {
		                		$keywords[] = $this->internationalize($tag->name);
		                	}
	                	}
	                }

	                // Ultimate Tag Warrior integration
	                global $utw;
	                if ($utw) {
	                	$tags = $utw->GetTagsForPost($post);
	                	if (is_array($tags)) {
		                	foreach ($tags as $tag) {
								$tag = $tag->tag;
								$tag = str_replace('_',' ', $tag);
								$tag = str_replace('-',' ',$tag);
								$tag = stripcslashes($tag);
		                		$keywords[] = $tag;
		                	}
	                	}
	                }
	                
	                // autometa
	                $autometa = stripcslashes(get_post_meta($post->ID, "autometa", true));
	                if (isset($autometa) && !empty($autometa)) {
	                	$autometa_array = explode(' ', $autometa);
	                	foreach ($autometa_array as $e) {
	                		$keywords[] = $e;
	                	}
	                }

	            	if (get_option('aiosp_use_categories') && !is_page()) {
		                $categories = get_the_category($post->ID);
		                foreach ($categories as $category) {
		                	$keywords[] = $this->internationalize($category->cat_name);
		                }
	            	}

	            }
	        }
	    }
	    
	    return $this->get_unique_keywords($keywords);
	}
	
	function get_meta_keywords() {
		global $posts;

	    $keywords = array();
	    if (is_array($posts)) {
	        foreach ($posts as $post) {
	            if ($post) {
	                // custom field keywords
	                $keywords_a = $keywords_i = null;
	                $description_a = $description_i = null;
	                $id = $post->ID;
		            $keywords_i = stripcslashes(get_post_meta($post->ID, "keywords", true));
	                $keywords_i = str_replace('"', '', $keywords_i);
	                if (isset($keywords_i) && !empty($keywords_i)) {
	                    $keywords[] = $keywords_i;
	                }
	            }
	        }
	    }
	    
	    return $this->get_unique_keywords($keywords);
	}
	
	function get_unique_keywords($keywords) {
		$small_keywords = array();
		foreach ($keywords as $word) {
			if (function_exists('mb_strtolower'))			
				$small_keywords[] = mb_strtolower($word);
			else 
				$small_keywords[] = $this->strtolower($word);
		}
		$keywords_ar = array_unique($small_keywords);
		return implode(',', $keywords_ar);
	}
	
	function get_url($url)	{
		if (function_exists('file_get_contents')) {
			$file = file_get_contents($url);
		} else {
	        $curl = curl_init($url);
	        curl_setopt($curl, CURLOPT_HEADER, 0);
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        $file = curl_exec($curl);
	        curl_close($curl);
	    }
	    return $file;
	}
	
	function log($message) {
		if ($this->do_log) {
			error_log(date('Y-m-d H:i:s') . " " . $message . "\n", 3, $this->log_file);
		}
	}

	function download_newest_version() {
		$success = true;
	    $file_content = $this->get_url($this->upgrade_url);
	    if ($file_content === false) {
	    	$this->upgrade_error = sprintf(__("Could not download distribution (%s)"), $this->upgrade_url);
			$success = false;
	    } else if (strlen($file_content) < 100) {
	    	$this->upgrade_error = sprintf(__("Could not download distribution (%s): %s"), $this->upgrade_url, $file_content);
			$success = false;
	    } else {
	    	$this->log(sprintf("filesize of download ZIP: %d", strlen($file_content)));
		    $fh = @fopen($this->upgrade_filename, 'w');
		    $this->log("fh is $fh");
		    if (!$fh) {
		    	$this->upgrade_error = sprintf(__("Could not open %s for writing"), $this->upgrade_filename);
		    	$this->upgrade_error .= "<br />";
		    	$this->upgrade_error .= sprintf(__("Please make sure %s is writable"), $this->upgrade_folder);
		    	$success = false;
		    } else {
		    	$bytes_written = @fwrite($fh, $file_content);
			    $this->log("wrote $bytes_written bytes");
		    	if (!$bytes_written) {
			    	$this->upgrade_error = sprintf(__("Could not write to %s"), $this->upgrade_filename);
			    	$success = false;
		    	}
		    }
		    if ($success) {
		    	fclose($fh);
		    }
	    }
	    return $success;
	}

	function install_newest_version() {
		$success = $this->download_newest_version();
	    if ($success) {
		    $success = $this->extract_plugin();
		    unlink($this->upgrade_filename);
	    }
	    return $success;
	}

	function extract_plugin() {
	    if (!class_exists('PclZip')) {
	        require_once ('pclzip.lib.php');
	    }
	    $archive = new PclZip($this->upgrade_filename);
	    $files = $archive->extract(PCLZIP_OPT_STOP_ON_ERROR, PCLZIP_OPT_REPLACE_NEWER, PCLZIP_OPT_REMOVE_ALL_PATH, PCLZIP_OPT_PATH, $this->upgrade_folder);
	    $this->log("files is $files");
	    if (is_array($files)) {
	    	$num_extracted = sizeof($files);
		    $this->log("extracted $num_extracted files to $this->upgrade_folder");
		    $this->log(print_r($files, true));
	    	return true;
	    } else {
	    	$this->upgrade_error = $archive->errorInfo();
	    	return false;
	    }
	}
	
	/** crude approximization of whether current user is an admin */
	function is_admin() {
		return current_user_can('level_8');
	}
	
	function is_directory_writable($directory) {
		$filename = $directory . '/' . 'tmp_file_' . time();
		$fh = @fopen($filename, 'w');
		if (!$fh) {
			return false;
		}
		
		$written = fwrite($fh, "test");
		fclose($fh);
		unlink($filename);
		if ($written) {
			return true;
		} else {
			return false;
		}
	}

	function is_upgrade_directory_writable() {
		//return $this->is_directory_writable($this->upgrade_folder);
		// let's assume it is
		return true;
	}

	function post_meta_tags($id) {
	    $awmp_edit = $_POST["aiosp_edit"];
	    if (isset($awmp_edit) && !empty($awmp_edit)) {
		    $keywords = $_POST["aiosp_keywords"];
		    $description = $_POST["aiosp_description"];
		    $title = $_POST["aiosp_title"];
		    $aiosp_meta = $_POST["aiosp_meta"];
		    $aiosp_disable = $_POST["aiosp_disable"];

		    delete_post_meta($id, 'keywords');
		    delete_post_meta($id, 'description');
		    delete_post_meta($id, 'title');
		    if ($this->is_admin()) {
		    	delete_post_meta($id, 'aiosp_disable');
		    }
		    //delete_post_meta($id, 'aiosp_meta');

		    if (isset($keywords) && !empty($keywords)) {
			    add_post_meta($id, 'keywords', $keywords);
		    }
		    if (isset($description) && !empty($description)) {
			    add_post_meta($id, 'description', $description);
		    }
		    if (isset($title) && !empty($title)) {
			    add_post_meta($id, 'title', $title);
		    }
		    if (isset($aiosp_disable) && !empty($aiosp_disable) && $this->is_admin()) {
			    add_post_meta($id, 'aiosp_disable', $aiosp_disable);
		    }
		    /*
		    if (isset($aiosp_meta) && !empty($aiosp_meta)) {
			    add_post_meta($id, 'aiosp_meta', $aiosp_meta);
		    }
		    */
	    }
	}

	function edit_category($id) {
		global $wpdb;
		$id = $wpdb->escape($id);
	    $awmp_edit = $_POST["aiosp_edit"];
	    if (isset($awmp_edit) && !empty($awmp_edit)) {
		    $keywords = $wpdb->escape($_POST["aiosp_keywords"]);
		    $title = $wpdb->escape($_POST["aiosp_title"]);
		    $old_category = $wpdb->get_row("select * from $this->table_categories where category_id=$id", OBJECT);
		    if ($old_category) {
		    	$wpdb->query("update $this->table_categories
		    			set meta_title='$title', meta_keywords='$keywords'
		    			where category_id=$id");
		    } else {
		    	$wpdb->query("insert into $this->table_categories(meta_title, meta_keywords, category_id)
		    			values ('$title', '$keywords', $id");
		    }
		    //$wpdb->query("insert into $this->table_categories")
	    	/*
		    delete_post_meta($id, 'keywords');
		    delete_post_meta($id, 'description');
		    delete_post_meta($id, 'title');

		    if (isset($keywords) && !empty($keywords)) {
			    add_post_meta($id, 'keywords', $keywords);
		    }
		    if (isset($description) && !empty($description)) {
			    add_post_meta($id, 'description', $description);
		    }
		    if (isset($title) && !empty($title)) {
			    add_post_meta($id, 'title', $title);
		    }
		    */
	    }
	}

	/**
	 * @deprecated This was for the feature of dedicated meta tags for categories which never went mainstream.
	 */
	function edit_category_form() {
	    global $post;
	    $keywords = stripcslashes(get_post_meta($post->ID, 'keywords', true));
	    $title = stripcslashes(get_post_meta($post->ID, 'title', true));
	    $description = stripcslashes(get_post_meta($post->ID, 'description', true));
		?>
		<input value="aiosp_edit" type="hidden" name="aiosp_edit" />
		<table class="editform" width="100%" cellspacing="2" cellpadding="5">
		<tr>
		<th width="33%" scope="row" valign="top">
		<a href="http://wp.uberdose.com/2007/03/24/all-in-one-seo-pack/"><?php _e('All in One SEO Pack', 'all_in_one_seo_pack') ?></a>
		</th>
		</tr>
		<tr>
		<th width="33%" scope="row" valign="top"><label for="aiosp_title"><?php _e('Title:', 'all_in_one_seo_pack') ?></label></th>
		<td><input value="<?php echo $title ?>" type="text" name="aiosp_title" size="70"/></td>
		</tr>
		<tr>
		<th width="33%" scope="row" valign="top"><label for="aiosp_keywords"><?php _e('Keywords (comma separated):', 'all_in_one_seo_pack') ?></label></th>
		<td><input value="<?php echo $keywords ?>" type="text" name="aiosp_keywords" size="70"/></td>
		</tr>
		</table>
		<?php
	}

	function add_meta_tags_textinput() {
	    global $post;
	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }
	    $keywords = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'keywords', true)));
	    $title = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'title', true)));
	    $description = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'description', true)));
	    $aiosp_meta = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'aiosp_meta', true)));
	    $aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'aiosp_disable', true)));
		?>
		<SCRIPT LANGUAGE="JavaScript">
		<!-- Begin
		function countChars(field,cntfield) {
		cntfield.value = field.value.length;
		}
		//  End -->
		</script>

	 <?php if (substr($this->wp_version, 0, 3) >= '2.5') { ?>
                <div id="postaiosp" class="postbox closed">
                <h3><?php _e('All in One SEO Pack', 'all_in_one_seo_pack') ?></h3>
                <div class="inside">
                <div id="postaiosp">
                <?php } else { ?>
                <div class="dbx-b-ox-wrapper">
                <fieldset id="seodiv" class="dbx-box">
                <div class="dbx-h-andle-wrapper">
                <h3 class="dbx-handle"><?php _e('All in One SEO Pack', 'all_in_one_seo_pack') ?></h3>
                </div>
                <div class="dbx-c-ontent-wrapper">
                <div class="dbx-content">
                <?php } ?>
	
		<a target="__blank" href="http://semperfiwebdesign.com/portfolio/wordpress/wordpress-plugins/all-in-one-seo-pack/"><?php _e('Click here for Support', 'all_in_one_seo_pack') ?></a>
		<input value="aiosp_edit" type="hidden" name="aiosp_edit" />
		<table style="margin-bottom:40px">
		<tr>
		<th style="text-align:left;" colspan="2">
		</th>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Title:', 'all_in_one_seo_pack') ?></th>
		<td><input value="<?php echo $title ?>" type="text" name="aiosp_title" size="62"/></td>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Description:', 'all_in_one_seo_pack') ?></th>
		<td><textarea name="aiosp_description" rows="1" cols="60"
		onKeyDown="countChars(document.post.aiosp_description,document.post.length1)"
		onKeyUp="countChars(document.post.aiosp_description,document.post.length1)"><?php echo $description ?></textarea><br />
		<input readonly type="text" name="length1" size="3" maxlength="3" value="<?php echo strlen($description);?>" />
		<?php _e(' characters. Most search engines use a maximum of 160 chars for the description.', 'all_in_one_seo_pack') ?>
		</td>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Keywords (comma separated):', 'all_in_one_seo_pack') ?></th>
		<td><input value="<?php echo $keywords ?>" type="text" name="aiosp_keywords" size="62"/></td>
		</tr>

		<?php if ($this->is_admin()) { ?>
		<tr>
		<th scope="row" style="text-align:right; vertical-align:top;">
		<?php _e('Disable on this page/post:', 'all_in_one_seo_pack')?>
		</th>
		<td>
		<input type="checkbox" name="aiosp_disable" <?php if ($aiosp_disable) echo "checked=\"1\""; ?>/>
		</td>
		</tr>
		<?php } ?>

		</table>
		
		<?php if (substr($this->wp_version, 0, 3) >= '2.5') { ?>
		</div></div></div>
		<?php } else { ?>
		</div>
		</fieldset>
		</div>
		<?php } ?>

		<?php
	}

	function admin_menu() {
		$file = __FILE__;
		
		// hack for 1.5
		if (substr($this->wp_version, 0, 3) == '1.5') {
			$file = 'all-in-one-seo-pack/all_in_one_seo_pack.php';
		}
		//add_management_page(__('All in One SEO Title', 'all_in_one_seo_pack'), __('All in One SEO', 'all_in_one_seo_pack'), 10, $file, array($this, 'management_panel'));
		add_submenu_page('options-general.php', __('All in One SEO', 'all_in_one_seo_pack'), __('All in One SEO', 'all_in_one_seo_pack'), 10, $file, array($this, 'options_panel'));
	}
	
	function management_panel() {
		$message = null;
		$base_url = "edit.php?page=" . __FILE__;
		//echo($base_url);
		$type = $_REQUEST['type'];
		if (!isset($type)) {
			$type = "posts";
		}
?>

  <ul class="aiosp_menu">
    <li><a href="<?php echo $base_url ?>&type=posts">Posts</a>
    </li>
    <li><a href="<?php echo $base_url ?>&type=pages">Pages</a>
    </li>
  </ul>
  
<?php

		if ($type == "posts") {
			echo("posts");
		} elseif ($type == "pages") {
			echo("pages");
		}

	}

	function options_panel() {
		$message = null;
		$message_updated = __("All in One SEO Options Updated.", 'all_in_one_seo_pack');
		
		// update options
		if ($_POST['action'] && $_POST['action'] == 'aiosp_update') {
			$message = $message_updated;
			update_option('aiosp_donate', $_POST['aiosp_donate']);
			update_option('aiosp_home_title', $_POST['aiosp_home_title']);
			update_option('aiosp_home_description', $_POST['aiosp_home_description']);
			update_option('aiosp_home_keywords', $_POST['aiosp_home_keywords']);
			update_option('aiosp_max_words_excerpt', $_POST['aiosp_max_words_excerpt']);
			update_option('aiosp_rewrite_titles', $_POST['aiosp_rewrite_titles']);
			update_option('aiosp_post_title_format', $_POST['aiosp_post_title_format']);
			update_option('aiosp_page_title_format', $_POST['aiosp_page_title_format']);
			update_option('aiosp_category_title_format', $_POST['aiosp_category_title_format']);
			update_option('aiosp_archive_title_format', $_POST['aiosp_archive_title_format']);
			update_option('aiosp_tag_title_format', $_POST['aiosp_tag_title_format']);
			update_option('aiosp_search_title_format', $_POST['aiosp_search_title_format']);
			update_option('aiosp_description_format', $_POST['aiosp_description_format']);
			update_option('aiosp_404_title_format', $_POST['aiosp_404_title_format']);
			update_option('aiosp_paged_format', $_POST['aiosp_paged_format']);
			update_option('aiosp_use_categories', $_POST['aiosp_use_categories']);
			update_option('aiosp_category_noindex', $_POST['aiosp_category_noindex']);
			update_option('aiosp_archive_noindex', $_POST['aiosp_archive_noindex']);
			update_option('aiosp_tags_noindex', $_POST['aiosp_tags_noindex']);
			update_option('aiosp_generate_descriptions', $_POST['aiosp_generate_descriptions']);
			update_option('aiosp_debug_info', $_POST['aiosp_debug_info']);
			update_option('aiosp_post_meta_tags', $_POST['aiosp_post_meta_tags']);
			update_option('aiosp_page_meta_tags', $_POST['aiosp_page_meta_tags']);
			update_option('aiosp_home_meta_tags', $_POST['aiosp_home_meta_tags']);
			update_option('aiosp_do_log', $_POST['aiosp_do_log']);
			if (function_exists('wp_cache_flush')) {
				wp_cache_flush();
			}
		} elseif ($_POST['aiosp_upgrade']) {
			$message = __("Upgraded to newest version. Please revisit the options page to make sure you see the newest version.", 'all_in_one_seo_pack');
			$success = $this->install_newest_version();
			if (!$success) {
				$message = __("Upgrade failed", 'all_in_one_seo_pack');
				if (isset($this->upgrade_error) && !empty($this->upgrade_error)) {
					$message .= ": " . $this->upgrade_error;
				} else {
					$message .= ".";
				}
			}
		}

?>
<?php if ($message) : ?>
<div id="message" class="updated fade"><p><?php echo $message; ?></p></div>
<?php endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>
<div class="wrap">
<h2><?php _e('All in One SEO Plugin Options', 'all_in_one_seo_pack'); ?></h2>
<p>
<?php _e("This is version ", 'all_in_one_seo_pack') ?><?php _e("$this->version ", 'all_in_one_seo_pack') ?>
&nbsp;<a target="_blank" title="<?php _e('All in One SEO Plugin Release History', 'all_in_one_seo_pack')?>"
href="http://semperfiwebdesign.com/documentation/all-in-one-seo-pack/all-in-one-seo-pack-release-history/"><?php _e("Should I upgrade?", 'all_in_one_seo_pack')?>
</a>
| <a target="_blank" title="<?php _e('FAQ', 'all_in_one_seo_pack') ?>"
href="http://semperfiwebdesign.com/documentation/all-in-one-seo-pack/all-in-one-seo-faq/"><?php _e('FAQ', 'all_in_one_seo_pack') ?></a>
| <a target="_blank" title="<?php _e('All in One SEO Plugin Feedback', 'all_in_one_seo_pack') ?>"
href="http://semperfiwebdesign.com/portfolio/wordpress/wordpress-plugins/all-in-one-seo-pack/"><?php _e('Feedback', 'all_in_one_seo_pack') ?></a>
| <a target="_blank" title="<?php _e('All in One SEO Plugin Translations', 'all_in_one_seo_pack') ?>"
href="http://semperfiwebdesign.com/documentation/all-in-one-seo-pack/translations-for-all-in-one-seo-pack/"><?php _e('Translations', 'all_in_one_seo_pack') ?></a>
| <a target="_blank" title="<?php echo 'Donate' ?>"
href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mrtorbert%40gmail%2ecom&item_name=All%20In%20One%20SEO%20Pack&item_number=Support%20Open%20Source&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8"><?php echo 'Donate' ?></a>
</p>
<p>
<?php
$canwrite = $this->is_upgrade_directory_writable();
//$canwrite = false;
?>
<form class="form-table" name="dofollow" action="" method="post">
<p class="submit">
<input type="submit" <?php if (!$canwrite) echo(' disabled="disabled" ');?> name="aiosp_upgrade" value="<?php _e('One Click Upgrade', 'all_in_one_seo_pack')?> &raquo;" />
<strong><?php _e("(Remember: Backup early, backup often!)", 'all_in_one_seo_pack') ?></strong>
</form>
</p>
<p></p>

<?php if (!$canwrite) {
	echo("<p><strong>"); echo(sprintf(__("Please make sure that %s is writable.", 'all_in_one_seo_pack'), $this->upgrade_folder)); echo("</p></strong>");
} ?>
</p>

<script type="text/javascript">
<!--
    function toggleVisibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>

<h3><?php _e('Click on option titles to get help!', 'all_in_one_seo_pack') ?></h3>

<form name="dofollow" action="" method="post">
<table class="form-table">

<?php if (!get_option('aiosp_donate')){?>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_donate_tip');">
<?php _e('I enjoy this plugin and have made a donation:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_donate" <?php if (get_option('aiosp_donate')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_donate_tip">
<?php
_e('All donations support continued development of this free software.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>
<?php } ?>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_home_title_tip');">
<?php _e('Home Title:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_home_title"><?php echo stripcslashes(get_option('aiosp_home_title')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_home_title_tip">
<?php
_e('As the name implies, this will be the title of your homepage. This is independent of any other option. If not set, the default blog title will get used.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_home_description_tip');">
<?php _e('Home Description:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_home_description"><?php echo stripcslashes(get_option('aiosp_home_description')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_home_description_tip">
<?php
_e('The META description for your homepage. Independent of any other options, the default is no META description at all if this is not set.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_home_keywords_tip');">
<?php _e('Home Keywords (comma separated):', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_home_keywords"><?php echo stripcslashes(get_option('aiosp_home_keywords')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_home_keywords_tip">
<?php
_e("A comma separated list of your most important keywords for your site that will be written as META keywords on your homepage. Don't stuff everything in here.", 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_rewrite_titles_tip');">
<?php _e('Rewrite Titles:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_rewrite_titles" <?php if (get_option('aiosp_rewrite_titles')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_rewrite_titles_tip">
<?php
_e("Note that this is all about the title tag. This is what you see in your browser's window title bar. This is NOT visible on a page, only in the window title bar and of course in the source. If set, all page, post, category, search and archive page titles get rewritten. You can specify the format for most of them. For example: The default templates puts the title tag of posts like this: “Blog Archive >> Blog Name >> Post Title” (maybe I've overdone slightly). This is far from optimal. With the default post title format, Rewrite Title rewrites this to “Post Title | Blog Name”. If you have manually defined a title (in one of the text fields for All in One SEO Plugin input) this will become the title of your post in the format string.", 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_post_title_format_tip');">
<?php _e('Post Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_post_title_format" value="<?php echo stripcslashes(get_option('aiosp_post_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_post_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%post_title% - The original title of the post', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%category_title% - The (main) category of the post', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%category% - Alias for %category_title%', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%post_author_login% - This post's author' login", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%post_author_nicename% - This post's author' nicename", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%post_author_firstname% - This post's author' first name (capitalized)", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%post_author_lastname% - This post's author' last name (capitalized)", 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_page_title_format_tip');">
<?php _e('Page Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_page_title_format" value="<?php echo stripcslashes(get_option('aiosp_page_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_page_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%page_title% - The original title of the page', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%page_author_login% - This page's author' login", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%page_author_nicename% - This page's author' nicename", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%page_author_firstname% - This page's author' first name (capitalized)", 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e("%page_author_lastname% - This page's author' last name (capitalized)", 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_category_title_format_tip');">
<?php _e('Category Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_category_title_format" value="<?php echo stripcslashes(get_option('aiosp_category_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_category_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%category_title% - The original title of the category', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%category_description% - The description of the category', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_archive_title_format_tip');">
<?php _e('Archive Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_archive_title_format" value="<?php echo stripcslashes(get_option('aiosp_archive_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_archive_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%date% - The original archive title given by wordpress, e.g. "2007" or "2007 August"', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_tag_title_format_tip');">
<?php _e('Tag Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_tag_title_format" value="<?php echo stripcslashes(get_option('aiosp_tag_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_tag_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%tag% - The name of the tag', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_search_title_format_tip');">
<?php _e('Search Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_search_title_format" value="<?php echo stripcslashes(get_option('aiosp_search_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_search_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%search% - What was searched for', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_description_format_tip');">
<?php _e('Description Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_description_format" value="<?php echo stripcslashes(get_option('aiosp_description_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_description_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%description% - The original description as determined by the plugin, e.g. the excerpt if one is set or an auto-generated one if that option is set', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%wp_title% - The original wordpress title, e.g. post_title for posts', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_404_title_format_tip');">
<?php _e('404 Title Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_404_title_format" value="<?php echo stripcslashes(get_option('aiosp_404_title_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_404_title_format_tip">
<?php
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%blog_title% - Your blog title', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%blog_description% - Your blog description', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%request_url% - The original URL path, like "/url-that-does-not-exist/"', 'all_in_one_seo_pack'); echo('</li>');
echo('<li>'); _e('%request_words% - The URL path in human readable form, like "Url That Does Not Exist"', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_paged_format_tip');">
<?php _e('Paged Format:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input size="59" name="aiosp_paged_format" value="<?php echo stripcslashes(get_option('aiosp_paged_format')); ?>"/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_paged_format_tip">
<?php
_e('This string gets appended/prepended to titles when they are for paged index pages (like home or archive pages).', 'all_in_one_seo_pack');
_e('The following macros are supported:', 'all_in_one_seo_pack');
echo('<ul>');
echo('<li>'); _e('%page% - The page number', 'all_in_one_seo_pack'); echo('</li>');
echo('</ul>');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_use_categories_tip');">
<?php _e('Use Categories for META keywords:', 'all_in_one_seo_pack')?>
</td>
<td>
<input type="checkbox" name="aiosp_use_categories" <?php if (get_option('aiosp_use_categories')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_use_categories_tip">
<?php
_e('Check this if you want your categories for a given post used as the META keywords for this post (in addition to any keywords and tags you specify on the post edit page).', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_category_noindex_tip');">
<?php _e('Use noindex for Categories:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_category_noindex" <?php if (get_option('aiosp_category_noindex')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_category_noindex_tip">
<?php
_e('Check this for excluding category pages from being crawled. Useful for avoiding duplicate content.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_archive_noindex_tip');">
<?php _e('Use noindex for Archives:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_archive_noindex" <?php if (get_option('aiosp_archive_noindex')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_archive_noindex_tip">
<?php
_e('Check this for excluding archive pages from being crawled. Useful for avoiding duplicate content.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_tags_noindex_tip');">
<?php _e('Use noindex for Tag Archives:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_tags_noindex" <?php if (get_option('aiosp_tags_noindex')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_tags_noindex_tip">
<?php
_e('Check this for excluding tag pages from being crawled. Useful for avoiding duplicate content.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_generate_descriptions_tip');">
<?php _e('Autogenerate Descriptions:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_generate_descriptions" <?php if (get_option('aiosp_generate_descriptions')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_generate_descriptions_tip">
<?php
_e("Check this and your META descriptions will get autogenerated if there's no excerpt.", 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_post_meta_tags_tip');">
<?php _e('Additional Post Headers:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_post_meta_tags"><?php echo stripcslashes(get_option('aiosp_post_meta_tags')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_post_meta_tags_tip">
<?php
_e('What you enter here will be copied verbatim to your header on post pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_page_meta_tags_tip');">
<?php _e('Additional Page Headers:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_page_meta_tags"><?php echo stripcslashes(get_option('aiosp_page_meta_tags')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_page_meta_tags_tip">
<?php
_e('What you enter here will be copied verbatim to your header on pages. You can enter whatever additional headers you want here, even references to stylesheets.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_home_meta_tags_tip');">
<?php _e('Additional Home Headers:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<textarea cols="57" rows="2" name="aiosp_home_meta_tags"><?php echo stripcslashes(get_option('aiosp_home_meta_tags')); ?></textarea>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_home_meta_tags_tip">
<?php
_e('What you enter here will be copied verbatim to your header on the home page. You can enter whatever additional headers you want here, even references to stylesheets.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'auto_social')?>" onclick="toggleVisibility('aiosp_do_log_tip');">
<?php _e('Log important events:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_do_log" <?php if (get_option('aiosp_do_log')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_do_log_tip">
<?php
_e('Check this and SEO pack will create a log of important events (all_in_one_seo_pack.log) in its plugin directory which might help debugging it. Make sure this directory is writable.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>

<?php if (get_option('aiosp_donate')){?>
<tr>
<th scope="row" style="text-align:right; vertical-align:top;">
<a style="cursor:pointer;" title="<?php _e('Click for Help!', 'all_in_one_seo_pack')?>" onclick="toggleVisibility('aiosp_donate_tip');">
<?php _e('Thank you for your donation:', 'all_in_one_seo_pack')?>
</a>
</td>
<td>
<input type="checkbox" name="aiosp_donate" <?php if (get_option('aiosp_donate')) echo "checked=\"1\""; ?>/>
<div style="max-width:500px; text-align:left; display:none" id="aiosp_donate_tip">
<?php
_e('All donations support continued development of this free software.', 'all_in_one_seo_pack');
 ?>
</div>
</td>
</tr>
<?php } ?>

</table>
<p class="submit">
<input type="hidden" name="action" value="aiosp_update" /> 
<input type="hidden" name="page_options" value="aiosp_home_description" /> 
<input type="submit" name="Submit" value="<?php _e('Update Options', 'all_in_one_seo_pack')?> &raquo;" /> 
</p>
<p><br />
<strong>Check out these other great plugins!</strong><br />
<a href="http://semperfiwebdesign.com/custom-applications/sms-text-message/" title="SMS Text Message WordPress plugin">SMS Text Message</a> - sends SMS updates to your readers<br />
<a href="http://semperfiwebdesign.com/custom-applications/wp-security-scan/" title="WordPress Security">WordPress Security Scan</a> - provides vital security for your WordPress site
</p>
</form>
</div>
<?php
	
	} // options_panel

}

add_option("aiosp_home_description", null, 'All in One SEO Plugin Home Description', 'yes');
add_option("aiosp_home_title", null, 'All in One SEO Plugin Home Title', 'yes');
add_option("aiosp_donate", 0, 'All in One SEO Pack Donate', 'no');
add_option("aiosp_rewrite_titles", 1, 'All in One SEO Plugin Rewrite Titles', 'yes');
add_option("aiosp_use_categories", 0, 'All in One SEO Plugin Use Categories', 'yes');
add_option("aiosp_category_noindex", 1, 'All in One SEO Plugin Noindex for Categories', 'yes');
add_option("aiosp_archive_noindex", 1, 'All in One SEO Plugin Noindex for Archives', 'yes');
add_option("aiosp_tags_noindex", 0, 'All in One SEO Plugin Noindex for Tag Archives', 'yes');
add_option("aiosp_generate_descriptions", 1, 'All in One SEO Plugin Autogenerate Descriptions', 'yes');
add_option("aiosp_post_title_format", '%post_title% | %blog_title%', 'All in One SEO Plugin Post Title Format', 'yes');
add_option("aiosp_page_title_format", '%page_title% | %blog_title%', 'All in One SEO Plugin Page Title Format', 'yes');
add_option("aiosp_category_title_format", '%category_title% | %blog_title%', 'All in One SEO Plugin Category Title Format', 'yes');
add_option("aiosp_archive_title_format", '%date% | %blog_title%', 'All in One SEO Plugin Archive Title Format', 'yes');
add_option("aiosp_tag_title_format", '%tag% | %blog_title%', 'All in One SEO Plugin Tag Title Format', 'yes');
add_option("aiosp_search_title_format", '%search% | %blog_title%', 'All in One SEO Plugin Search Title Format', 'yes');
add_option("aiosp_description_format", '%description%', 'All in One SEO Plugin Description Format', 'yes');
add_option("aiosp_paged_format", ' - Part %page%', 'All in One SEO Plugin Paged Format', 'yes');
add_option("aiosp_404_title_format", 'Nothing found for %request_words%', 'All in One SEO Plugin 404 Title Format', 'yes');
add_option("aiosp_post_meta_tags", '', 'All in One SEO Plugin Additional Post Meta Tags', 'yes');
add_option("aiosp_page_meta_tags", '', 'All in One SEO Plugin Additional Post Meta Tags', 'yes');
add_option("aiosp_home_meta_tags", '', 'All in One SEO Plugin Additional Home Meta Tags', 'yes');
add_option("aiosp_do_log", null, 'All in One SEO Plugin write log file', 'yes');

$aiosp = new All_in_One_SEO_Pack();
add_action('wp_head', array($aiosp, 'wp_head'));
add_action('template_redirect', array($aiosp, 'template_redirect'));

add_action('init', array($aiosp, 'init'));

if (substr($aiosp->wp_version, 0, 3) < '2.5') {
        add_action('dbx_post_advanced', array($aiosp, 'add_meta_tags_textinput'));
        add_action('dbx_page_advanced', array($aiosp, 'add_meta_tags_textinput'));
}


add_action('edit_post', array($aiosp, 'post_meta_tags'));
add_action('publish_post', array($aiosp, 'post_meta_tags'));
add_action('save_post', array($aiosp, 'post_meta_tags'));
add_action('edit_page_form', array($aiosp, 'post_meta_tags'));

add_action('admin_menu', array($aiosp, 'admin_menu'));


add_action('admin_menu', 'aiosp_meta_box_add');

function aiosp_meta_box_add() {
	// Check whether the 2.5 function add_meta_box exists, and if it doesn't use 2.3 functions.
	if ( function_exists('add_meta_box') ) {
		add_meta_box('aiosp','All in One SEO Pack','aiosp_meta','post');
		add_meta_box('aiosp','All in One SEO Pack','aiosp_meta','page');
	} else {
		add_action('dbx_post_advanced', array($aiosp, 'add_meta_tags_textinput'));
		add_action('dbx_page_advanced', array($aiosp, 'add_meta_tags_textinput'));
	}
}

function aiosp_meta() {

	global $post;
	
	$post_id = $post;
	if (is_object($post_id)){
		$post_id = $post_id->ID;
	}
 	$keywords = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'keywords', true)));
    $title = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'title', true)));
	$description = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'description', true)));
    $aiosp_meta = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'aiosp_meta', true)));
    $aiosp_disable = htmlspecialchars(stripcslashes(get_post_meta($post_id, 'aiosp_disable', true)));
	
	?>
		<SCRIPT LANGUAGE="JavaScript">
		<!-- Begin
		function countChars(field,cntfield) {
		cntfield.value = field.value.length;
		}
		//  End -->
		</script>
		<input value="aiosp_edit" type="hidden" name="aiosp_edit" />
		
		<a target="__blank" href="http://semperfiwebdesign.com/portfolio/wordpress/wordpress-plugins/all-in-one-seo-pack/"><?php _e('Click here for Support', 'all_in_one_seo_pack') ?></a>
		<table style="margin-bottom:40px">
		<tr>
		<th style="text-align:left;" colspan="2">
		</th>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Title:', 'all_in_one_seo_pack') ?></th>
		<td><input value="<?php echo $title ?>" type="text" name="aiosp_title" size="62"/></td>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Description:', 'all_in_one_seo_pack') ?></th>
		<td><textarea name="aiosp_description" rows="1" cols="60"
		onKeyDown="countChars(document.post.aiosp_description,document.post.length1)"
		onKeyUp="countChars(document.post.aiosp_description,document.post.length1)"><?php echo $description ?></textarea><br />
		<input readonly type="text" name="length1" size="3" maxlength="3" value="<?php echo strlen($description);?>" />
		<?php _e(' characters. Most search engines use a maximum of 160 chars for the description.', 'all_in_one_seo_pack') ?>
		</td>
		</tr>
		<tr>
		<th scope="row" style="text-align:right;"><?php _e('Keywords (comma separated):', 'all_in_one_seo_pack') ?></th>
		<td><input value="<?php echo $keywords ?>" type="text" name="aiosp_keywords" size="62"/></td>
		</tr>


		<tr>
		<th scope="row" style="text-align:right; vertical-align:top;">
		<?php _e('Disable on this page/post:', 'all_in_one_seo_pack')?>
		</th>
		<td>
		<input type="checkbox" name="aiosp_disable" <?php if ($aiosp_disable) echo "checked=\"1\""; ?>/>
		</td>
		</tr>


		</table>
	<?php
}
?>
