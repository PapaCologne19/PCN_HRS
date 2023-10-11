

<?php
/**
 * Set a new image
 *
 * @param string $search
 * @param string $replace
 */
public function setImageValue($search, $replace)
{
    // Sanity check
    if (!file_exists($replace))
    {
        return;
    }

    // Delete current image
    $this->zipClass->deleteName('word/media/' . $search);

    // Add a new one
    $this->zipClass->addFile($replace, 'word/media/' . $search);
}
?>
