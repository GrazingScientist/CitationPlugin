<?php

import('lib.pkp.classes.plugins.GenericPlugin');

class AddCtECitationStyle extends GenericPlugin {
	/**
	 * @copydoc Plugin::register()
	 */
	public function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path, $mainContextId);
		if (!Config::getVar('general', 'installed') || defined('RUNNING_UPGRADE')) return $success;
		if ($success && $this->getEnabled($mainContextId)) {
			HookRegistry::register('CitationStyleLanguage::citationStyleDefaults', array($this, 'addCSLStyle'));
		}
		return $success;
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
			'id' => 'custom-citation-style',
			'title' => 'Custom Citation Style',
			'isEnabled' => true,
			'useCsl' => Core::getBaseDir() . '/' . $this->getPluginPath() . '/custom_citation_style.csl',
		);
	}

	/**
	 * @copydoc Plugin::getDisplayName()
	 */
	function getDisplayName() {
		return ('Custom Citation Style');
	}

	/**
	 * @copydoc Plugin::getDescription()
	 */
	function getDescription() {
		return ('Add the custom citation style to the Citation Style Language.');
	}
}

?>
