<?php
if(!function_exists('parse_ini_string'))
{
  function parse_ini_string($ini, $process_sections = false, $scanner_mode = null)
  {
    # Generate a temporary file.
    $tempname = tempnam('/tmp', 'ini');
    $fp = fopen($tempname, 'w');
    fwrite($fp, $ini);
    $ini = parse_ini_file($tempname, !empty($process_sections));
    fclose($fp);
    @unlink($tempname);
    return $ini;
  }
}
?>
