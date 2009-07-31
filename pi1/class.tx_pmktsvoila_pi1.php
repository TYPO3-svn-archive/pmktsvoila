<?php
	/***************************************************************
	*  Copyright notice
	*
	*  (c) 2009 Peter Klein <pmk@io.dk>
	*  All rights reserved
	*
	*  This script is part of the TYPO3 project. The TYPO3 project is
	*  free software; you can redistribute it and/or modify
	*  it under the terms of the GNU General Public License as published by
	*  the Free Software Foundation; either version 2 of the License, or
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
	***************************************************************/
	/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *   52: class tx_pmktsvoila_pi1 extends tslib_pibase
 *   71:     function getTVUids($content, $conf)
 *   90:     function getTVContent($content, $conf)
 *
 * TOTAL FUNCTIONS: 2
 * (This index is automatically created/updated by the extension "extdeveval")
 *
 */

	require_once(PATH_tslib.'class.tslib_pibase.php');
	require_once(t3lib_extMgm::extPath('templavoila').'class.tx_templavoila_api.php');

	/**
	 * Plugin 'PMK TSVoila' for the 'pmktsvoila' extension.
	 *
	 * This extension provides an alternate TemplaVoila rendering.
	 * With this you can render each TV column separately in your Typoscript setup.
	 * (Similar to the "old-style" colPos method.)
	 *
	 * @author Peter Klein <pmk@io.dk>
	 * @package TYPO3
	 * @subpackage tx_pmktsvoila
	 */
	class tx_pmktsvoila_pi1 extends tslib_pibase {
		var $prefixId = 'tx_pmktsvoila_pi1';
		// Same as class name
		var $scriptRelPath = 'pi1/class.tx_pmktsvoila_pi1.php'; // Path to this script relative to the extension dir.
		var $extKey = 'pmktsvoila'; // The extension key.
		var $pi_checkCHash = true;


		/**
		 * Returns comma separated list of tt_content uids used on TemplaVoila page.
		 *
		 * Allowed $conf parameters:
		 *   pageUid; Id of page from where elements come from. (Defaults to current page)
		 *   flexField; Name of TemplaVoila FlexForm field to render.
		 *
		 * @param	string		$content: Typoscript content.
		 * @param	array		$conf: Typoscript config array.
		 * @return	string		comma seperated list of tt_content uids
		 */
		function getTVUids($content, $conf) {
			$pageUid = intval($this->cObj->stdWrap($conf['pageUid'], $conf['pageUid.']));
			$flexField = htmlspecialchars($this->cObj->stdWrap($conf['flexField'], $conf['flexField.']));
			$page = ($pageUid == $GLOBALS['TSFE']->id || $pageUid == 0) ? $GLOBALS['TSFE']->page : $this->pi_getRecord('pages', $pageUid);
			$content = $this->pi_getFFvalue(t3lib_div::xml2array($page['tx_templavoila_flex']), $flexField);
			return $content;
		}

		/**
		 * Returns tt_content elements used on TemplaVoila page.
		 *
		 * Allowed $conf parameters:
		 *   pageUid; Id of page from where elements come from. (Defaults to current page)
		 *   flexField; Name of TemplaVoila FlexForm field to render.
		 *
		 * @param	string		$content: Typoscript content.
		 * @param	array		$conf: Typoscript config array.
		 * @return	string		tt_content elements
		 */
		function getTVContent($content, $conf) {
			$uids = explode(',', $this->getTVUids($content, $conf));
			foreach ($uids as $uid) {
				$content .= $this->cObj->RECORDS(array('source' => $uid, 'tables' => 'tt_content') );
			}
			return $content;
		}
	}



	if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pmktsvoila/pi1/class.tx_pmktsvoila_pi1.php']) {
		include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/pmktsvoila/pi1/class.tx_pmktsvoila_pi1.php']);
	}

?>
