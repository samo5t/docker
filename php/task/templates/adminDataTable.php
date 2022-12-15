<div class="table">
    <div class="row">
        <div class="h id"></div>
        <div class="h tab-title">Title</div>
        <div class="h content">Trimmed Content</div>
    </div>
    <?php
    foreach ($this->articles as $id => $article) {
        ?>
        <div class="row">
            <div class="id"><?= $id + 1 ?></div>
            <div class="tab-title"><?= $this->functions['title']($article) ?></div>
            <div class="content"><?= $this->functions['trimmedText']($article) ?></div>
        </div>
        <?php
    }
    ?>
</div>