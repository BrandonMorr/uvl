<?php

/**
 * @file
 * This is the template file for the object page for video
 *
 * Available variables:
 * - $islandora_content: The rendered output of the viewer configured for
 *   this module.
 * - $islandora_dublin_core: The DC datastream object
 * - $dc_array: The DC datastream object values as a sanitized array. This
 *   includes label, value and class name.
 * - $islandora_object_label: The sanitized object label.
 * - $parent_collections: An array containing parent collection(s) info.
 *   Includes collection object, label, url and rendered link.
 *
 * @see template_preprocess_islandora_video()
 * @see theme_islandora_video()
 */
?>

<div class="islandora-video-object islandora" vocab="http://schema.org/" prefix="dcterms: http://purl.org/dc/terms/" typeof="VideoObject">
  <div class="islandora-video-content-wrapper clearfix">
    <?php if ($islandora_content): ?>
      <div class="islandora-video-content">
        <?php print $islandora_content; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="islandora-video-metadata">
    <?php
    //Render the compound navigation block
    $block = module_invoke('islandora_compound_object', 'block_view', 'compound_navigation');
    print render($block['content']);
    ?>
    <?php print $description; ?>
    <div class="dc-sidebox dc-sidebox-right">
      <ul class="dc-detail-tools">
        <!--
        <li><a href="<?php print(variable_get(islandora_base_url)); ?>/objects/<?php print $islandora_dublin_core->dc['dc:identifier'][0]; ?>/datastreams/OBJ/content" title="download"><span>download</span><i class="fa fa-download" aria-hidden="true"></i></a></li>
        <li><a href="#?????????????????" title="print"><span>print</span><i class="fa fa-print" aria-hidden="true"></i></a></li>-->

        <li><a id="link-button" href="<?php print $persistent_url; ?>" title="link"><span>link</span><i class="fa fa-link" aria-hidden="true"></i></a></li>
      </ul>
      <?php if ($parent_collections): ?>
        <div>
          <h3 class="dc-sidebox-header"><?php print t('In collections'); ?></h3>
          This item can be found in the following collections:
          <ul class="dc-related-searches">
            <?php foreach ($parent_collections as $collection): ?>
              <li><?php print l($collection->label, "islandora/object/{$collection->id}"); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
    <div class="dc-box">
      <?php print $metadata; ?>
    </div>
  </div>
</div>