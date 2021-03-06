<?php
namespace Concrete\Core\Filesystem\FileLocator;

use Concrete\Core\Package\PackageList;
use Concrete\Core\Page\Theme\Theme;
use Illuminate\Filesystem\Filesystem;

class ThemeElementLocation extends ThemeLocation
{

    public function getPath()
    {
        if ($this->pkgHandle) {
            return DIR_PACKAGES
                . '/'
                . $this->pkgHandle
                . '/'
                . DIRNAME_THEMES
                . '/'
                . $this->themeHandle
                . '/'
                . DIRNAME_ELEMENTS;
        } else if ($this->themeHandle === 'elemental' || $this->themeHandle === 'atomik') {
            return DIR_BASE_CORE
                . '/'
                . DIRNAME_THEMES
                . '/'
                . $this->themeHandle
                . '/'
                . DIRNAME_ELEMENTS;
        } else {
            return DIR_APPLICATION
                . '/'
                . DIRNAME_THEMES
                . '/'
                . $this->themeHandle
                . '/'
                . DIRNAME_ELEMENTS;
        }
    }

    public function contains($file)
    {
        // Since we are testing this in a special way, we strip DIRNAME_ELEMENTS off the front.
        $length = strlen(DIRNAME_ELEMENTS . '/');
        $file = substr($file, $length);
        return parent::contains($file);
    }

    public function getURL()
    {
        if ($this->pkgHandle) {
            return REL_DIR_PACKAGES
            . '/'
            . $this->pkgHandle
            . '/'
            . DIRNAME_THEMES
            . '/'
            . $this->themeHandle
            . '/'
            . DIRNAME_ELEMENTS;
        } else if ($this->themeHandle === 'elemental' || $this->themeHandle === 'atomik') {
            return ASSETS_URL
                . '/'
                . DIRNAME_THEMES
                . '/'
                . $this->themeHandle
                . '/'
                . DIRNAME_ELEMENTS;
        } else {
            return REL_DIR_APPLICATION
            . '/'
            . DIRNAME_THEMES
            . '/'
            . $this->themeHandle
            . '/'
            . DIRNAME_ELEMENTS;
        }
    }
}
