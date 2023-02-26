<?php

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * @var Concrete\Core\Block\View\BlockView $this
 * @var Concrete\Core\Block\View\BlockView $view
 * @var Concrete\Core\Area\Area $a
 * @var Concrete\Core\Block\Block $b
 * @var Concrete\Core\Entity\Block\BlockType\BlockType $bt
 * @var Concrete\Block\HeroImage\Controller $controller
 * @var Concrete\Core\Form\Service\Form $form
 * @var int $bID
 *
 * @var string|null $title
 * @var string|null $body
 * @var string|null $buttonText
 * @var string|null $buttonExternalLink
 * @var int|null $buttonInternalLinkCID
 * @var int|null $buttonFileLinkID
 * @var string|null $height
 * @var string|null $buttonStyle
 * @var string|null $buttonColor
 * @var string|null $buttonSize
 *
 * @var Concrete\Core\Entity\File\File|null $image
 * @var Concrete\Core\Entity\File\File|null $image2
 * @var HtmlObject\Link|null $button
 */
if ($image === null) {
    return;
}
if ($image2 === null) {
    return;
}
?>

    <div data-transparency="element" class="ccm-block-hero-split" style="<?php if ($height) { ?>min-height: <?=$height?>vh;<?php }?> margin-top: 70px;">
      <div class="split left" style="background-image: url(<?= h("\"{$image->getURL()}\"") ?>); <?php if ($height) { ?>min-height: <?=$height?>vh<?php } ?>;background-repeat: no-repeat;background-size: cover;background-position: center;">
      <?php
        if ((string) $title !== '' ) {
            ?>
            <h1 id="left-font"><?= $title ?></h1>
            <?php
         }
         if ((string) $body !== '') {
            ?>
            <div class="split-desc"><?= $body ?></div>
            <?php
         }
         if ($buttonText !== null) {
             ?>
             <a href="<?= $buttonLink ?>" id="left-font " class="button left-btn"> <?= $buttonText ?> </a>
             <?php
         }
         ?>
      </div>
      <div class="split right" style="background-image: url(<?= h("\"{$image2->getURL()}\"") ?>); <?php if ($height) { ?>min-height: <?=$height?>vh<?php } ?>;background-repeat: no-repeat;background-size: cover;background-position: center;">
      <?php
        if ((string) $title2 !== '' ) {
            ?>
            <h1 id="right-font"><?= $title2 ?></h1>
            <?php
         }
         if ((string) $body2 !== '') {
            ?>
            <div class="split-desc"><?= $body2 ?></div>
            <?php
         }
         if ($buttonText2 !== null) {
            ?>
            <a href="<?= $buttonLink2 ?>" id="right-font " class="button right-btn"> <?= $buttonText2 ?> </a>
            <?php
        }
         ?>
      </div>
    </div>
    
<script type="text/javascript">
    $(function() {
        var windowSize = window.innerWidth;
        console.log(windowSize);

        const left = document.querySelector(".left");
        const right = document.querySelector(".right");
        const split = document.querySelectorAll(".split");

        left.addEventListener("mouseenter", () => {
            if (windowSize < 800) {
                for(let i in split){
                    if (split.hasOwnProperty(i)) {
                        split[i].classList.add("hover-left");
                    }
                }
            }
        });

        left.addEventListener("mouseleave", () => {
            if (windowSize < 800) {
                for(let i in split){
                    if (split.hasOwnProperty(i)) {
                        split[i].classList.remove("hover-left");
                    }
                }
            }
        });

        right.addEventListener("mouseenter", () => {
            if (windowSize < 800) {
                for(let i in split){
                    if (split.hasOwnProperty(i)) {
                        split[i].classList.add("hover-right");
                    }
                }
            }
        });

        right.addEventListener("mouseleave", () => {
            if (windowSize < 800) {
                for(let i in split){
                    if (split.hasOwnProperty(i)) {
                        split[i].classList.remove("hover-right");
                    }
                }
            }
        });
    })
</script>