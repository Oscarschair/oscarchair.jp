<?php
defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\Editor\LinkAbstractor;
use Concrete\Core\Form\Service\DestinationPicker\DestinationPicker;

/** @var \Concrete\Core\Form\Service\Form $form */
/** @var \Concrete\Core\Application\Service\FileManager $fileManager */
/** @var \Concrete\Core\Editor\EditorInterface $editor */

?>

<fieldset class="mb-3">
    <legend><?=t('Basics')?></legend>
    <div class="mb-3">
        <label class="form-label" for="image"><?=t('Image')?></label>
        <?php echo $fileManager->image('image', 'image', t('Choose Image'), $image ?? null); ?>
    </div>
    <div class="mb-3">
        <label class="form-label" for="image"><?=t('Height')?></label>
        <input class="form-range" type="range" name="height" id="heroImageHeight" min="20" max="100" onchange="updateHeroImageHeight(this.value)" value="<?=$height?>">
        <div class="alert alert-info">
            <?=t('Current Value:')?> <code><span data-value="height"></span></code>
        </div>
    </div>
</fieldset>
<fieldset class="mb-3">
    <legend><?=t('Image for mobile')?></legend>
    <div class="mb-3">
        <label class="form-label" for="image"><?=t('Image for mobile')?></label>
        <?php echo $fileManager->image('image2', 'image2', t('Choose Image for mobile'), $image2 ?? null); ?>
    </div>
    <div class="mb-3">
        <label class="form-label" for="image"><?=t('Height')?></label>
        <input class="form-range" type="range" name="height2" id="heroImageHeight2" min="20" max="100" onchange="updateHeroImageHeight2(this.value)" value="<?=$height2?>">
        <div class="alert alert-info">
            <?=t('Current Value:')?> <code><span data-value="height2"></span></code>
        </div>
    </div>
</fieldset>


<fieldset class="mb-3">
    <legend><?=t('フィルター')?></legend>
    <?php if ($themeColorCollection) { ?>
        <label class="form-label" for="filterColor"><?=t('Filter Color')?></label>
        <div data-vue="hero-image-filter">
            <concrete-theme-color-input
                :color-collection='<?=json_encode($themeColorCollection)?>'
                <?php if ($filterColor) { ?> color="<?=$filterColor ?? null?>"<?php } ?>
                input-name="filterColor">
            </concrete-theme-color-input>
        </div>
    <?php } ?>
    <div class="mb-3">
        <label class="form-label" for="image"><?=t('Filter Opacity')?></label>
        <input class="form-range" type="range" name="filterOpacity" id="heroImageOpacity" min="0" max="100" onchange="updateHeroImageOpacity(this.value)" value="<?=$filterOpacity?>">
        <div class="alert alert-info">
            <?=t('Current Value:')?> <code><span data-value="filterOpacity"></span></code>
        </div>
    </div>
</fieldset>


<fieldset class="mb-3">
    <legend><?=t('Text')?></legend>
    <div class="mb-3">
        <label class="form-label" for="title"><?=t('Title')?></label>
        <input type="text" name="title" class="form-control" value="<?=$title ?? null?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="body"><?=t('Body')?></label>
        <?php
        echo $editor->outputBlockEditModeEditor('body', isset($body) ? LinkAbstractor::translateFromEditMode($body) : null);
        ?>
    </div>
</fieldset>

<fieldset class="mb-3">
    <legend><?=t('Button')?></legend>
    <div class="mb-3">
        <label class="form-label" for="buttonText"><?=t('Button Text')?></label>
        <input type="text" name="buttonText" class="form-control" value="<?=$buttonText ?? null ?>">
        <div class="help-block">
            <?=t('Leave blank to omit the button.')?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->label("buttonSize", t("Button Size")); ?>
        <?php echo $form->select("buttonSize", [
                '' => t('Regular'),
                'lg' => t('Large'),
                'sm' => t('Small')
            ], $buttonSize ?? null);
        ?>
    </div>
    <div class="form-group">
        <?php echo $form->label("buttonStyle", t("Button Style")); ?>
        <?php echo $form->select("buttonStyle", [
            '' => t('Regular'),
            'outline' => t('Outline'),
        ], $buttonStyle ?? null);
        ?>
    </div>
    <?php if ($themeColorCollection) { ?>
        <label class="form-label" for="buttonColor"><?=t('Button Color')?></label>
        <div data-vue="hero-image">
            <concrete-theme-color-input
                :color-collection='<?=json_encode($themeColorCollection)?>'
                <?php if ($buttonColor) { ?> color="<?=$buttonColor ?? null?>"<?php } ?>
                input-name="buttonColor">
            </concrete-theme-color-input>
        </div>
    <?php } ?>
    <div class="mb-3">
        <?php echo $form->label('buttonLink', t('Button Link')) ?>
        <?php echo $destinationPicker->generate(
            'imageLink',
            $imageLinkPickers,
            $imageLinkHandle,
            $imageLinkValue
        )
        ?>
    </div>
</fieldset>

<script type="text/javascript">
    $(function() {
        updateHeroImageHeight = function (value) {
            document.querySelector('span[data-value=height]').innerHTML = value
        }
        updateHeroImageHeight(document.getElementById('heroImageHeight').value)

        updateHeroImageHeight2 = function (value) {
            document.querySelector('span[data-value=height2]').innerHTML = value
        }
        updateHeroImageHeight2(document.getElementById('heroImageHeight2').value)

        updateHeroImageOpacity = function (value) {
            document.querySelector('span[data-value=filterOpacity]').innerHTML = value/100
        }
        updateHeroImageOpacity(document.getElementById('heroImageOpacity').value)


        Concrete.Vue.activateContext('cms', function (Vue, config) {
            new Vue({
                el: 'div[data-vue=hero-image]',
                components: config.components
            })
            new Vue({
                el: 'div[data-vue=hero-image-filter]',
                components: config.components
            })
        })

    })
</script>
