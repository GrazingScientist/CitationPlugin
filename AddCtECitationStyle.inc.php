<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class AddCtECitationStyle extends GenericPlugin {
	/**
	 * Hook into citation style
	 */
	public function init() {
		HookRegistry::register('CitationStyleLanguage::citationStyleDefaults', array($this, 'addCSLStyle'));
	}

	/**
	 * Add a CSL style to the list of default styles
	 *
	 * @param string $hookname
	 * @param array $args [$defaults, CitationStyleLanguagePlugin]
	 */
	public function addCSLStyle($hookName, $args) {
		$defaults =& $args[0];

		$defaults[] = array(
			'id' => 'contributions-to-entomology',
			'title' => 'Contributions to Entomology',
			'isEnabled' => true,
			'useCsl' => '/srv/www/htdocs/journals/beitraege_entomology/plugins/generic/addCtECitationStyle/citationStyle.csl',
		);
	}

	/**
	 * @copydoc Plugin::getDisplayName()
	 */
	function getDisplayName() {
		return ('Contributions to Entomology Citation Style');
	}

	/**
	 * @copydoc Plugin::getDescription()
	 */
	function getDescription() {
		return ('Add the CtE citation style to the Citation Style Language.');
	}
}

?>
