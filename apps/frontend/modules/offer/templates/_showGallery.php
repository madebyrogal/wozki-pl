<div id="gallery">
  <?php if ($media): ?>
    <a href="#" onclick="$.prettyPhoto.open(api_gallery); return false"><img id="mainGalleryImage" alt="" src="<?= $media->getFileMin1() ?>"/></a>
  <?php endif; ?>
  <div class="thumb">
    <?php foreach ($gallery as $key => $image): ?>
      <a href="" data-img="<?= $image->getFileMin1() ?>" class="thumbGallery <?php if ($key == 0 || ($key != 0 && ($key) % 4 == 0 )): ?>first<?php endif; ?>" title="<?= $image->getTitle() ?>"><img alt="<?= $image->getAlternative() ?>" src="<?= $image->getFileMin3() ?>"/></a>
      <?php endforeach; ?>
  </div>
</div>
<script type="text/javascript" charset="utf-8">
  api_gallery=[
    <?php foreach($gallery as $key => $image):?>
    '<?= $image->getFile()?>',
    <?php endforeach;?>
  ];
</script>