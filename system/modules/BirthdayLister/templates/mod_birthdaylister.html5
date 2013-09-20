
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<?php if ($this->hasBirthdays): ?>
	<ul>
<?php foreach ($this->birthdayChildren as $i=>$birthdayChild) : ?>
		<li<?php if (strlen($birthdayChild['class']) > 0) : ?> class="<?php echo $birthdayChild['class']; ?>"<?php endif; ?>><span class="birthday"><?php echo $birthdayChild['birthday']; ?> : </span><span class="name"><?php echo $birthdayChild['firstname']; ?> <?php echo $birthdayChild['lastname']; ?></span><span class="age"> (<?php echo $birthdayChild['age']; ?>)</span></li>
<?php endforeach; ?> 
	</ul>
<?php else: ?>
	<div class="noBirthdays">
		<?php echo $this->messageNoBirthdays; ?>
	</div>
<?php endif; ?>

</div>
<!-- indexer::continue -->
