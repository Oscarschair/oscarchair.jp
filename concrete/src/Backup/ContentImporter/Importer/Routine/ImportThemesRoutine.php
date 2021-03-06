<?php
namespace Concrete\Core\Backup\ContentImporter\Importer\Routine;

use Concrete\Core\Page\Theme\Theme;

class ImportThemesRoutine extends AbstractRoutine
{
    public function getHandle()
    {
        return 'themes';
    }

    public function import(\SimpleXMLElement $sx)
    {
        if (isset($sx->themes)) {
            foreach ($sx->themes->theme as $th) {
                $pkg = static::getPackageObject($th['package']);
                $pThemeHandle = (string) $th['handle'];
                $pt = Theme::getByHandle($pThemeHandle);
                if (!is_object($pt)) {
                    $pt = Theme::add($pThemeHandle, $pkg);
                }
                if ($th['activated'] == '1') {
                    $pt->applyToSite();
                }
            }
        }
    }

}
