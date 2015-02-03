
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<?php if ($this->hasBirthdays): ?>
	<ul>
<?php foreach ($this->birthdayChildren as $i=>$birthdayChild) : ?>
<?php
$arrClass = array();
if ($i == 0)
{
	$arrClass[] = 'first';
}
if (($i + 1) == count($this->birthdayChildren))
{
	$arrClass[] = 'last';
}
if($i % 2 == 0)
{
	$arrClass[] = 'odd';
}
else
{
	$arrClass[] = 'even';
}
if (strlen($birthdayChild['class']) > 0)
{
	$arrClass[] = $birthdayChild['class'];
}
?>
		<li class="<?php echo implode(' ', $arrClass); ?>"><span class="birthday"><?php echo $birthdayChild['birthday']; ?> : </span><span class="name"><?php echo $birthdayChild['firstname']; ?> <?php echo $birthdayChild['lastname']; ?></span><span class="age"> (<?php echo $birthdayChild['age']; ?>)</span></li>
<?php endforeach; ?> 
	</ul>
<?php else: ?>
	<div class="noBirthdays">
		<?php echo $this->messageNoBirthdays; ?>
	</div>
<?php endif; ?>

</div>
<!-- indexer::continue -->
